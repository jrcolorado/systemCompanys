<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


class Inventory extends model{

    public function getList($offset, $id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT * FROM inventory WHERE id_company = :id_company LIMIT $offset, 10");
        $sql->bindValue(":id_company",$id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array= $sql->fetchAll();
        }
        return $array;
    }
    
    public function getInfo($id, $id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT * FROM inventory WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array = $sql->fetch();
        }
        
        return $array;
               
    }
    
        public function add($id_company, $name, $price, $quant, $min_quant){
        
        $sql= $this->db->prepare("INSERT INTO inventory SET id_company = :id_company, name = :name, price = :price, quant = :quant, min_quant = :min_quant");
       
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":price",$price);
        $sql->bindValue(":quant",$quant );
        $sql->bindValue(":min_quant", $min_quant);
        $sql->execute();
        
    }
         
    public function edit($id,$id_company, $name, $price, $quant, $min_quant){
        
        $sql= $this->db->prepare("UPDATE inventory SET id_company = :id_company, name = :name, price = :price, quant = :quant, min_quant = :min_quant WHERE id =:id AND id_company = :id_company2");
       
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":price",$price);
        $sql->bindValue(":quant",$quant );
        $sql->bindValue(":min_quant", $min_quant);
        $sql->bindValue(":id_company2",$id_company);
        $sql->bindValue(":id",$id );
        $sql->execute();
        
    }
    
     
    public function searchInventoryByName($name, $id_company){
        $array = array();
        
        $sql = $this->db->prepare("SELECT name, id FROM inventory WHERE name LIKE :name LIMIT 10");
        $sql->bindValue(':name', '%'.$name.'%');
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }
        return $array;
        
    }
         
   

}
