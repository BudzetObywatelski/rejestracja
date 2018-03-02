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
	public function init(){
		$sessionId = $this->baseClass->session->get('id');
		if($sessionId != NULL OR !empty($sessionId)){
			$UsersModel = $this->loadModel('Users');
			$getUserById = $UsersModel->getUserById($sessionId);
			if($getUserById['return']){
				return $this->router->redirect('panel,panel/fill');
			}
		}
	}

	public function index(){
		$View = $this->loadView('Index');

		$registerConfig = Config::load('options')->get('register');

		$dateNow = date('Y-m-d');
		$allowLogin = ($dateNow >= $registerConfig['start'] AND $dateNow <= $registerConfig['end']) ? true : false;

		$View->assign('registerConfig', $registerConfig);
		$View->assign('allowLogin', $allowLogin);
		
		$deadlinesList = array();

		$Deadlines = $this->loadModel('Deadlines');
		$getDeadlines = $Deadlines->getDeadlines();
		if($getDeadlines['return']){
			$deadlinesList = $getDeadlines['data'];
		}

		$View->assign('deadlines', $deadlinesList);
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

				if(!isset($post['deadlines']) OR empty($post['deadlines']) OR $post['deadlines'] != "true"){
					$errors['deadlines'] = 'Nie zaakceptowano uczestnictwa we wszystkich terminach.'; 
				}

				if(!empty($errors)){
					return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => $errors, 'data' => array()))->status(400);
				}

				$registerConfig = Config::load('options')->get('register');

				$dateNow = date('Y-m-d');
				$allowLogin = ($dateNow >= $registerConfig['start'] AND $dateNow <= $registerConfig['end']) ? true : false;

				if(!$allowLogin){
					return Response::renderJSON(array('code' => 403, 'response' => '', 'errors' => array('Rejestracja jeszcze się nie zaczęła lub już się zakończyła.'), 'data' => array()))->status(403);
				}

				$UsersModel = $this->loadModel('Users');

				$firstname = htmlspecialchars($post['firstname']);
				$pass_code = htmlspecialchars($post['pass_code']);

				$getUserByPasses = $UsersModel->getUserByPasses($firstname, $pass_code);
				if(!$getUserByPasses['return']){
					return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => array('Nie instnieje imię z tym kodem identyfikacyjnym.'), 'data' => array()))->status(400);
				}

				if($getUserByPasses['data']['registred'] != 0){
					return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => array('Te dane zostały już zarejestrowane.'), 'data' => array()))->status(400);
				}

				$this->baseClass->session->set('id', $getUserByPasses['data']['id']);
				return Response::renderJSON(array('code' => 200, 'response' => 'Pomyślnie zalogowano.', 'errors' => array(), 'data' => array()))->status(200);

				break;
		}
		return Response::renderJSON(array('code' => 405, 'response' => '', 'errors' => array('Metoda niedozwolona.'), 'data' => array()))->status(405);
	}
}