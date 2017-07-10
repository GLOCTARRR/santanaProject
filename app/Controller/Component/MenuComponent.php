<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 17.06.2017
 * Time: 16:49
 */
class MenuComponent extends Component
{

	public $categoryModel;
	public $pageModel;

	public function __construct($compnent)
	{
		parent::__construct($compnent);
		$this->categoryModel = ClassRegistry::init('Category');
		$this->pageModel = ClassRegistry::init('Page');

	}

	public function getMainMenu(){
		$main_menu = Cache::read('main_menu', 'short');
		if(empty($main_menu)){
			$main_menu = $this->pageModel->find('all');
			Cache::write('main_menu', $main_menu, 'short');
		}
		return $main_menu;

	}

	public function getCatMenu($admin = false){
		if($admin){
			$cat_menu_tree = $this->categoryModel->find('threaded');
			$cat_menu = $this->_catMenuHtml($cat_menu_tree, $admin);
			return $cat_menu;
		}
		$cat_menu = Cache::read('cat_menu', 'short');
		if(empty($cat_menu)){
			$cat_menu_tree = $this->categoryModel->find('threaded');
			$cat_menu = $this->_catMenuHtml($cat_menu_tree, $admin);
			Cache::write('cat_menu', $cat_menu, 'short');
		}
		return $cat_menu;
	}

	protected function _catMenuHtml($cat_menu_tree = false, $admin){
		if(!$cat_menu_tree)
			return false;

		$html='';
		foreach($cat_menu_tree as $category){
			$html .= $this->_catMenuTemplate($category, $admin);
		}
		return $html;
	}

	protected function _catMenuTemplate($category, $admin){
		ob_start();
		include APP . 'View' . DS .'Elements' . DS . 'menu_tpl.ctp';
		return ob_get_clean();
	}

}
