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
        $s = new Sales();
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
        
       // $data['products_sold']= 24;
        $data['revenue']= $s->getTotalRevenue(date('y-m-d', strtotime('-30 days')), date('y-m-d'), $u->getCompany());
        $data['expenses']= $s->getTotalExpenses(date('y-m-d', strtotime('-30 days')), date('y-m-d'), $u->getCompany());      
        $data['products_sold']= $s->getTotalproducts_sold(date('y-m-d', strtotime('-30 days')), date('y-m-d'), $u->getCompany());      
        
        $data['days_list']= array();
        //cria um for ao contrario, para pegar os ultimos 30 dias 
        for($q=30; $q>-1; $q--){
            $data['days_list'][]= date('d/m', strtotime('-'.$q.'days'));
            
        }
        $data['revenue_list']= $s->getRevenueList(date('y-m-d', strtotime('-30 days')), date('y-m-d'), $u->getCompany()); 
        $data['expenses_list']= $s->getExpensesList(date('y-m-d', strtotime('-30 days')), date('y-m-d'), $u->getCompany()); 
        $data['status_list']= $s->getQtdStatusList(date('y-m-d', strtotime('-30 days')), date('y-m-d'), $u->getCompany());    
        
        $this->loadTemplate('Home', $data);
         
        
    }

}