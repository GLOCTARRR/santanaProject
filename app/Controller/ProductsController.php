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
}
