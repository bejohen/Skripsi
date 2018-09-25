<?php

class m_fasilitasinclude extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }

    function getAllFasilitasInclude(){
        $this->db->select('*');
        $this->db->from('fasilitasinclude TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getMaxFasilitasInclude(){
        $this->db->select('max(TP.id_fasilitasinclude) id_fasilitasinclude');
        $this->db->from('fasilitasinclude TP');
        $que = $this->db->get()->result_array();
        return $que[0];
    }

    function getFasilitasIncludeByID($id){
        $this->db->select('*');
        $this->db->from('fasilitasinclude TP');
        $this->db->where('TP.id_fasilitasinclude',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
}
