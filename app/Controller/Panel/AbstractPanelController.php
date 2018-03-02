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
 
namespace Controller\Panel;

/**
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

Abstract class AbstractPanelController extends \Dframe\Controller
{
    public function start()
    {
        
        $sessionId = $this->baseClass->session->get('id');
        if($sessionId != null OR !empty($sessionId)) {
            $UsersModel = $this->loadModel('Users');
            $getUserById = $UsersModel->getUserById($sessionId);
            if(!$getUserById['return'] OR $getUserById['data']['registred'] != 0) {
                $this->baseClass->session->end();
                return $this->router->redirect('users/index');
            }
        }else{
            $this->baseClass->session->end();
            return $this->router->redirect('users/index');
        }
    }
}
