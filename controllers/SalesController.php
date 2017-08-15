<?php
/**
 * Description of SalesController
 *
 * @author joaoromario
 */
class SalesController extends Controller{
    
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
        $i = new Inventory();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
        
        $data['status_desc'] = array(
            '1'=>'Aguardando Pgto.',
            '2'=>'Pago',
            '3'=>'Cancelada',
        );
       
        if($u->hasPermission('sales_view')){
            
            $s = new Sales();
            $offset= 0;
            $data['sales_list']= $s->getList($offset, $u->getCompany());
          //  $data['sales_info']= $i->getInfo($id, $u->getCompany());
            
            $this->loadTemplate("Sales",$data);
            
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
       
        if($u->hasPermission('sales_edit')){
            $s = new Sales();
            
            if(isset($_POST['client_id']) && !empty($_POST['client_id'])){
                $id_clients= addslashes($_POST['client_id']);
                $status = addslashes($_POST['status']);
                $quant = $_POST['quant'];
                
           
            
               $s->addSale($u->getCompany(), $id_clients, $u->getId(), $quant, $status);
               header("Location: " . BASE_URL . "/Sales");
            }
            
                     
            $this->loadTemplate("Sales_add",$data);
            
        } else {
            header("Location: ".BASE_URL);
        } 
        
        
    }// fim do metodo add sales
    
    
    public function edit($id){
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
         $data['status_desc'] = array(
            '1'=>'Aguardando Pgto.',
            '2'=>'Pago',
            '3'=>'Cancelada',
        );
       
        if($u->hasPermission('sales_view')){
            $s = new Sales();
            
            $data['permission_edit'] = $u->hasPermission('sales_edit');
            
            if(isset($_POST['status']) && !empty($_POST['status']) && $data['permission_edit']){
                $status= addslashes($_POST['status']);
                              
                $s->changeStatus($status, $id, $u->getCompany());
                
               header("Location: " . BASE_URL . "/Sales");
            }
            
            $data['sales_info']= $s->getInfo($id, $u->getCompany());
            
            $this->loadTemplate("Sales_edit",$data);
            
        } else {
            header("Location: ".BASE_URL);
        } 
        
        
    }// fim do metodo edit sales
    
    
    
    
    
}//fim da classe
