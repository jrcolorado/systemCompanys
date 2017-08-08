<?php
/**
 * Description of AjaxController
 *
 * @author joaoromario
 */
class AjaxController extends Controller{
    
    public function __construct() {
        parent::__construct();
               
        $u = new Users();
        if($u->isLogged() == false){
            header("Location: ".BASE_URL."/Login");
            exit();
        } 
    }
    
    public function index(){}
    
    
    
    public function search_inventory(){
         $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $i = new Inventory();
        
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $q = addslashes($_GET['q']);
            
            $inventory = $i->searchInventoryByName($q, $u->getCompany());
            
            foreach ($inventory as $citem){
                $data[] = Array(
                    'name'=> $citem['name'],
                    'link'=> BASE_URL.'/Inventory/view/'.$citem['id'] 
                );
            }
        }
        echo json_encode($data);
        
    }
    
    
    
    public function search_clients(){
         $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $c = new Clients();
        
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $q = addslashes($_GET['q']);
            
            $clients = $c->searchClientByName($q, $u->getCompany());
            
            foreach ($clients as $citem){
                $data[] = Array(
                    'name'=> $citem['name'],
                    'link'=> BASE_URL.'/Clients/view/'.$citem['id'] 
                );
            }
        }
        echo json_encode($data);
        
    }
    
}//fim da classe
