<?php

class m_user extends CI_Model {
    function __construct() {
        parent::__construct(); 
    }

    function getAlluser(){
        $this->db->select('*');
        $this->db->from('user TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getMaxUser(){
        $this->db->select('max(TP.id_user) id_user');
        $this->db->from('user TP');
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
    function getuserByID($id){
        $this->db->select('*');
        $this->db->from('user TP');
        $this->db->where('TP.id_user',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	
	
	
    

    
}

