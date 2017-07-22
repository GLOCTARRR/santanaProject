<?php

class NewProductsController extends AppController {

	public $uses = array('Product');

	public function index(){
		$new_products = $this->Product->find('all', array(
			'conditions' => array('is_new' => 1),
			'fields' => array('id', 'title', 'price', 'img'),
			'recursive' => -1
		));
		$this->set(compact('new_products'));
	}

}