<?php

class m_pelanggan extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }

    function getAllPelanggan(){
        $this->db->select('*');
        $this->db->from('pelanggan TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getMaxPelanggan(){
        $this->db->select('max(id_pelanggan) id_pelanggan');
        $this->db->from('pelanggan TP');
        $que = $this->db->get()->result_array();
        return $que[0];
    }

    function getPelangganByID($id){
        $this->db->select('*');
        $this->db->from('pelanggan TP');
        $this->db->where('TP.id_pelanggan',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	function getPelangganByNoktp($id){
        $this->db->select('*');
        $this->db->from('pelanggan TP');
        $this->db->where('TP.noktp',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	function cekEmailExist($email){
        $this->db->select('*');
        $this->db->from('pelanggan TP');
        $this->db->where('TP.email',$email);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
}
