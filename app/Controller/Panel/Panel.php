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

    public function fill()
    {
        $View = $this->loadView('Index');

        $View->render('users/step3');
    }

    public function fillUser()
    {
        switch ($_SERVER['REQUEST_METHOD']) 
        {
        case 'PUT':
            parse_str(file_get_contents("php://input"), $put);
            $errors = array();
            if (!isset($put['email']) OR empty($put['email'])) {
                $errors['email'] = 'Nie podano adres email.';
            }

            if(isset($put['email']) AND !v::email()->validate($put['email'])) {
                $errors['email'] = 'Niepoprawny adres email.';
            }

            if (!isset($put['tel_number']) OR empty($put['tel_number'])) {
                $errors['tel_number'] = 'Nie podano numeru telefonu.';
            }

            if(isset($put['tel_number']) AND !v::phone()->validate($put['tel_number'])) {
                $errors['tel_number'] = 'Niepoprawny numer telefonu.';
            }

            if (!isset($put['sex']) OR empty($put['sex'])) {
                $errors['sex'] = 'Nie podano płci.';
            }

            if (!isset($put['education']) OR empty($put['education'])) {
                $errors['education'] = 'Nie podano wykształcenia.';
            }

            if(!empty($errors)) {
                return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => $errors, 'data' => array()))->status(400);
            }

            $allowedSex = array('k', 'm');
            $allowedEducation = array('basic', 'medium', 'high');

            $allowErrors = array();
            if(!in_array($put['sex'], $allowedSex)) {
                $allowErrors['sex'] = 'Niedozwolone wartości płci.';
            }

            if(!in_array($put['education'], $allowedEducation)) {
                $allowErrors['education'] = 'Niedozwolone wartości wykształcenia.';
            }

            if(!empty($allowErrors)) {
                return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => $allowErrors, 'data' => array()))->status(400);
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

            if($updateUser['return']) {
                $this->baseClass->session->end();
                return Response::renderJSON(array('code' => 200, 'response' => 'Pomyślnie zarejestrowano.', 'errors' => array(), 'data' => array()))->status(200);
            }
            return Response::renderJSON(array('code' => 400, 'response' => '', 'errors' => array('Błąd przy rejestracji.'), 'data' => array()))->status(400);
          break;
        }
        return Response::renderJSON(array('code' => 405, 'response' => '', 'errors' => array('Metoda niedozwolona.'), 'data' => array()))->status(405);
    }

    public function logout()
    {
        $this->baseClass->session->end();
        return $this->router->redirect('users/index');
    }
}