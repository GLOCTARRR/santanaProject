<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 04.06.2017
 * Time: 13:44
 */
class NewProductsController extends AppController
{
	public $uses = ['Category'];

	public function index(){
		$cat_menu = $this->Menu->getCatmenu();
		$this->set(compact('cat_menu'));
	}



}
