<?php

class MenuComponent extends Component {

	public function getCatMenu(){
		$categoryModel = ClassRegistry::init('Category');
		$cat_menu = Cache::read('cat_menu', 'short');
		if(!$cat_menu){
			$cat_menu_tree = $categoryModel->find('threaded');
			$cat_menu = $this->_catMenuHtml($cat_menu_tree);
			Cache::write('cat_menu', $cat_menu, 'short');
		}
		return $cat_menu;
	}

	protected function _catMenuHtml($cat_menu_tree = false){
		if(!$cat_menu_tree) return false;
		$html = '';
		foreach($cat_menu_tree as $item){
			$html .= $this->_catMenuTemplate($item);
		}
		return $html;
	}

	protected function _catMenuTemplate($category){
		ob_start();
		include APP . "View/Elements/menu_tpl.ctp";
		return ob_get_clean();
	}

}