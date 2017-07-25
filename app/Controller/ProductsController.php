<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 01.07.2017
 * Time: 17:46
 */
class ProductsController extends AppController
{
	public $uses = ['Product', 'Category'];

	public $components = ['Paginator'];


	public function admin_edit($product_id = null){
		if(is_null($product_id) || !(int)$product_id){
			throw new NotFoundException('такой страницы нет');
		}
		$product = $this->Product->findById($product_id);
		if(empty($product)){
			throw new NotFoundException('такого продукта нет');
		}

		if($this->request->is(['post', 'put'])){
			$this->Product->id = $product_id;
			if($this->Product->save($this->request->data)){
			 	$this->Session->setFlash('Сохранено', 'default', ['class' => 'ок']);
				 return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
			}
		}

		if(empty($this->request->data)){
			$this->request->data = $product;
//			$categories = $this->Product->Category->find('list');
			$cats = $this->Category->find('threaded', ['fields' => ['id', 'title', 'parent_id']]);
			$categories = $this->_catsSelect($cats, $product['Category']['id']);
		}
		$this->set(compact('product', 'categories'));
	}

	public function admin_add($cat_id = null){
		if(is_null($cat_id) || !(int)$cat_id){
			throw new NotFoundException('такой категории нет');
		}

		if($this->request->is(['post', 'put'])){
			$this->Product->create();
			if($this->Product->save($this->request->data)){
				$this->Session->setFlash('Товар добавлен', 'default', ['class' => 'ок']);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
			}
		}

		if(empty($this->request->data)){
			$this->request->data;
		}

		$cats = $this->Category->find('threaded', ['fields' => ['id', 'title', 'parent_id']]);
		$categories = $this->_catsSelect($cats, $cat_id);
		$this->set(compact('categories'));


	}

	public function admin_delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->Product->delete($id)){
			$this->Session->setFlash('Товар удален', 'default', ['class' => 'ок']);

		} else {
			$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
		}
		return $this->redirect($this->referer());
	}


	public function index($product_id = null){
		if(is_null($product_id) || !(int)$product_id || !$this->Product->exists($product_id)){
			throw new NotFoundException('такой страницы нет');
		}

		$product = $this->Product->find('first', ['conditions' => ['Product.id' => $product_id]]);

		$this->set(compact('product'));
	}

	public function search(){
		$search = !empty($_GET['q']) ? $_GET['q'] : null;


		$cats = $this->Category->find('all', ['conditions' => ['parent_id' => 0]]);
		$cats_menu_sidebar = $this->_catsMenuSidebar($cats, $cat_id = 0);
		$cats_menu_sidebar[$cat_id][$cat_id] ='Catalog';

		if(is_null($search)){
			$search_res = 'Введите поисковый запрос';

			return $this->set(compact('search_res','cats_menu_sidebar', 'cat_id' ));
		}

		$this->Paginator->settings =[
			'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
			'conditions' => ['Product.title LIKE' => '%'.$search.'%'],
			'recursive' => -1,
			'limit' => 5
		];
		$search_res= $this->Paginator->paginate('Product');

		$this->set(compact('search_res', 'cats_menu_sidebar', 'cat_id'));
	}

	protected function _catsSelect($cats, $category_id, $tab = ''){
		$html='';
		foreach($cats as $item){
			$html .= $this->_catSelectTemplate($item, $category_id, $tab);
		}
		return $html;
	}

	protected function _catSelectTemplate($category, $category_id, $tab){
		ob_start();
		include APP . 'View' . DS .'Elements' . DS . 'cats_select_tpl.ctp';
		return ob_get_clean();
	}

	protected function _catsMenuSideBar($cats, $cat_id){
		$data = [];
		foreach($cats as $item){
			if($item['Category']['id'] == $cat_id){
				$data[$cat_id][$cat_id] = $item['Category']['title'];
			}
			if($item['Category']['parent_id'] == $cat_id){
				$data[$cat_id]['children'][$item['Category']['id']] = $item['Category']['title'];
			}
		}
		return $data;
	}

	public function catIds($cats, $cat_id){
		$data = '';
		foreach($cats as $item){
			if($item['Category']['parent_id'] == $cat_id){
				$data .= $item['Category']['id'].',';
				$data .= $this->catIds($cats, $item['Category']['id']);
			}

		}
		return $data;

	}

}
