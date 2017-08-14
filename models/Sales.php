<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


class Sales extends model{

    
     public function getList($offset, $id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT sales.id, sales.date_sale, sales.total_price, sales.status, clients.name FROM sales LEFT JOIN clients ON clients.id = sales.id_clients WHERE sales.id_company = :id_company ORDER BY sales.date_sale DESC LIMIT $offset, 10");
        $sql->bindValue(":id_company",$id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array= $sql->fetchAll();
        }
        return $array;
    }
    
    public function getInfo($id, $id_company){
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, (SELECT clients.name FROM clients WHERE clients.id = sales.id_clients) as client_name FROM sales WHERE id =:id AND id_company =:id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array['info'] = $sql->fetch();
            
        }
        
        $sql = $this->db->prepare("SELECT sales_products.quant, sales_products.sales_price, inventory.name FROM sales_products LEFT JOIN inventory.id = sales_products.id_product WHERE sales_products.id_sale = :id_sale AND sales_products.id_company =:id_company");
        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":id_sale", $id);
        $sql->execute();
        
         if($sql->rowCount()>0){
            $array['products'] = $sql->fetchAll();
            
        }

        return $array;        
    }
    
   
    public function addSale($id_company, $id_clients, $id_user, $quant, $status){
        $i = new Inventory();
          
        $sql= $this->db->prepare("INSERT INTO sales SET id_company = :id_company, id_clients = :id_clients, id_user = :id_user, date_sale = NOW(), total_price = :total_price, status = :status");
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":id_clients",$id_clients);
        $sql->bindValue(":id_user",$id_user);
        $sql->bindValue(":total_price",'0');
        $sql->bindValue(":status",$status);
        $sql->execute();
        
        $id_sale = $this->db->lastInsertId();
       
         foreach ($quant as $id_prod => $quant_prod) {
            $sql = $this->db->prepare("SELECT price FROM inventory WHERE id = :id AND id_company = :id_company");
            $sql->bindValue(":id", $id_prod);
            $sql->bindValue(":id_company", $id_company);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $price = $row['price'];
                
                $sqlp= $this->db->prepare("INSERT INTO sales_products SET id_company = :id_company, id_sale = :id_sale, id_product = :id_product, quant = :quant, sale_price = :sale_price");
                $sqlp->bindValue(":id_company", $id_company);
                $sqlp->bindValue(":id_sale", $id_sale);
                $sqlp->bindValue(":id_product", $id_prod);
                $sqlp->bindValue(":quant", $quant_prod);
                $sqlp->bindValue(":sale_price", $price);
                $sqlp->execute();
                
                $i->dowInventory($id_prod, $id_company, $quant_prod, $id_user);
                                
                $total_price += $price * $quant_prod;
            }
        }// fim do foreach
        
        $sql = $this->db->prepare("UPDATE sales SET total_price = :total_price WHERE id = :id");
        $sql->bindValue(":total_price", $total_price);
        $sql->bindValue(":id", $id_sale);
        $sql->execute();
    }// fim do metodo 
    
    
    
    
}
