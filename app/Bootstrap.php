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

use Dframe\Session;
use Dframe\Messages;
use Dframe\Token;
use Dframe\Database\Database;

require_once dirname(__DIR__).'/web/config.php';

/**
 * Here is a description of what this file is for.
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

class Bootstrap
{
    
    public function __construct()
    {
        try {
            if(!empty(DB_HOST)) {
                $dbConfig = array(
                    'host' => DB_HOST, 
                    'dbname' => DB_DATABASE, 
                    'username' => DB_USER, 
                    'password' => DB_PASS,
                );
                $this->db = new Database($dbConfig);
                $this->db->setErrorLog(setErrorLog); // Debugowanie
            }

        } catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
            exit();
        }

        $this->session  = new Session('session_name'); // Best to set projectName
        $this->msg = new Messages($this->session);     // Default notify class
        $this->token  = new Token($this->session);     // Default csrf token

        return $this;
    }

}
