<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_login');
        $this->load->model('m_reservasi');
    }	

    public function index(){
        //$data['userLogin'] = $this->session->userdata('loginData');
		$data['login'] = "nav-active"; 
        $this->load->view('login',$data);

    }
	
	public function lupa(){
        //$data['userLogin'] = $this->session->userdata('loginData');
		$data['login'] = "nav-active"; 
        $this->load->view('lupa',$data);

    }
	
	function doLogin() {
		$data['cekTime'] = $this->m_reservasi->cekTime();
		foreach($data['cekTime'] as $value){
			if($value['tgltransaksi'] <= date('Y-m-d H:i:s')){
				$dataToInsert = array("status_reservasi" => '4', "alasan_pembatalan" => "Melewati batas konfirmasi pembayaran");
				$this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $value['id_reservasi']));
			}
		}
        $dataPost = $this->input->post();
		$cek = $this->m_login->checkLoginPelanggan($dataPost['email'], $dataPost['password']);
        if ($cek == "berhasil") { 
            redirect('pages');
        }elseif($cek == "gagal"){
            $this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('login');
		}else{
            $this->session->set_flashdata('GagalLogin', 'Blokir');
            redirect('login');
        } 
    }
	
	function doLupa() {
		
        $dataPost = $this->input->post();
		
		$cek = $this->m_login->doResetByEmail($dataPost['email']);
		if(!$cek){
			$this->session->set_flashdata('GagalReset', 'Ya');
            redirect('login/lupa');
		}else{
			$ket = "Password anda sudah berhasil di reset. Silahkan gunakan password baru anda di bawah ini untuk melakukan login di Sun City. <br>Password anda: <b>".$cek."</b>";
			$this->m_umum->kirim($dataPost['email'],$ket);
			$this->session->set_flashdata('GagalReset', 'Tidak');
            redirect('login/lupa');
		}
		 
    }
	
	 function logout() {
        $this->session->unset_userdata('loginDataPelanggan');
        redirect('pages');
    }



}