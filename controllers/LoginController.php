<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class LoginController extends Controller{
    
    
    public function index(){
        $data = array();
        
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                        $email = addslashes($_POST['email']);
                        $password = addslashes($_POST['password']);

                        $u = new Users();
                        if ($u->doLogin($email, $password)) {

                            header("Location:".BASE_URL);
                            exit;
                        } else {
                            $data['error'] = "E-mail e/ou senha invalido.";
                        }
                    }

        $this->loadView('Login', $data);
    }
    
   /** 
    public function logout(){
        $u = new Users();
        $u->setLoggedUser();
        if($u->hasPermission('logout')){
             $u->logout();
             header("Location: ".BASE_URL);
        }else {
            echo "NÃO PODE FAZER LOGOUT....";
            exit();
        }
       
    }*/
    
    
    
    
    public function logout(){
        $u = new Users();
        $u->logout();
        header("Location: ".BASE_URL);
        
        }
     
     
    
    

}

?>