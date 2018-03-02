<?php
/**
 * Project Name
 * Copyright (c) Firstname Lastname
 *
 * @license http://yourLicenceUrl/ (Licence Name)
 */

namespace Controller;
use Dframe\Config;
use Dframe\Router\Response;

/**
 * Here is a description of what this file is for.
 *
 * @author First Name <adres@email>
 */

class PageController extends \Controller\Controller
{
    /** 
     * initial function call working like __construct
     */
    public function init()
    {

    }

    public function error()
    {
        $view = $this->loadView('Index');

        $errorsTypes = array('404');
        if (!isset($_GET['type']) OR !in_array($_GET['type'], $errorsTypes)) {
            return $this->router->redirect('page/index');
        }

        return Response::create($view->fetch('errors/'.$_GET['type']))->status($_GET['type']);
        
    }

    public function index() 
    {
        $view = $this->loadView('Index');
        $view->assign('contents', 'Example assign');

        return $view->render('index');
    }


    public function responseExample() 
    {
        $view = $this->loadView('Index');
        $view->assign('contents', 'Example assign');

        return Response::create($view->fetch('index'));
    }


    public function json() 
    {
        return Response::renderJSON(array('return' => '1')); 
    }

    /**
     * Catch-all method for requests that can't be matched.
     *
     * @param  string    $method
     * @param  array     $parameters
     * @return Response
     */

    public function __call($method, $test)
    {

        $smartyConfig = Config::load('view/smarty');
        $view = $this->loadView('Index');

        $patchController = $smartyConfig->get('setTemplateDir', APP_DIR.'View/templates').'/page/'.htmlspecialchars($_GET['action']).$smartyConfig->get('fileExtension', '.html.php');
        
        if (!file_exists($patchController)) {  
            return $this->router->redirect('page/index');
        }

        return Response::create($view->fetch('page/'.htmlspecialchars($_GET['action'])));
        
    }

    //funkcja pomocnicza przy wysylaniu csv do bazy

    public function importCSV(){
        $View = $this->loadView('Index');

        switch ($_SERVER['REQUEST_METHOD']) 
        {
            case 'POST':
                $file = $_FILES['file'];

                $schemeToDb = array(
                    'kod' => 'pass_code',
                    'plec' => 'sex',
                    'dzielnica' => 'quarter',
                    'wiek' => 'age',
                    'imie' => 'firstname',
                    'naziwsko' => 'lastname',
                    'miasto' => 'city',
                    'ulica' => 'street',
                    'nr budynku' => 'build_nr',
                    'nr lokalu' => 'flat_nr',
                    'kod pocztowy' => 'post_code'
                );

                $scheme = array();

                $insertRows = array();

                $row = 1;
                if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $insertCell = array();
                        $num = count($data);
                        $row++;
                        for ($c=0; $c < $num; $c++) {
                            if(!empty($scheme)){
                                $insertCell[$schemeToDb[$scheme[$c]]] = $data[$c];
                            }else{
                                $insertCell[] = $data[$c];
                            }    
                        }
                        if(empty($scheme)){
                            $scheme = $insertCell;
                        }else{
                            $insertRows[] = $insertCell;
                        }
                    }
                    fclose($handle);
                }

                print_r('<pre>');
                var_dump($insertRows);
                die();
                break;
        }

        $View->render('import');
    }
    
}
