<?php

class m_petugas extends CI_Model {
    function __construct() {
        parent::__construct(); 
    }

    function getAllPetugas(){
        $this->db->select('*');
        $this->db->from('user TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
    function getPetugasByID($id){
        $this->db->select('*');
        $this->db->from('user TP');
        $this->db->where('TP.nik',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	
	
	
    

    
}

