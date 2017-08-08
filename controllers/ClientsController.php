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
            
            $data['p'] = 1;
            if(isset($_GET['p']) && !empty($_GET['p'])){
                $data['p'] = intval($_GET['p']);
                if($data['p']==0){
                    $data['p']= 1;
                }
            }
            
            $offset =(10 * ($data['p']-1));
            
            $data['clients_list']= $c->getList($offset, $u->getCompany());
            $data['clients_count'] = $c->getCount($u->getCompany());
            $data['p_count'] = ceil($data['clients_count']/10);
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
         if (isset($_POST['name']) && !empty($_POST['name'])) {
             
                $name = strtoupper(addslashes($_POST['name']));
                $email = addslashes($_POST['email']);
                $phone = strtoupper(addslashes($_POST['phone']));
                $addres = strtoupper(addslashes($_POST['addres']));
                $addres_number1 = addslashes($_POST['addres_number1']);
                $addres_number2 = addslashes($_POST['addres_number2']);
                $addres_neighb = strtoupper(addslashes($_POST['addres_neighb']));
                $addres_city = strtoupper(addslashes($_POST['addres_city']));
                $addres_state = strtoupper(addslashes($_POST['addres_state']));
                $addres_country = strtoupper(addslashes($_POST['addres_country']));
                $addres_zipcode = strtoupper(addslashes($_POST['addres_zipcode']));
                $stars = addslashes($_POST['stars']);
                $internal_obs = strtoupper(addslashes($_POST['internal_obs']));

                $c->add($u->getCompany(), $name, $email, $phone, $addres, $addres_number1, $addres_number2,$addres_neighb,$addres_city, $addres_state, $addres_country,$addres_zipcode, $stars, $internal_obs);
                header("Location: " . BASE_URL . "/Clients");
            }

            $this->loadTemplate('Clients_add', $data);
        } else {
            header("Location: ".BASE_URL."/Clients");
        } 
             
    }
    
    public function edit($id) {
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('clients_edit')){
            
            $c = new Clients();
         if (isset($_POST['name']) && !empty($_POST['name'])) {
             
                $name = strtoupper(addslashes($_POST['name']));
                $email = addslashes($_POST['email']);
                $phone = strtoupper(addslashes($_POST['phone']));
                $addres = strtoupper(addslashes($_POST['addres']));
                $addres_number1 = addslashes($_POST['addres_number1']);
                $addres_number2 = addslashes($_POST['addres_number2']);
                $addres_neighb = strtoupper(addslashes($_POST['addres_neighb']));
                $addres_city = strtoupper(addslashes($_POST['addres_city']));
                $addres_state = strtoupper(addslashes($_POST['addres_state']));
                $addres_country = strtoupper(addslashes($_POST['addres_country']));
                $addres_zipcode = strtoupper(addslashes($_POST['addres_zipcode']));
                $stars = addslashes($_POST['stars']);
                $internal_obs = strtoupper(addslashes($_POST['internal_obs']));

                $c->edit($id,$u->getCompany(), $name, $email, $phone, $addres, $addres_number1, $addres_number2,$addres_neighb,$addres_city, $addres_state, $addres_country,$addres_zipcode, $stars, $internal_obs);
                header("Location: " . BASE_URL . "/Clients");
            }
            $data['client_info']=$c->getInfo($id, $u->getCompany());
            $this->loadTemplate('Clients_edit', $data);
        } else {
            header("Location: ".BASE_URL."/Clients");
        } 
    }
        public function view($id) {
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('clients_view')){
            
            $c = new Clients();
         if (isset($_POST['name']) && !empty($_POST['name'])) {
             
                $name = strtoupper(addslashes($_POST['name']));
                $email = addslashes($_POST['email']);
                $phone = strtoupper(addslashes($_POST['phone']));
                $addres = strtoupper(addslashes($_POST['addres']));
                $addres_number1 = addslashes($_POST['addres_number1']);
                $addres_number2 = addslashes($_POST['addres_number2']);
                $addres_neighb = strtoupper(addslashes($_POST['addres_neighb']));
                $addres_city = strtoupper(addslashes($_POST['addres_city']));
                $addres_state = strtoupper(addslashes($_POST['addres_state']));
                $addres_country = strtoupper(addslashes($_POST['addres_country']));
                $addres_zipcode = strtoupper(addslashes($_POST['addres_zipcode']));
                $stars = addslashes($_POST['stars']);
                $internal_obs = strtoupper(addslashes($_POST['internal_obs']));
    
                header("Location: " . BASE_URL . "/Clients");
            }
            $data['client_info']=$c->getInfo($id, $u->getCompany());
            $this->loadTemplate('Clients_view', $data);
        } else {
            header("Location: ".BASE_URL."/Clients");
        } 
        
    }
    

}//fim da classe
?>