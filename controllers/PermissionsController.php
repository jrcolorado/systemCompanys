<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class PermissionsController extends Controller{
    
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
       
        if($u->hasPermission('permissions_view')){
            $permissions = new Permissions();
            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['permissions_group_list']= $permissions->getGroupList($u->getCompany());
            $this->loadTemplate('Permissions', $data);
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    public function add(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('permissions_view')){
            $permissions = new Permissions();
            
            if(isset($_POST['name']) && !empty($_POST['name'])){
                $pname = addslashes($_POST[name]);
                $permissions->add($pname,$u->getCompany() );
                header("Location: ".BASE_URL."/Permissions");
            }
            
            $this->loadTemplate('Permissions_add', $data);
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    
    public function add_group(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('permissions_view')){
            $permissions = new Permissions();
            
            if(isset($_POST['name']) && !empty($_POST['name'])){
                $gname = addslashes($_POST[name]);
                $plist = $_POST['permissions'];
                $permissions->add_group($gname,$plist,$u->getCompany() );
                header("Location: ".BASE_URL."/Permissions");
            }
            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $this->loadTemplate('Permissions_add_group', $data);
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    public function set_group($id){
         $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('permissions_view')){
            $permissions = new Permissions();
            
            if(isset($_POST['name']) && !empty($_POST['name'])){
                $gname = addslashes($_POST[name]);
                $plist = $_POST['permissions'];
                $permissions->set_group($gname,$plist,$id,$u->getCompany() );
                header("Location: ".BASE_URL."/Permissions");
            }
            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['group_info'] = $permissions->getGroup($id,$u->getCompany());
            $this->loadTemplate('Permissions_set_group', $data);
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    
    public function delete($id){
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('permissions_view')){
            $permissions = new Permissions();
           
            $permissions->delete($id);
             header("Location: ".BASE_URL."/Permissions");
                            
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    public function delete_group($id){
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('permissions_view')){
            $permissions = new Permissions();           
            $permissions->delete_group($id);
             header("Location: ".BASE_URL."/Permissions");                            
        } else {
            header("Location: ".BASE_URL);
        } 
    }

}

?>