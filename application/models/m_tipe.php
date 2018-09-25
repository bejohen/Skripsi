<?php

class m_tipe extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }

    function getAllTipe(){
        $this->db->select('*');
        $this->db->from('tipekamar TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getMaxTipe(){
        $this->db->select('max(id_tipekamar) id_tipekamar');
        $this->db->from('tipekamar TP');
        $que = $this->db->get()->result_array();
        return $que[0];
    }

    function getTipeByID($id){
        $this->db->select('*');
        $this->db->from('tipekamar TP');
        $this->db->where('TP.id_tipekamar',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
}
