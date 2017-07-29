<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class TesteLoginController extends Controller{
    
    
    public function index(){
        $data = array();
        
           

        $this->loadView('TesteLogin', $data);
    }

}

?>