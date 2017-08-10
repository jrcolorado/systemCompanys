<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


class Clients extends model{

    public function getList($offset, $id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT * FROM clients WHERE id_company = :id_company LIMIT $offset, 10");
        $sql->bindValue(":id_company",$id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array= $sql->fetchAll();
        }
        return $array;
    }
    
    public function getInfo($id, $id_company){
        $array = array();
        $sql= $this->db->prepare("SELECT * FROM clients WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array = $sql->fetch();
        }
        
        return $array;
               
    }

    public function getCount($id_company){
        $r = 0;
        $sql= $this->db->prepare("SELECT COUNT(*) as c FROM clients WHERE id_company = :id_company");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        $row = $sql->fetch();
        
        $r = $row['c'];
        
        
        return $r;
    }

    

        public function add($id_company, $name, $email ='', $phone ='', $addres ='', $addres_number1 ='', $addres_number2 ='',$addres_neighb ='',$addres_city ='', $addres_state ='', $addres_country ='',$addres_zipcode ='', $stars ='3', $internal_obs =''){
        
        $sql= $this->db->prepare("INSERT INTO clients SET id_company = :id_company, name = :name, email = :email, phone = :phone, addres = :addres, addres_number1 = :addres_number1, addres_number2 = :addres_number2, addres_neighb = :addres_neighb , addres_city = :addres_city,addres_state = :addres_state, addres_country = :addres_country, addres_zipcode = :addres_zipcode, stars = :stars, internal_obs = :internal_obs");
       
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":email",$email);
        $sql->bindValue(":phone",$phone );
        $sql->bindValue(":addres_zipcode", $addres_zipcode);
        $sql->bindValue(":addres",$addres );
        $sql->bindValue(":addres_city",$addres_city );
        $sql->bindValue(":addres_neighb", $addres_neighb);
        $sql->bindValue(":addres_number1", $addres_number1);
        $sql->bindValue(":addres_number2",$addres_number2 );
        $sql->bindValue(":addres_state", $addres_state);
        $sql->bindValue(":addres_country", $addres_country);        
        $sql->bindValue(":stars",$stars );
        $sql->bindValue(":internal_obs",$internal_obs);
        $sql->execute();
        
        return $this->db->lastInsertId();
        
    }
          
    
    public function edit($id, $id_company, $name, $email, $phone, $addres, $addres_number1, $addres_number2,$addres_neighb,$addres_city, $addres_state, $addres_country,$addres_zipcode, $stars, $internal_obs){
        
        $sql= $this->db->prepare("UPDATE clients SET id_company = :id_company, name = :name, email = :email, phone = :phone, addres = :addres, addres_number1 = :addres_number1, addres_number2 = :addres_number2, addres_neighb = :addres_neighb , addres_city = :addres_city,addres_state = :addres_state, addres_country = :addres_country, addres_zipcode = :addres_zipcode, stars = :stars, internal_obs = :internal_obs where id = :id AND id_company = :id_company2");
       
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":name",$name);
        $sql->bindValue(":email",$email);
        $sql->bindValue(":phone",$phone );
        $sql->bindValue(":addres_zipcode", $addres_zipcode);
        $sql->bindValue(":addres",$addres );
        $sql->bindValue(":addres_city",$addres_city );
        $sql->bindValue(":addres_neighb", $addres_neighb);
        $sql->bindValue(":addres_number1", $addres_number1);
        $sql->bindValue(":addres_number2",$addres_number2 );
        $sql->bindValue(":addres_state", $addres_state);
        $sql->bindValue(":addres_country", $addres_country);        
        $sql->bindValue(":stars",$stars );
        $sql->bindValue(":internal_obs",$internal_obs);
        $sql->bindValue(":id",$id );
        $sql->bindValue(":id_company2",$id_company);
        $sql->execute();
        
    }
    
    
    public function searchClientByName($name, $id_company){
        $array = array();
        
        $sql = $this->db->prepare("SELECT name, id FROM clients WHERE name LIKE :name ");
        $sql->bindValue(':name', '%'.$name.'%');
        $sql->execute();
        
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }
        return $array;
        
    }
    

}
