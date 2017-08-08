<?php
/**
 * Description of AjaxController
 *
 * @author joaoromario
 */
class InventoryController extends Controller{
    
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
       
        if($u->hasPermission('inventory_view')){
            
            $i = new Inventory();
            $offset= 0;
            
            $data['inventory_list']= $i->getList($offset, $u->getCompany());
            
            $data['add_permission']= $u->hasPermission('inventory_add');
            $data['edit_permission']= $u->hasPermission('inventory_edit');
            
            $this->loadTemplate("Inventory",$data);
            
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
       
        if($u->hasPermission('inventory_add')){
            
            $i = new Inventory();
         if (isset($_POST['name']) && !empty($_POST['name'])) {
             
             $name = strtoupper(addslashes($_POST['name']));
             $price = addslashes($_POST['price']);
             $quant = addslashes($_POST['quant']);
             $min_quant = addslashes($_POST['min_quant']);


                $i->add($u->getCompany(), $name, $price, $quant, $min_quant);
                header("Location: " . BASE_URL . "/Inventory");
            }

            $this->loadTemplate('Inventory_add', $data);
        } else {
            header("Location: ".BASE_URL."/Inventory");
        } 
             
    }
    
    public function edit($id) {
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('inventory_edit')){
            
            $i = new Inventory();
         if (isset($_POST['name']) && !empty($_POST['name'])) {
             
             $name = strtoupper(addslashes($_POST['name']));
             $price = addslashes($_POST['price']);
             $quant = addslashes($_POST['quant']);
             $min_quant = addslashes($_POST['min_quant']);


                $i->edit($id, $u->getCompany(), $name, $price, $quant, $min_quant);
                header("Location: " . BASE_URL . "/Inventory");
            }
            
            $data['inventory_info']= $i->getInfo($id, $u->getCompany());
            $this->loadTemplate('Inventory_edit', $data);
        } else {
            header("Location: ".BASE_URL."/Inventory");
        } 
    }
    
     public function view($id) {
        
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail(); 
       
        if($u->hasPermission('inventory_view')){
            
            $i = new Inventory();
         if (isset($_POST['name']) && !empty($_POST['name'])) {
             
             $name = strtoupper(addslashes($_POST['name']));
             $price = addslashes($_POST['price']);
             $quant = addslashes($_POST['quant']);
             $min_quant = addslashes($_POST['min_quant']);


               header("Location: " . BASE_URL . "/Inventory");
            }
            
            $data['inventory_info']= $i->getInfo($id, $u->getCompany());
            $this->loadTemplate('Inventory_view', $data);
        } else {
            header("Location: ".BASE_URL."/Inventory");
        } 
    }
    
}//fim da classe
