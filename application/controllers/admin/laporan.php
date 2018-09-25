<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_reservasi');
		date_default_timezone_set('Asia/Jakarta');
    }	

    public function profit(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_umum->getThnAjaran();
        $data['v_content'] = 'member/laporan/profitFilter';
        $this->load->view('member/layout', $data);

    }

    public function filter(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['v_content'] = 'member/laporan/filterLaporan';
        $this->load->view('member/layout', $data);

    }
	
	public function reservasi(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
		$post = $this->input->post();
        $data['listData'] = $this->m_reservasi->getReservasiByPeriode($post['txtBulan'],$post['txtTahun']);
		$data['bulan'] = $post['txtBulan'];
		$data['tahun'] = $post['txtTahun'];
        $this->load->view('member/laporan/laporanReservasi', $data);
    }
	
	public function kamar(){
        $data['userLogin'] = $this->session->userdata('loginData');
		$post = $this->input->post(); 
        $data['listData'] = $this->m_reservasi->getKamarFavorite($post['txtBulan'],$post['txtTahun']);
		$data['bulan'] = $post['txtBulan'];
		$data['tahun'] = $post['txtTahun'];
        $this->load->view('member/laporan/LaporanKamarFavorite', $data);
        // $data['v_content'] = 'member/laporan/LaporanKamarFavorite';
        // $this->load->view('member/layout', $data);
    }
	
	public function tambahan(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
		$post = $this->input->post();
        $data['listData'] = $this->m_reservasi->getFasilitasTambahanFavorite($post['txtBulan'],$post['txtTahun']);
		$data['bulan'] = $post['txtBulan'];
		$data['tahun'] = $post['txtTahun'];
        $this->load->view('member/laporan/laporanFasilitasTambahanFav', $data);
    }
	
	
	
}