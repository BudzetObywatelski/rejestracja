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

namespace Controller;
use Dframe\Config;
use Dframe\Router\Response;

/**
 *
 * @author Amadeusz Dzięcioł <amadeusz.xd@gmail.com>
 */

class PageController extends \Controller\Controller
{
    public function error()
    {
        $view = $this->loadView('Index');

        $errorsTypes = array('404');
        if (!isset($_GET['type']) OR !in_array($_GET['type'], $errorsTypes)) {
            return $this->router->redirect('page/index');
        }

        return Response::create($view->fetch('errors/'.$_GET['type']))->status($_GET['type']);
        
    }
    //funkcja pomocnicza przy wysylaniu csv do bazy

    public function importCSV()
    {
        $importConfig = Config::load('import')->get('import');
        if(!$importConfig['allow']) {
            return $this->router->redirect('users/index');
        }

        if (!isset($_SERVER['PHP_AUTH_PW']) OR !isset($_SERVER['PHP_AUTH_USER']) OR $_SERVER['PHP_AUTH_PW'] != $importConfig['password'] OR $_SERVER['PHP_AUTH_USER'] != $importConfig['user']) {
            return Response::create('Anulowano przejście na stronę.')
                ->status(401)
                ->headers([
                    'WWW-Authenticate' => 'Basic realm="Login"', 
                ]); 
        }

        
        $View = $this->loadView('Index');
        $UsersModel = $this->loadModel('Users');

        switch ($_SERVER['REQUEST_METHOD']) 
        {
        case 'POST':
            $file = $_FILES['file'];

            $schemeToDb = array(
                'pass_code' => 'pass_code',
                'sex' => 'sex',
                'region' => 'quarter',
                'age' => 'age',
                'firstname' => 'firstname',
                'lastname' => 'lastname',
                'city' => 'city',
                'street' => 'street',
                'build_nr' => 'build_nr',
                'flat_nr' => 'flat_nr',
                'post_code' => 'post_code'
            );

            $scheme = array();

            $insertRows = array();

            $row = 1;
            if (($handle = fopen($file['tmp_name'], "r")) !== false) {
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $insertCell = array();
                    $num = count($data);
                    $row++;
                    for ($c=0; $c < $num; $c++) {
                        if(!empty($scheme)) {
                            $insertCell[$schemeToDb[$scheme[$c]]] = $data[$c];
                        }else{
                            $insertCell[] = $data[$c];
                        }    
                    }
                    if(empty($scheme)) {
                        $scheme = $insertCell;
                    }else{
                        $insertRows[] = $insertCell;
                    }
                }
                fclose($handle);
            }

            $status = array('errors' => 0, 'success' => 0);
            foreach ($insertRows as $keyI => $row) {
                $addUser = $UsersModel->addUser($row);
                if($addUser['return']) {
                    $status['success']++;
                }else{
                    $status['errors']++; 
                }
            }

            echo 'Status importu:';
            print_r($status);
            die();
                break;
        }

        $View->render('import');
    }
    
}
