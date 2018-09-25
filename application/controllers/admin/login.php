<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('m_login');   
        $this->load->model('m_reservasi');   
    }
	
	public function index()
	{	
        $this->load->view('member/Login');
	}
		
	function doLogin() {
		//proses cek 2 jam, pada saat admin login
		$data['cekTime'] = $this->m_reservasi->cekTime();
		foreach($data['cekTime'] as $value){
			if($value['tgltransaksi'] <= date('Y-m-d H:i:s')){
				$dataToInsert = array("status_reservasi" => '4', "alasan_pembatalan" => "Melewati batas konfirmasi pembayaran");
				$this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $value['id_reservasi']));
			}
		}
		
		//------------------------------------------
        $dataPost = $this->input->post();
        if ($this->m_login->checkLogin($dataPost['Username'], $dataPost['Password'])) { 
            redirect('admin/dashboard');
        }else{
            $this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('admin/login');
        } 
    }

    function logout() {
        $this->session->unset_userdata('loginData');
        redirect('admin/login');
    }    
}
