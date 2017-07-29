<?php
   
error_reporting(E_ALL);
ini_set('display_errors', 'On');

class HomeController extends Controller{

    public function __construct() {
        parent::__construct();
               
        $u = new Users();
        if($u->isLogged() == false){
            header("Location: ".BASE_URL."/Login");
            exit();
        } 
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
        
                
        $this->loadTemplate('Home', $data);
         
        
    }

}