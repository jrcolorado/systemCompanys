
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
    
    public function add($id_company,$id_user, $name, $price, $quant, $min_quant){
        
        $sql= $this->db->prepare("INSERT INTO inventory SET id_company = :id_company, name = :name, price = :price, quant = :quant, min_quant = :min_quant");
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":price",$price);
        $sql->bindValue(":quant",$quant );
        $sql->bindValue(":min_quant", $min_quant);
        $sql->execute();
        
        $id_product = $this->db->lastInsertId();
        $sql1 = $this->db->prepare("INSERT INTO inventory_history  SET id_company = :id_company, id_product = :id_product, action = :action, id_user = :id_user, date_action = NOW()");
        $sql1->bindValue(":id_company",$id_company);
        $sql1->bindValue(":id_product",$id_product);
        $sql1->bindValue(":id_user",$id_user);
        $sql1->bindValue(":action","add");
        $sql1->execute();
        
        
    }
         
    public function edit($id,$id_company,$id_user, $name, $price, $quant, $min_quant){
        
        $sql= $this->db->prepare("UPDATE inventory SET id_company = :id_company, name = :name, price = :price, quant = :quant, min_quant = :min_quant WHERE id =:id AND id_company = :id_company2");
       
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":price",$price);
        $sql->bindValue(":quant",$quant );
        $sql->bindValue(":min_quant", $min_quant);
        $sql->bindValue(":id_company2",$id_company);
        $sql->bindValue(":id",$id );
        $sql->execute();
        
      
        $sql1 = $this->db->prepare("INSERT INTO inventory_history  SET id_company = :id_company, id_product = :id_product, action = :action, id_user = :id_user, date_action = NOW()");
        $sql1->bindValue(":id_company",$id_company);
        $sql1->bindValue(":id_product",$id);
        $sql1->bindValue(":id_user",$id_user);
        $sql1->bindValue(":action","edit");
        $sql1->execute();
    }
    
     
    public function searchInventoryByName($name, $id_company){
        $array = array();
        
        $sql = $this->db->prepare("SELECT name, id, price, quant FROM inventory WHERE name LIKE :name AND id_company = :id_company LIMIT 10");
        $sql->bindValue(':name', '%'.$name.'%');
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }
        return $array;
        
    }
    
    public function dowInventory($id_prod, $id_company, $quant_prod, $id_user){
        
        $sql= $this->db->prepare("UPDATE inventory SET quant = quant - $quant_prod WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id",$id_prod);
        $sql->bindValue(":id_company",$id_company);
        $sql->execute();
        
        
        $sql1 = $this->db->prepare("INSERT INTO inventory_history  SET id_company = :id_company, id_product = :id_product, action = :action, id_user = :id_user, date_action = NOW()");
        $sql1->bindValue(":id_company",$id_company);
        $sql1->bindValue(":id_product",$id_prod);
        $sql1->bindValue(":id_user",$id_user);
        $sql1->bindValue(":action","dwn");
        $sql1->execute();
                
       
        
    }
    
    public function getInventoryFiltered($id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT *, (min_quant-quant) as dif FROM inventory WHERE quant <= min_quant AND id_company = :id_company ORDER BY dif DESC");
       $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }
        
        return $array;
        
        
    }
       
   

}
