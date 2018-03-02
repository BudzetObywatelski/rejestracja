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

    public function getUserByPasses($firstname, $pass_code)
    {
        $result = $this->baseClass->db->select('users', '*', array('firstname' => $firstname, 'pass_code' => $pass_code))->result();

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

    public function updateUser($id, $dataToUpdate){
        $update = $this->baseClass->db->update('users', $dataToUpdate, array('id' => $id))->affectedRows();
        if($update <= 0){
            return $this->methodResult(false);
        }
        return $this->methodResult(true);
    }
}
