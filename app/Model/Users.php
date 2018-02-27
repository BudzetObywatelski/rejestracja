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

class UsersModel extends \Model\Model
{

    public function getUserByPasses($bday, $pass_code)
    {
        $result = $this->baseClass->db->select('users', '*', array('bday' => $bday, 'pass_code' => $pass_code))->result();

        if (!isset($result['id']))
        {
        	return $this->methodResult(false);
        }
        return $this->methodResult(true, array('data' => $result));
    }

    public function getUserById($id){
    	$result = $this->baseClass->db->select('users', '*', array('id' => $id))->result();

        if (!isset($result['id']))
        {
        	return $this->methodResult(false);
        }
        return $this->methodResult(true, array('data' => $result));
    }
}
