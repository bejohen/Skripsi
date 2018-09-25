<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('m_umum');
        //$this->load->model('m_tipe');
    }	

    public function index(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		$data['beranda'] = "nav-active";
        $this->load->view('index',$data);

    }
	
	 public function galeri(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		$data['galeri'] = "nav-active";
        $this->load->view('galeri',$data);

    }
	
	 public function lokasi(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan'); //ngambsil session user yang sedang login
		$data['lokasi'] = "nav-active";
        $this->load->view('location',$data); //

    }
	
	public function promo(){
        $data['userLogin'] = $this->session->userdata('loginDataPelanggan');
		$data['promo'] = "nav-active";
        $this->load->view('promo',$data);

    }



}