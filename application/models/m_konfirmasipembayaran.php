<?php

class m_konfirmasipembayaran extends CI_Model {
    function __construct() {
        parent::__construct();
		if(!$this->session->userdata('loginData')){
            redirect('admin/login');
        }
        
    }

    function getAllListPending(){
        $this->db->select('*');
        $this->db->from('konfirmasipembayaran TP');
        $this->db->where('TP.status_konfirmasipembayaran','0');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	 function getAllPembayaranKonfirmasi(){
        $this->db->select('*');
        $this->db->from('konfirmasipembayaran TP');
        $this->db->where('TP.status_konfirmasipembayaran <>','0');
        $this->db->order_by('TP.tgl_confirm');
        $que = $this->db->get()->result_array();
        return $que;
    }

    function getfasilitastambahanByID($id){
        $this->db->select('*');
        $this->db->from('fasilitastambahan TP');
        $this->db->where('TP.id_fasilitastambahan',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
}
