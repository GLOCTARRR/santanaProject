<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar', 'Menu');

	// public $layout = 'santana';
	public function beforeFilter(){
		parent::beforeFilter();
		$this->layout = 'santana';
		$cat_menu = $this->Menu->getCatMenu();
		$this->set(compact('cat_menu'));
	}

	/*public function getCatMenu(){
		$cat_menu = Cache::read('cat_menu', 'short');
		if(!$cat_menu){
			$cat_menu_tree = $this->Category->find('threaded');
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
	}*/

}
