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
		$cat_menu_tree = $this->Category->find('threaded');
		$cat_menu = $this->_catMenuHtml($cat_menu_tree);
		$test = 'testtt';
		$this->set(compact('cat_menu', 'test'));
	}

	protected function _catMenuHtml($cat_menu_tree = false){
		if(!$cat_menu_tree)
			return false;

		$html='';

		foreach($cat_menu_tree as $category){
			$html .= $this->_catMenuTemplate($category);
		}
		return $html;
	}

	protected function _catMenuTemplate($category){
		ob_start();
		include APP . 'View' . DS .'Elements' . DS . 'menu_tpl.ctp';
		return ob_get_clean();
	}

}
