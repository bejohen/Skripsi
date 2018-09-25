<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reservasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_kamar');
        $this->load->model('m_reservasi');
        $this->load->model('m_fasilitastambahan');
    }	

    public function index(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		// echo "<pre>";
		// var_dump($data['userLogin']);
		// echo "</pre>";
		// exit();
		$data['reservasi'] = "nav-active";
        $this->load->view('room',$data);

    }
	
	 public function changepass(){
		if(!$this->session->userdata('loginDataPelanggan')){
			redirect('login');
		} 
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		// echo "<pre>";
		// var_dump($data['userLogin']);
		// echo "</pre>";
		// exit();
		$data['reservasi'] = "nav-active";
        $this->load->view('ganti_password',$data);

    }
	 
	public function doGanti(){ 
		if(!$this->session->userdata('loginDataPelanggan')){ 
			redirect('login'); 
		} 
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		$dataPost = $this->input->post();
		if($dataPost['txtPassword']!=$dataPost['txtPassword']){
			$this->session->set_flashdata('GagalUpdate','Ya');
			redirect('reservasi/changepass');
		}else{
			$this->db->update('pelanggan',array("password" => md5($dataPost['txtPassword'])),array('email' =>$data['userLogin']['email']));
			$this->session->set_flashdata('GagalUpdate','Tidak');
			redirect('reservasi/changepass');
		}
		// echo "<pre>";
		// var_dump($data['userLogin']);
		// echo "</pre>";
		// exit();
		// $data['reservasi'] = "nav-active";
        // $this->load->view('ganti_password',$data);

    }
	
	public function cek(){
		$data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		if(empty($data['userLogin']['id_pelanggan'])){
			redirect('login');
		}else{
			$data['reservasi'] = "nav-active";
			$post = $this->input->post();
			$dataArr = array('jumlah' => $post['jumlah'],
							 'checkout' =>  $post['checkout'],
							 'checkin' => $post['checkin']);
			$this->session->set_userdata('ReservasiData',$dataArr);
			// $tgl1 = date("Y-m-d",strtotime($post['checkin']));
			// $tgl2 = date("Y-m-d",strtotime($post['checkout']));
			$data['listData'] = $this->m_kamar->getAllKamarAvailable();
			$data['ReservasiData'] = $this->session->userdata('ReservasiData');
			$this->load->view('rooms',$data);
		}
    }
	
	public function detil($id){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['dataDetail'] = $this->m_kamar->getKamarByID($id);
		$data['dataFasilitas'] = $this->m_kamar->getFasilitasInclude($id);
		$tgl1 = date("Y-m-d",strtotime($data['ReservasiData']['checkin']));
		$tgl2 = date("Y-m-d",strtotime($data['ReservasiData']['checkout']));
		$data['nomorkamar'] = $this->m_reservasi->getNomorKamar($id,$tgl1,$tgl2);
		$data['fasilitastambahan'] = $this->m_fasilitastambahan->getAllfasilitastambahan();
		$data['reservasi'] = "nav-active";
        $this->load->view('detil',$data);

    }
	
	public function pesan(){
		$id_kamar = $this->uri->segment(3);
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		if(empty($data['userLogin']['id_pelanggan'])){
			redirect('login');
		}else{
			$data['ReservasiData'] = $this->session->userdata('ReservasiData');
			$data['dataDetail'] = $this->m_kamar->getKamarByID($id_kamar);
			$data['reservasi'] = "nav-active";
			$post = $this->input->post();
			// echo "<pre>";
			// var_dump($post['id_fasilitastambahan']);
			// echo "</pre>";
			// exit();
			$total_kamar = $post['totalruang'];
			$dataToInsert = array("id_reservasi" =>  $data['userLogin']['id_pelanggan'].date("ymdhis"),
								  "id_pelanggan" => $data['userLogin']['id_pelanggan'],
								  "tgltransaksi" => date("Y-m-d H:i:s"),
								  "tglcheckin" => date("Y-m-d",strtotime($post['checkin'])),
								  "tglcheckout" => date("Y-m-d",strtotime($post['checkout'])),
								  "status_reservasi" => '0',
								  "total_harga_reservasi" => '0');
			$this->db->insert('reservasi',$dataToInsert);
			$id_reservasi = $this->m_reservasi->getLastReservasi($data['userLogin']['id_pelanggan']);
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
					$total_detil_tambahan = 0;
					for($j=0;$j<$post['totalfastambahan'];$j++){
						$fas = $post['id_fasilitastambahan'][$i][$j];
						if(!empty($fas)){
							$harga_fasilitas = $this->m_fasilitastambahan->getfasilitastambahanByID($fas);
							$total_harga_fasilitas = $total_harga_fasilitas + $harga_fasilitas['harga_fasilitastambahan'];
							$total_detil_tambahan = $total_detil_tambahan + $harga_fasilitas['harga_fasilitastambahan'];
							$dataToInsert = array("id_detilreservasi" =>  $id_detilreservasi,
												  "id_fasilitastambahan" => $fas,
												  "jumlah_pesan" => '1',
												  "total_harga" => $harga_fasilitas['harga_fasilitastambahan']);
							$this->db->insert('reservasitambahan',$dataToInsert);
							$dataToUpdate = array('total_hargatambahan' => $total_detil_tambahan,"total_keseluruhan" => $total_detil_tambahan + $data['dataDetail']['harga']);
							$this->db->update('detilreservasi',$dataToUpdate,array('id_detilreservasi' => $id_detilreservasi));
							
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
			$this->load->view('pesan',$data);
		}
	}
	
	public function konfirmasi(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
        $this->load->view('konfirmasi',$data);
    }
	
	public function doAddkonfirmasi(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
		$post = $this->input->post();
		if($_FILES['bukti_bayar']['name']!=""){
			$uploaddir = 'assets/konfirmasi/';
			$uploadfile = $uploaddir . basename($_FILES['bukti_bayar']['name']);
			move_uploaded_file($_FILES['bukti_bayar']['tmp_name'], $uploadfile);
		}
        $this->db->delete('konfirmasipembayaran',array('id_reservasi' => $post['id_reservasi']));
		$dataToInsert = array("id_reservasi" =>  $post['id_reservasi'],
							  "tgl_transfer" => $post['tgl_transfer'],
							  "no_rek" => $post['txtNoRekening'],
							  "nama_rek" => $post['txtNamaRek'],
							  "nama_bank" => $post['txtNamaBank'],
							  "bukti_bayar" => $_FILES['bukti_bayar']['name'],
							  "status_konfirmasipembayaran" => '0');
		$this->db->insert('konfirmasipembayaran',$dataToInsert);
		$dataUpdate = array("status_reservasi" => "1");
		$this->db->update('reservasi',$dataUpdate,array('id_reservasi' => $post['id_reservasi']));
        redirect('reservasi/transaksi/'.$id);
    }
	
	public function doDeletekonfirmasi(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
		$id = $this->uri->segment(3);
        $this->db->delete('reservasi',array('id_reservasi' => $id));
        $this->db->delete('detilreservasi',array('id_reservasi' => $id));
        redirect('reservasi/pages');
    }
	
	public function pesanan(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
		$id_reservasi = $this->m_reservasi->getLastReservasi($data['userLogin']['id_pelanggan']);
		$data['id'] = $id_reservasi['id_reservasi'];
		$data['dataReservasi'] = $this->m_reservasi->getReservasi($id_reservasi['id_reservasi'],'');
		$data['dataDetilReservasi'] = $this->m_reservasi->getDetilReservasi($id_reservasi['id_reservasi'],'');
		$data['dataReservasiTambahan'] = $this->m_reservasi->getReservasiTambahan($id_reservasi['id_reservasi'],'');
        $this->load->view('pesan',$data); 
    }
	
	public function transaksi(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
		$id = $this->uri->segment(3);
		if($id == 'cek'){
			$post = $this->input->post();
			$id = $post['id_reservasi'];
		}
		if(!empty($id)){
			$data['dataReservasi'] = $this->m_reservasi->getReservasi($id,'transaksi');
			$data['dataDetilReservasi'] = $this->m_reservasi->getDetilReservasi($id,'transaksi');
			$data['dataReservasiTambahan'] = $this->m_reservasi->getReservasiTambahan($id,'transaksi');
			$data['id'] = $id;
			$this->load->view('transaksi',$data);
		}else{
			$data['dataReservasi'] = $this->m_reservasi->getReservasiByPelanggan($data['userLogin']['id_pelanggan']);
			$this->load->view('cektransaksi',$data);
		}
    }
	
	public function download(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
        $data['ReservasiData'] = $this->session->userdata('ReservasiData');
		$data['reservasi'] = "nav-active";
		$id = $this->uri->segment(3);
		$data['dataReservasi'] = $this->m_reservasi->getReservasi($id,'transaksi');
		$data['dataDetilReservasi'] = $this->m_reservasi->getDetilReservasi($id,'transaksi');
		$data['dataReservasiTambahan'] = $this->m_reservasi->getReservasiTambahan($id,'transaksi');
		$data['id'] = $id;
		$this->load->view('download',$data);
    }


}