<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


class Clients extends model{

    public function getList($offset){
        $sql= $this->db->prepare("SELECT * FROM clients LIMIT :offset, 10");
        $sql->bindValue(":offset", $offset);
        $sql->execute();
    }
    
    

}
