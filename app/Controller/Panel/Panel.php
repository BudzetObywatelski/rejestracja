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

/**
 * Here is a description of what this file is for.
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

class PanelController extends \Controller\Panel\AbstractPanelController
{
	public function deadlines(){
		$View = $this->loadView('Index');

		$deadlinesList = array();

		$Deadlines = $this->loadModel('Deadlines');
		$getDeadlines = $Deadlines->getDeadlines();
		if($getDeadlines['return']){
			$deadlinesList = $getDeadlines['data'];
		}

		$View->assign('deadlines', $deadlinesList);
		$View->render('users/step2');
	}

	public function fill(){
		$View = $this->loadView('Index');

		$View->render('users/step3');
	}

	public function logout(){
		$this->baseClass->session->end();
		return $this->router->redirect('users/index');
	}
}