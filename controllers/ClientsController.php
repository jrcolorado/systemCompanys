<?php
/**
 * Description of ClientsControlle
 *
 * @author joaoromari
 * 
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class ClientsController extends Controller{
    
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
       
        if($u->hasPermission('clients_view')){
            
            $c = new Clients();
            $offset=0;
            
            $data['clients_list']= $c->getList($offset);
            $data['edit_permission'] = $u->hasPermission('clients_edit');
            
            $this->loadTemplate('Clients', $data);
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
       
        if($u->hasPermission('clients_edit')){
            
            $c = new Clients();
            $offset=0;
            
                     
            $this->loadTemplate('Clients_add', $data);
        } else {
            header("Location: ".BASE_URL."/Clients");
        } 
        
        
    }
    

}//fim da classe
?>