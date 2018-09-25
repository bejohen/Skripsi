<?php

class m_kamar extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }

    function getAllKamar(){
        $this->db->select('*,TK.tipekamar');
        $this->db->from('kamar TP');
        $this->db->join('tipekamar TK','TP.id_tipekamar = TK.id_tipekamar');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	 function getMaxKamar(){
        $this->db->select('max(id_kamar) id_kamar');
        $this->db->from('kamar TP');
        $que = $this->db->get()->result_array();
        return $que[0];
    }

    function getKamarByID($id){
        $this->db->select('TP.*,TK.tipekamar');
        $this->db->from('kamar TP');
        $this->db->join('tipekamar TK','TP.id_tipekamar = TK.id_tipekamar');
        $this->db->where('TP.id_kamar',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	 function getKamarReservasiByID($id){
		 $date = date('Y-m-d');
        $this->db->select('TP.*,TK.tipekamar');
        $this->db->from('kamar TP');
        $this->db->join('tipekamar TK','TP.id_tipekamar = TK.id_tipekamar');
        $this->db->join('detilreservasi TR','TR.id_kamar = TP.id_kamar');
        $this->db->join('reservasi R','R.id_reservasi = TR.id_reservasi');
        $this->db->where('TP.id_kamar',$id);
        $this->db->where('R.tglcheckout >=',$date);
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getNomorKamar($id){
        $this->db->select('TR.*,TP.lantai_kamar lantai_kamar');
        $this->db->from('detilkamar TR');
        $this->db->join('kamar TP','TP.id_kamar= TR.id_kamar');
        $this->db->where('TP.id_kamar',$id);
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getFasilitasInclude($id){
        $this->db->select('TP.*,TF.nama_fasilitasinclude,TF.content');
        $this->db->from('detilfasilitaskamar TP');
        $this->db->join('fasilitasinclude TF','TF.id_fasilitasinclude = TP.id_fasilitasinclude');
        $this->db->where('TP.id_kamar',$id);
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getAllKamarAvailable(){
        $this->db->select('*,TK.tipekamar');
        $this->db->from('kamar TP');
        $this->db->join('tipekamar TK','TP.id_tipekamar = TK.id_tipekamar');
        $this->db->join('detilkamar TD','TP.id_kamar = TD.id_kamar');
		// $this->db->where('TD.status','1');
		$this->db->group_by('TP.id_kamar');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	
	
}
