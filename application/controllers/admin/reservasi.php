<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reservasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_reservasi');
        $this->load->model('m_kamar');
        $this->load->model('m_pelanggan');
        $this->load->model('m_fasilitastambahan');
    }	

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        //$data['listData'] = $this->m_reservasi->getReservasiPending();
        $data['v_content'] = 'member/reservasi/add';
        $this->load->view('member/layout', $data);

    }
	
	function getPelanggan() {
        $id = $this->input->post('noktp');
        $data['get'] = $this->m_pelanggan->getPelangganByNoKTP($id);
		//var_dump( $data);
        $this->load->view('member/reservasi/ajax_pelanggan', $data);
    }
	
	public function cek(){
        $data['userLogin'] = $this->session->userdata('loginData');
		$data['reservasi'] = "nav-active";
        $post = $this->input->post();
		$data['checkin'] = $post['checkin'];
		$data['checkout'] = $post['checkout'];
		$data['id_pelanggan'] = $post['txtIDpelanggan'];
		$data['nama_lengkap'] = $post['txtNamaPelanggan'];
		// $tgl1 = date("Y-m-d",strtotime($post['checkin']));
		// $tgl2 = date("Y-m-d",strtotime($post['checkout']));
		$data['listData'] = $this->m_kamar->getAllKamarAvailable();
        $data['v_content'] = 'member/reservasi/cek';
        $this->load->view('member/layout', $data);

    }
	
	public function selanjutnya(){
        $data['userLogin'] = $this->session->userdata('loginData');
		$data['reservasi'] = "nav-active";
        $post = $this->input->post();
		$data['checkin'] = $post['checkin'];
		$data['checkout'] = $post['checkout'];
		$data['id_pelanggan'] = $post['txtIDpelanggan'];
		$data['nama_lengkap'] = $post['txtNamaPelanggan'];
		$tgl1 = date("Y-m-d",strtotime($post['checkin']));
		$tgl2 = date("Y-m-d",strtotime($post['checkout']));
		$data['id'] = $post['id_kamar'];
		$data['nomorkamar'] = $this->m_reservasi->getNomorKamar($data['id'],$tgl1,$tgl2);
		$data['fasilitastambahan'] = $this->m_fasilitastambahan->getAllfasilitastambahan();
        $data['v_content'] = 'member/reservasi/selanjutnya';
        $this->load->view('member/layout', $data);

    }
	
	public function pesan(){
        $data['userLogin'] = $this->session->userdata('loginData');
		$data['reservasi'] = "nav-active";
		$post = $this->input->post();
		$id_kamar = $post['id_kamar'];
		$id_pelanggan = $post['txtIDpelanggan'];
		$data['dataDetail'] = $this->m_kamar->getKamarByID($id_kamar);
		$total_kamar = $post['totalruang'];
		$dataToInsert = array("id_reservasi" =>  $id_pelanggan.'000'.date("ymdhis"),
							  "id_pelanggan" => $id_pelanggan,
							  "tgltransaksi" => date("Y-m-d H:i:s"),
							  "tglcheckin" => date("Y-m-d",strtotime($post['checkin'])),
							  "tglcheckout" => date("Y-m-d",strtotime($post['checkout'])),
							  "status_reservasi" => '0',
							  "total_harga_reservasi" => '0');
		$this->db->insert('reservasi',$dataToInsert);
		$id_reservasi = $this->m_reservasi->getLastReservasi($id_pelanggan);
		$total_harga_fasilitas = 0;
		for($i=0;$i<$total_kamar;$i++){
			if(!empty($post['no_ruang'][$i])){
				$total_harga = $total_harga + $data['dataDetail']['harga'];
				$dataToInsert = array("id_reservasi" => $id_reservasi['id_reservasi'],
									  "id_kamar" => $id_kamar,
									  "id_detil_kamar" => $post['no_ruang'][$i],
									  "total_hargakamar" => $data['dataDetail']['harga'],
									  "total_keseluruhan" => $data['dataDetail']['harga']);
				$this->db->insert('detilreservasi',$dataToInsert);
				$id_detilreservasi = $this->db->insert_id();
				for($j=0;$j<$post['totalfastambahan'];$j++){
					$fas = $post['id_fasilitastambahan'][$i][$j];
					if(!empty($fas)){
						$harga_fasilitas = $this->m_fasilitastambahan->getfasilitastambahanByID($fas);
						$total_harga_fasilitas = $total_harga_fasilitas + $harga_fasilitas['harga_fasilitastambahan'];
						$dataToInsert = array("id_detilreservasi" =>  $id_detilreservasi,
											  "id_fasilitastambahan" => $fas,
											  "jumlah_pesan" => '1',
											  "total_harga" => $harga_fasilitas['harga_fasilitastambahan']);
						$this->db->insert('reservasitambahan',$dataToInsert);
					}
				}
			}
		}
		
		$dataToInsert = array("total_harga_reservasi" => $total_harga_fasilitas+$total_harga);
		$this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $id_reservasi['id_reservasi']));		
		
		$data['id'] = $id_reservasi['id_reservasi'];
		$data['dataReservasi'] = $this->m_reservasi->getReservasi($id_reservasi['id_reservasi'],'');
		$data['dataDetilReservasi'] = $this->m_reservasi->getDetilReservasi($id_reservasi['id_reservasi'],'');
		$data['dataReservasiTambahan'] = $this->m_reservasi->getReservasiTambahan($id_reservasi['id_reservasi'],'');
		// $data['dataRekening'] = $this->m_reservasi->getAllRekening();
		$data['v_content'] = 'member/reservasi/review';
		$this->load->view('member/layout', $data);
		
	}
	
	public function transaksi($id){
        $data['userLogin'] = $this->session->userdata('loginData');
		$data['dataReservasi'] = $this->m_reservasi->getReservasi($id,'transaksi');
		$data['dataDetilReservasi'] = $this->m_reservasi->getDetilReservasi($id,'transaksi');
		$data['dataReservasiTambahan'] = $this->m_reservasi->getReservasiTambahan($id,'transaksi');
		$data['id'] = $id;
		$data['v_content'] = 'member/reservasi/review';
		$this->load->view('member/layout', $data);
    }
	
	public function konfirmasi($id){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
		$post = $this->input->post();
		$dataToInsert = array("id_reservasi" =>  $id,
							  "tgl_transfer" => date('Y-m-d'),
							  "tgl_confirm" => date('Y-m-d'),
							  "no_rek" => "cash",
							  "nama_rek" => "cash",
							  "nama_bank" => "cash",
							  "bukti_bayar" => "cash",
							  "id_user" => $data['userLogin']['id_user'],
							  "status_konfirmasipembayaran" => '2');
		$this->db->insert('konfirmasipembayaran',$dataToInsert);
        redirect('admin/konfirmasipembayaran/daftar');
    }
	
	 public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_reservasi->getAllReservasi();
        $data['v_content'] = 'member/reservasi/daftar';
        $this->load->view('member/layout', $data);
    }
	
	 public function batal(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        // $data['listData'] = $this->m_reservasi->getAllReservasi();
        $data['v_content'] = 'member/reservasi/batal';
        $this->load->view('member/layout', $data);
    }
	
	public function doAddPembatalan(){
        $data['userLogin'] = $this->session->userdata('loginData');
		$post = $this->input->post();
		$dataToInsert = array("status_reservasi" => "4", "alasan_pembatalan" => $post['txtAlasanPembatalan']);
		if($this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $post['txtIDReservasi']))){
		  $this->m_umum->generatePesan("Pembatalan reservasi berhasil","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal update data","gagal");  
		}
		redirect('admin/reservasi/batal');
    }

    public function doAdd(){
        $post = $this->input->post();
		$dataToInsert = array("nama_fasilitasinclude" => $post['txtFasilitasInclude']);
		if($this->db->insert('fasilitasinclude',$dataToInsert)){
		  $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal menambahkan data","gagal");  
		}
		redirect('admin/fasilitas_include/daftar');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('fasilitasinclude',array('id_fasilitasinclude' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
        }
        redirect('admin/fasilitas_include/daftar');
    }

    public function edit($id){
        $data = $this->m_fasilitasinclude->getFasilitasIncludeByID($id); 
        if(count($data)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/fasilitas_include/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');   
            $data['dataDetail'] = $data;
            $data['v_content'] = 'member/fasilitas_include/edit';
            $this->load->view('member/layout', $data);
        }
    }

    public function verified($id){
        $data['userLogin'] = $this->session->userdata('loginData');
		$post = $this->input->post();
		$dataToInsert = array("status" => "2");
		if($this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $id))){
		  $this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal update data","gagal");  
		}
		redirect('admin/reservasi/daftar');
    }

    public function spam($id){
        $data['userLogin'] = $this->session->userdata('loginData');
		$post = $this->input->post();
		$dataToInsert = array("status" => "2");
		if($this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $id))){
		  $this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal update data","gagal");  
		}
		redirect('admin/reservasi/daftar');
    }
	
	
}