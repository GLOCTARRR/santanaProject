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

	public function index($cat_id = null){
		if(is_null($cat_id)){
			$products = $this->Product->find('all',[
													'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
													'recursive' => -1
													]);
			return $this->set(compact('products'));
		}
		if(!(int)$cat_id || !$this->Category->exists($cat_id)){
			throw new NotFoundException('такой страницы нет');
		}


	}
}
