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
    
    
     public function sales_pdf(){
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        
         $data['status_desc'] = array(
            '1'=>'Aguardando Pgto.',
            '2'=>'Pago',
            '3'=>'Cancelada',
        );
        
             
        if($u->hasPermission('report_view')){
            //date('d/m/Y', strtotime($data_sql));
            $client_name = addslashes($_GET['client_name']);
            $periodi = addslashes($_GET['period1']);
            $periodf = addslashes($_GET['period2']);
            $status = addslashes($_GET['status']);
            $order = addslashes($_GET['order']);
                              
            $s = new Sales();

            $period1 = $s->date_converter($periodi);
            $period2 = $s->date_converter($periodf);

       ///  echo $period1." A ".$period2;
        // exit();

            $data['sales_list']= $s->getSalesFiltered($client_name, $period1, $period2,$status, $order, $u->getCompany());
            $data['filters']= $_GET;
            
            $this->loadLibrary('mpdf60/mpdf');
            ob_start();//buffer para carregar dados impresso pela View
            $this->loadView("Report_sales_pdf", $data);
            $html = ob_get_contents();//carrega os dados do buffer na variavel $html
            ob_end_clean(); // limpa a memoria do buffer
            
            $mpdf = new mPDF();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    public function inventory(){
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $i = new Inventory();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
        
                   
        if($u->hasPermission('report_view')){
            
           $this->loadTemplate("Report_inventory",$data);
            
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
    
    public function inventory_pdf(){
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        
                     
        if($u->hasPermission('report_view')){
            $i = new Inventory();
            
            $data['inventory_list']= $i->getInventoryFiltered($u->getCompany());
            $data['filters']= $_GET;
            
            $this->loadLibrary('mpdf60/mpdf');
            ob_start();//buffer para carregar dados impresso pela View
            $this->loadView("Report_inventory_pdf", $data);
            $html = ob_get_contents();//carrega os dados do buffer na variavel $html
            ob_end_clean(); // limpa a memoria do buffer
            
            $mpdf = new mPDF();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            header("Location: ".BASE_URL);
        } 
    }
    
}//fim da classe
