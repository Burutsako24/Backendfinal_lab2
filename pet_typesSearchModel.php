<?php


//lab08/index.php/student/getStudent/12345678
defined('BASEPATH') OR exit('No direct script access allowed');
class pet_typesSearchModel extends CI_Model {

    public function getbytypeID($typeID){
        $query = $this->db->query(" SELECT * FROM  pet_types WHERE typeID = '$typeID' ");
        return $query->result_array();
    }
    public function getbytypeName($typeName){
        $query = $this->db->query(" SELECT * FROM  pet_types WHERE typeName = '$typeName' ");
        return $query->result_array();
    }
    public function getbyactiveFlag($activeFlag){
        $query = $this->db->query(" SELECT * FROM  pet_types WHERE activeFlag = '$activeFlag' ");
        return $query->result_array();
    }
    public function getbytypeGroup($typeGroup){
        $query = $this->db->query(" SELECT * FROM  pet_types WHERE typeGroup = '$typeGroup' ");
        return $query->result_array();
    }
    public function getbytypeDetail($typeDetail){
        $query = $this->db->query(" SELECT * FROM  pet_types WHERE typeDetail = '$typeDetail' ");
        return $query->result_array();
    }


}