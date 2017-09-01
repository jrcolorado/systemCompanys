<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


class Sales extends model{

    
     public function getList($offset, $id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT sales.id, sales.date_sale, sales.total_price, sales.status, sales.nfe_key, clients.name FROM sales LEFT JOIN clients ON clients.id = sales.id_clients WHERE sales.id_company = :id_company ORDER BY sales.date_sale DESC LIMIT $offset, 10");
        $sql->bindValue(":id_company",$id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array= $sql->fetchAll();
        }
        return $array;
    }
    
    public function getInfo($id, $id_company){
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, (select clients.name from clients where clients.id = sales.id_clients) as client_name FROM sales WHERE id =:id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array['info'] = $sql->fetch();
            
        }
        
        $sql = $this->db->prepare("SELECT sales_products.quant, sales_products.sale_price, inventory.name FROM sales_products LEFT JOIN inventory ON inventory.id = sales_products.id_product WHERE sales_products.id_sale = :id_sale AND sales_products.id_company = :id_company");
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
    
        public function changeStatus($status, $id, $id_company){
            
            $sql = $this->db->prepare("UPDATE sales SET status = :status WHERE id =:id AND id_company =:id_company");
            $sql->bindValue(":id",$id);
            $sql->bindValue(":status",$status);
            $sql->bindValue(":id_company",$id_company);
            $sql->execute();
        
    }
    
    
    public function date_converter($_date = null) {
        $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
        if ($_date != null && preg_match($format, $_date, $partes)) {
            return $partes[3] . '-' . $partes[2] . '-' . $partes[1];
        }
        return false;
    }

    public function getSalesFiltered($client_name, $period1, $period2,$status, $order, $id_company){
          $array = array();
          
          /// echo $period1." AND ".$period2;
          //  exit();
                
          $sql = "SELECT clients.name, sales.date_sale, sales.status, sales.total_price FROM sales LEFT JOIN clients ON clients.id = sales.id_clients WHERE";
          
          $where = array();
          $where[] = " sales.id_company = :id_company";
          
          if(!empty($client_name)){
              $where[]= "clients.name = :client_name";
          }
          if(!empty($period1) && !empty($period2)){
              $where[]= "sales.date_sale BETWEEN :period1 AND :period2";
          }
          if($status != ''){
              $where[] = "sales.status = :status";
          }
          
          $sql .= implode(' AND ', $where);
          
          switch ($order){
              case 'date_desc':
              default:
                  $sql .= " ORDER BY sales.date_sale DESC";
                  break;
               case 'date_asc':
                  $sql .= " ORDER BY sales.date_sale ASC";
                  break;
              case 'status':
                  $sql .= " ORDER BY sales.status ASC";
                  break;       
              
              
          }
          
        //  echo $sql;
       //   exit();
          
          
       $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_company", $id_company);

        if (!empty($client_name)) {
            $sql->bindValue(":client_name", $client_name);
        }
        if (!empty($period1) && !empty($period2)) { 
            $sql->bindValue(":period1", $period1);
            $sql->bindValue(":period2", $period2);
        }
        if ($status != '') {
            $sql->bindValue(":status", $status);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        // print_r($array);

        return $array;
    }
    
    
    public function getTotalRevenue($period1, $period2, $id_company){
        $float =0;
        
        $sql = "SELECT SUM(total_price) as total FROM sales WHERE id_company = :id_company AND date_sale BETWEEN :period1 AND :period2";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":period1", $period1);
        $sql->bindValue(":period2", $period2);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
       
        $n = $sql->fetch();
       
        $float= $n['total'];

        return $float;
        
    }
    
    public function getRevenueList($period1, $period2, $id_company){
        $array = array();
        $currentDay = $period1;
        while ($period2 != $currentDay){
            $array[$currentDay]= 0;
            $currentDay = date('y-m-d', strtotime('+1 day', strtotime($currentDay)));
        }
        
        $sql = "SELECT DATE_FORMAT(date_sale, '%y-%m-%d') as date_sale, SUM(total_price) as total FROM sales WHERE id_company = :id_company AND date_sale BETWEEN :period1 AND :period2 GROUP BY DATE_FORMAT(date_sale, '%y-%m-%d')";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":period1", $period1);
        $sql->bindValue(":period2", $period2);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
       
       if($sql->rowCount()>0){
           $rows = $sql->fetchAll();
           
                
           foreach ($rows as $sale_item){
            
              $array[$sale_item['date_sale']] = $sale_item['total'];
             
           }
           
       }
      return $array;
        
    }
    
    
    public function getQtdStatusList($period1, $period2, $id_company){
         $array = array('1'=>0,'2'=>0,'3'=>0);
       
        $sql = "SELECT COUNT(status) as total, status FROM sales WHERE id_company = :id_company AND date_sale BETWEEN :period1 AND :period2 GROUP BY status ASC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":period1", $period1);
        $sql->bindValue(":period2", $period2);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
       
       if($sql->rowCount()>0){
           $rows = $sql->fetchAll();          
          // print_r($rows);
         //  exit();
           foreach ($rows as $sale_item){
             $array[$sale_item['status']] = $sale_item['total'];
             
           }           
       }
      
      return $array;       
        
    }
   
    
     public function getExpensesList($period1, $period2, $id_company){
         $array = array();
        $currentDay = $period1;
        while ($period2 != $currentDay){
            $array[$currentDay]= 0;
            $currentDay = date('y-m-d', strtotime('+1 day', strtotime($currentDay)));
        }
        
        $sql = "SELECT DATE_FORMAT(date_purches, '%y-%m-%d') as date_purches, SUM(total_price) as total FROM purchases WHERE id_company = :id_company AND date_purches BETWEEN :period1 AND :period2 GROUP BY DATE_FORMAT(date_purches, '%y-%m-%d')";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":period1", $period1);
        $sql->bindValue(":period2", $period2);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
       
       if($sql->rowCount()>0){
           $rows = $sql->fetchAll();
           
         //  print_r($rows);
         //  exit();
           
           foreach ($rows as $sale_item){
            
              $array[$sale_item['date_purches']] = $sale_item['total'];
             
           }
           
       }
      return $array;
        
        
        
    }
   
    

    public function getTotalExpenses($period1, $period2, $id_company){
        $float =0;
        
        $sql = "SELECT SUM(total_price) as total FROM purchases WHERE id_company = :id_company AND date_purchases BETWEEN :period1 AND :period2";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":period1", $period1);
        $sql->bindValue(":period2", $period2);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
       
        $n = $sql->fetch();
       
        $float= $n['total'];

        return $float;
        
    }
    
    public function getTotalproducts_sold($period1, $period2, $id_company){
        $int=0;
        
          $sql = "SELECT id FROM sales WHERE id_company = :id_company AND date_sale BETWEEN :period1 AND :period2";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":period1", $period1);
        $sql->bindValue(":period2", $period2);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
         if ($sql->rowCount() > 0) {
            $p = Array();
            foreach ($sql->fetchAll() as $sale_item){
                $p[]= $sale_item['id'];
            }
            
        $sql = $this->db->prepare("SELECT COUNT(*) as total FROM sales_products WHERE id_sale IN (". implode(',', $p).")");
        $sql->execute();
        $n = $sql->fetch();
        $int = $n['total'];
        
            }

        return $int;
        
    }
    
    
}
