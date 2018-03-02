<?php
/**
 * Rejestracja PanelHelper
 * The MIT License (MIT)
 * 
 * Copyright (c) 2018 CityCore.pro
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation 
 * files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, 
 * merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is 
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT 
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN 
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
 * WHETHER IN AN ACTION OF CONTRACT,  TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
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

        if (!isset($result['id'])) {
            return $this->methodResult(false);
        }
        return $this->methodResult(true, array('data' => $result));
    }

    public function getUserById($id)
    {
        $result = $this->baseClass->db->select('users', '*', array('id' => $id))->result();

        if (!isset($result['id'])) {
            return $this->methodResult(false);
        }
        return $this->methodResult(true, array('data' => $result));
    }

    public function updateUser($id, $dataToUpdate)
    {
        $update = $this->baseClass->db->update('users', $dataToUpdate, array('id' => $id))->affectedRows();
        if($update <= 0) {
            return $this->methodResult(false);
        }
        return $this->methodResult(true);
    }

    public function addUser($dataToAdd)
    {
        $insert = $this->baseClass->db->insert('users', $dataToAdd)->getLastInsertId();
        if($insert <= 0) {
            return $this->methodResult(false);
        }
        return $this->methodResult(true);
    }
}
