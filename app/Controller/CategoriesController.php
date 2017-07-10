<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 20.06.2017
 * Time: 7:09
 */
class CategoriesController extends AppController
{
	public $uses = ['Category', 'Product'];
	public $components = ['Paginator'];
//	public $helpers = ['Paginator'];


	public function admin_index($cat_id = null){
		$this->index($cat_id);
	}

	public function index($cat_id = null){

		if(is_null($cat_id)){
//			$products = $this->Product->find('all',[
//													'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
//													'recursive' => -1
//													]);
			$this->Paginator->settings =[
											'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
											'recursive' => -1,
											'limit' => 3
										];
			$products = $this->Paginator->paginate('Product');
			$cats = $this->Category->find('all', ['conditions' => ['parent_id' => 0]]);

			$cats_menu_sidebar = $this->_catsMenuSidebar($cats, $cat_id = 0);
			$cats_menu_sidebar[$cat_id][$cat_id] ='Catalog';
			return $this->set(compact('products', 'cats_menu_sidebar', 'cat_id'));
		}
		if(!(int)$cat_id || !$this->Category->exists($cat_id)){
			throw new NotFoundException('такой страницы нет');
		}

		$cats = $this->Category->find('all');
		$ids = $this->catIds($cats, $cat_id);
		$ids = empty($ids) ? $cat_id : $ids.$cat_id;
		$ids = explode(',', $ids);

//		$products = $this->Product->find('all', [	'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
//													'conditions' => ['Product.category_id' => $ids],
//													'recursive' => -1]);
		$this->Paginator->settings =[
										'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
										'conditions' => ['Product.category_id' => $ids],
										'recursive' => -1,
										'limit' => 3
									];
		$products = $this->Paginator->paginate('Product');

		$cats_menu_sidebar = $this->_catsMenuSidebar($cats, $cat_id);
		return  $this->set((compact('products', 'cats_menu_sidebar', 'cat_id')));
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
