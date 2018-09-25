<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Services extends CI_Controller {
	private $signature; 
	function __construct() {
		parent::__construct ();
		
		$uri = $this->uri->segment(1);
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper ( array (
				'url',
				'form',
				'language' 
		) );
		$this->load->model ( array (
									'm_api',
									'm_login',
									'm_kamar',
									'm_reservasi',
									'm_fasilitastambahan',
									'm_pelanggan',
									'm_umum',
									) 
							);
	}
	
	function index() {
		header ( "location: " . base_url () );
		die ();
	}
	
	function register(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'noktp' => $this->input->post('noktp'),
				'nama_panggilan' =>  $this->input->post('nama_panggilan'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'alamat' =>  $this->input->post('alamat'),
				'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
				'no_hp'	=> $this->input->post('no_hp'),
				'password' =>  $this->input->post('password'),
				'email' =>  $this->input->post('email'),
		);
		$cek_email = $this->m_pelanggan->cekEmailExist($param['email']);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			if($cek_email < 1){
				$id_pelanggan = $this->m_pelanggan->getMaxPelanggan();
				$dataToInsert = array("noktp" => $param['noktp'],
								  "nama_panggilan" => $param['nama_panggilan'],
								  "nama_lengkap" => $param['nama_lengkap'],
								  "alamat" => $param['alamat'],
								  "jenis_kelamin" => $param['jenis_kelamin'],
								  "no_hp" => $param['no_hp'],
								  "password" => md5($param['password']),
								  "email" => $param['email'],
								  "tglregister" => date("Y-m-d H:i:s"),
								  "status" => 0,
								  "id_pelanggan" => $id_pelanggan['id_pelanggan'] + 1);
				$insert = $this->db->insert('pelanggan',$dataToInsert);
			
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Register berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Register gagal";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
		
	function login(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'email' =>  $this->input->post('email'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginApps($param['email'], $param['password']);
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}	
	
	function cekKetersediaanKamar(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'checkin' =>  $this->input->post('checkin'),
				'checkout' =>  $this->input->post('checkout'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_kamar->getAllKamarAvailable();
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Tersedia";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Tidak Tersedia";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	
	function detail(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'id' =>  $this->input->post('id'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$reservasiData = $this->session->userdata('ReservasiData');
			$dataDetail = $this->m_kamar->getKamarByID($param['id']);
			$dataFasilitas = $this->m_kamar->getFasilitasInclude($param['id']);
			$tgl1 = date("Y-m-d",strtotime($reservasiData['checkin']));
			$tgl2 = date("Y-m-d",strtotime($reservasiData['checkout']));
			
			$noKamar = $this->m_reservasi->getNomorKamar($param['id'],$tgl1,$tgl2);
			
			foreach($noKamar as $value){
				$value['fasilitastambahan'] = $this->m_fasilitastambahan->getAllfasilitastambahan();
				$listKamar[] = $value;
				
			}
			$data['nomorkamar'] = $listKamar;
			
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Tersedia";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Tidak Tersedia";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	public function pesan(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
		/*
		$pesanKamar[] = array(
			"no_ruang"=> "100", 
			"fasilitastambahan" => array(1,2)
		);
		$pesanKamar[] = array(
			"no_ruang"=> "101", 
			"fasilitastambahan" => array(2,3)
		);
		 echo "<pre>";
		print_r(json_encode($pesanKamar));
		echo "</pre>";
		die(); */
	
		$param = array(
				'id_detil' =>  $this->input->post('id_detil'),
				'id_pelanggan' =>  $this->input->post('id_pelanggan'),
				'pesan' =>  $this->input->post('pesan'),
				'tglcheckin' =>  $this->input->post('tglcheckin'),
				'tglcheckout' =>  $this->input->post('tglcheckout'),
		);
		$check_require = $this->m_api->requireValidation( $param );	
		
		if ($check_require ['status'] == true) {
			
			$pesan_kamar = json_decode($param['pesan']);
			/* foreach($pesan_kamar as $value){
				echo $value->no_ruang;die;
			}  */
			
			$total_kamar = $this->m_reservasi->getNomorKamar2($param['id_detil'],$param['tglcheckin'],$param['tglcheckout']);
			
			$dataToInsert = array("id_reservasi" =>  $param['id_pelanggan'].'000'.date("ymdhis"),
							  "id_pelanggan" => $param['id_pelanggan'],
							  "tgltransaksi" => date("Y-m-d H:i:s"),
							  "tglcheckin" => date("Y-m-d",strtotime($param['checkin'])),
							  "tglcheckout" => date("Y-m-d",strtotime($param['checkout'])),
							  "status_reservasi" => '0',
							  "total_harga_reservasi" => '0');
			$this->db->insert('reservasi',$dataToInsert);
			
			$id_reservasi = $this->m_reservasi->getLastReservasi($param['id_pelanggan']);
			for($i=0;$i<$total_kamar;$i++){
				if(!empty($pesan['no_ruang'][$i])){
					
				}
			}
			
			if($pesan_kamar){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasi;";
				$dataArray ['results']['dataReservasi'] = (array) $pesan_kamar; 
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
			
	}
	
	function konfirmasiPembayaran(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'id_reservasi' =>  $this->input->post('id_reservasi'),
				'tgl_transfer' =>  $this->input->post('tgl_transfer'),
				'txtNoRekening' =>  $this->input->post('txtNoRekening'),
				'txtNamaRek' =>  $this->input->post('txtNamaRek'),
				'txtNamaBank' =>  $this->input->post('txtNamaBank'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			//$data['ReservasiData'] = $this->session->userdata('ReservasiData');
			
			if($_FILES['bukti_bayar']['name']!=""){
				$uploaddir = 'assets/konfirmasi/';
				$uploadfile = $uploaddir . basename($_FILES['bukti_bayar']['name']);
				move_uploaded_file($_FILES['bukti_bayar']['tmp_name'], $uploadfile);
			}
			
			$param['bukti_bayar'] = $_FILES['bukti_bayar']['name'];
			
			$this->db->delete('konfirmasipembayaran',array('id_reservasi' => $param['id_reservasi']));
			$dataToInsert = array("id_reservasi" =>  $param['id_reservasi'],
								  "tgl_transfer" => $param['tgl_transfer'],
								  "no_rek" => $param['txtNoRekening'],
								  "nama_rek" => $param['txtNamaRek'],
								  "nama_bank" => $param['txtNamaBank'],
								  "bukti_bayar" => $param['bukti_bayar'],
								  "status_konfirmasipembayaran" => '0');
			$this->db->insert('konfirmasipembayaran',$dataToInsert);
			
			$dataUpdate = array("status_reservasi" => "1");
			$this->db->update('reservasi',$dataUpdate,array('id_reservasi' => $param['id_reservasi']));
			
			if($this->db->insert('konfirmasipembayaran',$dataToInsert)){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function gantiPassword(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'txtPassword' =>  $this->input->post('txtPassword'),
				'email'	=>  $this->input->post('email'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			if($param['txtPassword']!=$param['txtPassword']){
				$this->session->set_flashdata('GagalUpdate','Ya');
			}else{
				$this->db->update('pelanggan',array("password" => md5($param['txtPassword'])),array('email' =>$param['email']));
			}
			
			if($this->db->update('pelanggan',array("password" => md5($param['txtPassword'])),array('email' =>$param['email']))){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function lupaPassword(){
		$dataArray = array ( 
				'pic' => 'Eris Susanti <eris@kpptechnology.co.id>' 
		);
	
		$param = array(
				'email'	=>  $this->input->post('email'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$cek = $this->m_login->doResetByEmail($param['email']);
			if(!$cek){
				$this->session->set_flashdata('GagalReset', 'Ya');
			}else{
				$ket = "Password anda sudah berhasil di reset. Silahkan gunakan password baru anda di bawah ini untuk melakukan login di Hotel Garuda Wira. <br>Password anda: <b>".$cek."</b><p></p> www.garudawira.com";
				$this->m_login->kirim($param['email'],$ket);
				$this->session->set_flashdata('GagalReset', 'Tidak');
			}
			
			if($cek){ 
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Berhasil";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Gagal";
				$dataArray ['results']['data'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	
	
}