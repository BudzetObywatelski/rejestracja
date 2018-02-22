<?php
/**
 * Panel obywatelski
 * Copyright (c) Citycore 2018
 *
 * @license http://yourLicenceUrl/ (Licence Name)
 */

namespace Controller;
use Dframe\Config;
use Dframe\Router\Response;

/**
 * Here is a description of what this file is for.
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

class UsersController extends \Controller\Controller
{
	public function index(){
		$View = $this->loadView('Index');

		$View->render('users/index');
	}

	public function login(){
		switch ($_SERVER['REQUEST_METHOD']) 
		{
			case 'POST':
				$post = $_POST;
				$errors = array();
				if (!isset($post['firstname']) OR empty($post['firstname']))
				{
					$errors['firstname'] = 'Nie podano imienia.'; 
				}

				if (!isset($post['pass_code']) OR empty($post['pass_code']))
				{
					$errors['pass_code'] = 'Nie podano kodu identyfikacyjnego.'; 
				}

				if(!empty($errors)){
					return $this->response->json(array('code' => 400, 'response' => '', 'errors' => $errors, 'data' => array()))->status(400);
				}

				$UsersModel = $this->loadModel('Users');

				$firstname = htmlspecialchars($post['firstname']);
				$pass_code = htmlspecialchars($post['pass_code']);

				$getUserByPasses = $UsersModel->getUserByPasses($firstname, $pass_code);
				if(!$getUserByPasses['return']){
					return $this->response->json(array('code' => 400, 'response' => '', 'errors' => array('Nie instnieje imię z tym koden identyfikacyjnym.'), 'data' => array()))->status(400);
				}

				$this->baseClass->session->set('id', $getUserByPasses['data']['id']);

				break;
		}
		return $this->response->json(array('code' => 405, 'response' => '', 'errors' => array('Metoda niedozwolona.'), 'data' => array()))->status(405);
	}
}