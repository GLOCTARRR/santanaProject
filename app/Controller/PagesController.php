<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public function index($page_alias = null){
		if(is_null($page_alias)){
			throw new NotFoundException('Такой страницы нет');
		}
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException('Такой страницы нет');
		}else{
			$this->set(compact('page_alias', 'page'));
		}
	}
}
