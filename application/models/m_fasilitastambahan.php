<?php

class m_fasilitastambahan extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }

    function getAllfasilitastambahan(){
        $this->db->select('*');
        $this->db->from('fasilitastambahan TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getMaxfasilitastambahan(){
        $this->db->select('max(TP.id_fasilitastambahan) id_fasilitastambahan');
        $this->db->from('fasilitastambahan TP');
        $que = $this->db->get()->result_array();
        return $que[0];
    }

    function getfasilitastambahanByID($id){
        $this->db->select('*');
        $this->db->from('fasilitastambahan TP');
        $this->db->where('TP.id_fasilitastambahan',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
}
