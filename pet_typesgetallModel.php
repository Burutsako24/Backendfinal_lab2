<?php


//lab08/index.php/student/getStudent/12345678
defined('BASEPATH') OR exit('No direct script access allowed');
class pet_typesgetallModel extends CI_Model {
    
    
    public function getpet_typesAll(){
        $query = $this->db->get('pet_types');
        return $query->result_array();
    }
}