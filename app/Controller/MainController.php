<?php
class MainController extends AppController {

	public $uses = array('User');

	function beforeFilter(){
		parent::beforeFilter();
		$this->set('UserModel', $this->modelName['user']);
	}

	function index(){
		//var_dump($this->Session->read('Auth.User.User'));
		$userData = $this->{$this->modelName['user']}->getAllUserData();
		$this->set('userData', $userData);
	}
}