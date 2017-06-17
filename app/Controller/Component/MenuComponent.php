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

	public function __construct($compnent)
	{
		parent::__construct($compnent);
		$this->categoryModel = ClassRegistry::init('Category');
	}

	public function getCatMenu(){
		$cat_menu = Cache::read('cat_menu', 'short');
		if(empty($cat_menu)){
			$cat_menu_tree = $this->categoryModel->find('threaded');
			$cat_menu = $this->_catMenuHtml($cat_menu_tree);
			Cache::write('cat_menu', $cat_menu, 'short');
		}
		return $cat_menu;
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
