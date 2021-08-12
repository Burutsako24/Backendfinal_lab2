<?php


//lab08/index.php/student/getStudent/12345678
defined('BASEPATH') OR exit('No direct script access allowed');
class pet_typesModel extends CI_Model {
    
    
    public function insert($data){
        try{
            $sql = "INSERT INTO pet_types(typeID,typeName,activeFlag,typeGroup,typeDetail) 
            VALUES ('".$data["typeID"]."','".$data["typeName"]."','".$data["activeFlag"]."','".$data["typeGroup"]."','".$data["typeDetail"]."') ";
            $query = $this->db->query($sql);
            return array("Status"=>"success","Message"=>"Insert Complete","data"=>$data);
        }catch(Exception $e){
            return array("Status"=>"error","Message"=>$e->getMessage());

        }
    }
}