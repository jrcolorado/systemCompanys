<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class UsersController extends Controller{
    
    public function __construct() {
        parent::__construct();
               
        $u = new Users();
        if($u->isLogged() == false){
            header("Location: ".BASE_URL."/Login");
            exit();
        } 
    }


    public function index(){
       
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('users_view')){
            
            $data['users_list'] = $u->getList($u->getCompany());
            
            $this->loadTemplate('Users', $data);
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('users_view')) {
            $p = new Permissions();
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = addslashes($_POST['email']);
                $pass = addslashes($_POST['password']);
                $group = addslashes($_POST['group']);

                $a = $u->add($email, $pass, $group, $u->getCompany());

                if ($a == '1') {
                    header("Location: " . BASE_URL . "/Users");
                } else {
                    $data['error_msg'] = "E-mail já cadastrado!";
                }
            }
            $data['group_list'] = $p->getGroupList($u->getCompany());
            $this->loadTemplate('Users_add', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    
    public function edit($id){
        
          $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('users_view')) {
            $p = new Permissions();
            if (isset($_POST['group']) && !empty($_POST['group'])) {
                $pass = addslashes($_POST['password']);
                $group = addslashes($_POST['group']);

                $u->edit($pass, $group, $id, $u->getCompany());

                header("Location: " . BASE_URL . "/Users");
                
            }
            $data['user_info'] = $u->getInfo($id, $u->getCompany()) ;
            $data['group_list'] = $p->getGroupList($u->getCompany());
            $this->loadTemplate('Users_edit', $data);
        } else {
            header("Location: " . BASE_URL);
        }
        
        
    }
    
    
    
     public function delete($id){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('users_view')) {
            $p = new Permissions();
         
            $u->delete($id, $u->getCompany());
            header("Location: " . BASE_URL."/Users");
         } else {
            header("Location: " . BASE_URL);
         }
        
        
    }
}

?>