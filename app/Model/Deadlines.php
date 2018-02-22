<?php
/**
 * Panel obywatelski
 * Copyright (c) Citycore 2018
 *
 * @license http://yourLicenceUrl/ (Licence Name)
 */
 
namespace Model;

/**
 * Here is a description of what this file is for.
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

class DeadlinesModel extends \Model\Model
{
	public function getDeadlines(){
		$results = $this->baseClass->db->select('deadlines', '*', array())->results();

        if (!isset($results[0]['id']))
        {
        	return $this->methodResult(false);
        }
        return $this->methodResult(true, array('data' => $results));
	}
}
