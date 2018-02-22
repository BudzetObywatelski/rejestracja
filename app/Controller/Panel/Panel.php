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

	}

	public function fill(){
		$View = $this->loadView('Index');
	}
}