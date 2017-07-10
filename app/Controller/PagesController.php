<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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

	public function sendMail(){
		if(!empty($this->request->data)){
			$email = new CakeEmail();
//			$email->config('default');
			$email->from(['admin@cake.loc' => 'Administration of Cake.loc']);
			$email->to('test@mail.com');
			$email->subject($this->data['Page']['subject']);
			if($email->send($this->data['Page']['text'])){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', ['class' => 'ok']);
				return $this->redirect($this->referer());
			} else{
				$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
				return $this->redirect($this->referer());
			}
		}

	}
}
