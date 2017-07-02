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
