<?php
/**
 * Description of SalesController
 *
 * @author joaoromario
 */
class ReportController extends Controller{
    
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
        
             
        if($u->hasPermission('report_view')){
            
           $this->loadTemplate("Report",$data);
            
        } else {
            header("Location: ".BASE_URL);
        } 
        
        
    }//fim do metodo index
    
    
    public function sales(){
        
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
        
             
        if($u->hasPermission('report_view')){
            
           $this->loadTemplate("Report_sales",$data);
            
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    
}//fim da classe
