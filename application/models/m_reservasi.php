<?php

class m_reservasi extends CI_Model {
    function __construct() {
        parent::__construct();
        
    }

    function getReservasiByPeriode($bln,$thn){
        $this->db->select('*,TP.nama_lengkap,sum(id_kamar) total_kamar');
        $this->db->from('reservasi TR');
        $this->db->join('detilreservasi TDR','TR.id_reservasi = TDR.id_reservasi');
        $this->db->join('pelanggan TP','TP.id_pelanggan = TR.id_pelanggan');
        $this->db->where('MONTH(TR.tgltransaksi)',$bln);
        $this->db->where('YEAR(TR.tgltransaksi)',$thn);
        $this->db->where('TR.status_reservasi','2');
        $this->db->group_by('TR.id_reservasi');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getReservasiPending(){
        $this->db->select('*,TP.nama_lengkap,TK.status status_bayar');
        $this->db->from('reservasi TR');
        $this->db->join('pelanggan TP','TP.id_pelanggan = TR.id_pelanggan');
        $this->db->join('konfirmasipembayaran TK','TR.id_reservasi = TK.id_reservasi');
        $this->db->where('TR.status','0');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getAllReservasi(){
        $this->db->select('*,TP.nama_lengkap,TK.status status_bayar');
        $this->db->from('reservasi TR');
        $this->db->join('pelanggan TP','TP.id_pelanggan = TR.id_pelanggan');
        $this->db->join('konfirmasipembayaran TK','TR.id_reservasi = TK.id_reservasi');
        $this->db->where('TR.status','1');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getReservasi($id,$param){
        $this->db->select('*,TP.nama_lengkap');
        $this->db->from('reservasi TR');
        $this->db->join('pelanggan TP','TP.id_pelanggan = TR.id_pelanggan');
        $this->db->where('TR.id_reservasi',$id);
        $this->db->where('TR.status_reservasi <> ','4');
		if(empty($param)){
			$this->db->where('TR.id_reservasi not in (select id_reservasi from konfirmasipembayaran)');
		}
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	function getDetilReservasi($id,$param){
        $this->db->select('count(TR.id_detilreservasi) jumlah,sum(total_hargakamar) harga_kamar,sum(total_hargatambahan) harga_tambahan,sum(total_keseluruhan) harga_seluruh,max(TP.nama_kamar) nama_kamar');
        $this->db->from('detilreservasi TR');
        $this->db->join('kamar TP','TP.id_kamar= TR.id_kamar');
        $this->db->where('TR.id_reservasi',$id);
		if(empty($param)){
			$this->db->where('TR.id_reservasi not in (select id_reservasi from konfirmasipembayaran)');
		}
        $this->db->group_by('TR.id_kamar');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getReservasiTambahan($id,$param){
        $this->db->select('RT.*, FT.nama_fasilitastambahan,DK.no_ruang,TP.nama_kamar');
        $this->db->from('reservasitambahan RT');
        $this->db->join('fasilitastambahan FT','RT.id_fasilitastambahan = FT.id_fasilitastambahan');
        $this->db->join('detilreservasi TR','RT.id_detilreservasi= TR.id_detilreservasi');
        $this->db->join('detilkamar DK','TR.id_detil_kamar= DK.id_detil_kamar');
        $this->db->join('kamar TP','TP.id_kamar= TR.id_kamar');
        $this->db->where('TR.id_reservasi',$id);
		if(empty($param)){
			$this->db->where('TR.id_reservasi not in (select id_reservasi from konfirmasipembayaran)');
        }
		$que = $this->db->get()->result_array();
        return $que;
    }

    function getKamarByID($id){
        $this->db->select('*');
        $this->db->from('kamar TP');
        $this->db->where('TP.id_kamar',$id);
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	function getLastReservasi($id){
        $this->db->select('*,TP.nama_lengkap');
        $this->db->from('reservasi TR');
        $this->db->join('pelanggan TP','TP.id_pelanggan = TR.id_pelanggan');
        $this->db->where('TR.id_pelanggan',$id);
        $this->db->where('TR.status_reservasi','0');
        $this->db->order_by('TR.tgltransaksi','desc');
        $this->db->limit('1');
        $que = $this->db->get()->result_array();
        return $que[0];
    }
	
	function getNomorKamar($id,$tgl1,$tgl2){
        $this->db->select('TR.*,TP.lantai_kamar lantai_kamar');
        $this->db->from('detilkamar TR');
        $this->db->join('kamar TP','TP.id_kamar= TR.id_kamar');
        $this->db->where('TR.id_kamar',$id);
        $this->db->where('TR.id_detil_kamar not in (select id_detil_kamar from detilreservasi inner join reservasi on detilreservasi.id_reservasi = reservasi.id_reservasi and reservasi.tglcheckin >= "'.$tgl1.'" and reservasi.tglcheckout <= "'.$tgl2.'" and status_reservasi <> "4")');
		$this->db->order_by('TR.no_ruang','asc');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getNomorKamar2($id,$tgl1,$tgl2){
        $this->db->select('TR.*,TP.lantai_kamar lantai_kamar');
        $this->db->from('detilkamar TR');
        $this->db->join('kamar TP','TP.id_kamar= TR.id_kamar');
        $this->db->where('TR.id_kamar',$id);
        $this->db->where('TR.id_detil_kamar not in (select id_detil_kamar from detilreservasi inner join reservasi on detilreservasi.id_reservasi = reservasi.id_reservasi and reservasi.tglcheckin >= "'.$tgl1.'" and reservasi.tglcheckout <= "'.$tgl2.'" and status_reservasi <> "4")');
		$this->db->order_by('TR.no_ruang','asc');
        $que = $this->db->get()->num_rows();
        return $que;
    }
	
	function getAllRekening(){
        $this->db->select('*');
        $this->db->from('rekening TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getFasilitasInclude($id){
        $this->db->select('TP.*,TF.nama_fasilitasinclude');
        $this->db->from('detilfasilitaskamar TP');
        $this->db->join('fasilitasinclude TF','TF.id_fasilitasinclude = TP.id_fasilitasinclude');
        $this->db->where('TP.id_kamar',$id);
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getAllKamarAvailable(){
        $this->db->select('*,TK.tipekamar');
        $this->db->from('kamar TP');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getReservasiByPelanggan($id){
        $this->db->select('*');
        $this->db->from('reservasi TP');
        $this->db->where('TP.id_pelanggan',$id);
        $this->db->order_by('TP.tgltransaksi','desc');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function cekTime(){
		$this->db->_protect_identifiers=false;
        $this->db->select('id_reservasi,DATE_ADD(tgltransaksi, INTERVAL 120 MINUTE) tgltransaksi');
        $this->db->from('reservasi TP');
        $this->db->where('status_reservasi','0');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getKamarFavorite($bln,$thn){
        $this->db->select('sum(DR.id_kamar) total_kamar,max(TK.nama_kamar) nama_kamar');
        $this->db->from('detilreservasi DR');
        $this->db->join('kamar TK','DR.id_kamar = TK.id_kamar');
        $this->db->join('reservasi TR','DR.id_reservasi = TR.id_reservasi');
        $this->db->where('TR.status_reservasi','2');
        $this->db->where('MONTH(TR.tgltransaksi)',$bln);
        $this->db->where('YEAR(TR.tgltransaksi)',$thn);
        $this->db->group_by('DR.id_kamar');
        $this->db->order_by('sum(DR.id_kamar) desc');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	function getFasilitasTambahanFavorite($bln,$thn){
        $this->db->select('sum(RT.id_fasilitastambahan) total_fasilitas,max(nama_fasilitastambahan) nama_fasilitastambahan');
        $this->db->from('reservasitambahan RT');
        $this->db->join('fasilitastambahan FT','RT.id_fasilitastambahan = FT.id_fasilitastambahan');
        $this->db->join('detilreservasi DR','RT.id_detilreservasi = DR.id_detilreservasi');
        $this->db->join('reservasi TR','DR.id_reservasi = TR.id_reservasi');
        $this->db->where('TR.status_reservasi','2');
        $this->db->where('MONTH(TR.tgltransaksi)',$bln);
        $this->db->where('YEAR(TR.tgltransaksi)',$thn);
        $this->db->order_by('sum(RT.id_fasilitastambahan) desc');
        $que = $this->db->get()->result_array();
        return $que;
    }
	
	
	
}
