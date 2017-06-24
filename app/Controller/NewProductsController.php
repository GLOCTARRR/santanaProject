<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 04.06.2017
 * Time: 13:44
 */
class NewProductsController extends AppController
{
	public $uses = ['Product'];

	public function index(){
		$new_products = $this->Product->find('all',
				[
					'conditions' => ['is_new' => 1],
					'fields' => ['Product.id', 'Product.title', 'Product.price', 'Product.img'],
					'recursive' => -1
				]
			);
		$this->set(compact('new_products'));
	}



}
