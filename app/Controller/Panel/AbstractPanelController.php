<?php
namespace Controller\Panel;

Abstract class AbstractPanelController extends \Controller\Controller
{
    public function init(){
    	
		$sessionId = $this->baseClass->session->get('id');
		if($sessionId != NULL OR !empty($sessionId)){
			$UsersModel = $this->loadModel('Users');
			$getUserById = $UsersModel->getUserById($sessionId);
			if(!$getUserById['return']){
				$this->baseClass->session->end();
				return $this->router->redirect('users/index');
			}
		}else{
			$this->baseClass->session->end();
			return $this->router->redirect('users/index');
		}
	}
}
