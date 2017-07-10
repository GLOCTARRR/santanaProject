<?php

/**
 * Created by IntelliJ IDEA.
 * User: GLOCTARR
 * Date: 09.07.2017
 * Time: 22:55
 */
class UsersController extends AppController
{

	public function login(){
		if($this->request->is('post')){
			if($this->Auth->login()){
				return$this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash('Неверный логин или пароль', 'default', ['class' => 'error']);
		}
	}

	public function logout(){
		$this->redirect($this->Auth->logout());
	}
}
