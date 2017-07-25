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

	public function admin_add(){
		if($this->request->is(['post', 'put'])){
			$this->Page->create();
			if($this->Page->save($this->request->data)){
				$this->Session->setFlash('Страница добавлена', 'default', ['class' => 'ок']);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
			}
		}
	}

	public function admin_edit($page_id = null){
		if(is_null($page_id) || !(int)$page_id){
			throw new NotFoundException('такой страницы нет');
		}
		$page = $this->Page->findById($page_id);
		if(empty($page)){
			throw new NotFoundException('такого продукта нет');
		}

		if($this->request->is(['post', 'put'])){
			$this->Page->id = $page_id;
			if($this->Page->save($this->request->data)){
				$this->Session->setFlash('Сохранено', 'default', ['class' => 'ок']);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
			}
		}
		if(empty($this->request->data)){
			$this->request->data = $page;
		}
		$this->set(compact('page'));
	}

	public function admin_delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}

		if($this->Product->delete($id)){
			$this->Session->setFlash('Страница удалена', 'default', ['class' => 'ок']);

		} else {
			$this->Session->setFlash('Ошибка', 'default', ['class' => 'error']);
		}
		return $this->redirect($this->referer());
	}


	public function admin_index(){
		$pages = $this->Page->find('all', ['fields' => ['id', 'title']]);
		$this->set(compact('pages'));
	}
}
