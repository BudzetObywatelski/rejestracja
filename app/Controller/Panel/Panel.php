<?php
/**
 * Panel obywatelski
 * Copyright (c) Citycore 2018
 *
 * @license http://yourLicenceUrl/ (Licence Name)
 */

namespace Controller\Panel;
use Dframe\Config;
use Dframe\Router\Response;
use Respect\Validation\Validator as v;

/**
 * Here is a description of what this file is for.
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

class PanelController extends \Controller\Panel\AbstractPanelController
{

	public function fill(){
		$View = $this->loadView('Index');

		$View->render('users/step3');
	}

	public function fillUser(){
		switch ($_SERVER['REQUEST_METHOD']) 
		{
			case 'PUT':
				parse_str(file_get_contents("php://input"), $put);
				$errors = array();
				if (!isset($put['email']) OR empty($put['email'])){
					$errors['email'] = 'Nie podano adres email.';
				}

				if(isset($put['email']) AND !v::email()->validate($put['email'])){
					$errors['email'] = 'Niepoprawny adres email.';
				}

				if (!isset($put['tel_number']) OR empty($put['tel_number'])){
					$errors['tel_number'] = 'Nie podano numeru telefonu.';
				}

				if (!isset($put['sex']) OR empty($put['sex'])){
					$errors['sex'] = 'Nie podano płci.';
				}

				if (!isset($put['education']) OR empty($put['education'])){
					$errors['education'] = 'Nie podano wykształcenia.';
				}

				if(!empty($errors)){
					return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => $errors, 'data' => array()))->status(400);
				}

				$dataToUpdate = array(
					'email' => htmlspecialchars($put['email']),
					'tel_number' => htmlspecialchars($put['tel_number']),
					'education' => htmlspecialchars($put['education']),
					'sex' => ($put['sex'] == 'k') ? 'K' : 'M',
					'special_text' => (isset($put['special_text']) AND !empty($put['special_text'])) ? htmlspecialchars($put['special_text']) : '',
					'registred' => 1
				);

				$UsersModel = $this->loadModel('Users');
				$sessionId = $this->baseClass->session->get('id');
				$updateUser = $UsersModel->updateUser($sessionId, $dataToUpdate);

				if($updateUser['return']){
					$this->baseClass->session->end();
					return Response::renderJSON(array('code' => 200, 'response' => 'Pomyślnie zarejestrowano.', 'errors' => array(), 'data' => array()))->status(200);
				}
				return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => array('Błąd przy rejestracji.'), 'data' => array()))->status(400);
				break;
		}
		return Response::renderJSON(array('code' => 405, 'response' => '', 'errors' => array('Metoda niedozwolona.'), 'data' => array()))->status(405);
	}

	public function logout(){
		$this->baseClass->session->end();
		return $this->router->redirect('users/index');
	}
}