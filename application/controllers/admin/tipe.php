<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tipe extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_tipe');
    }	

    public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_tipe->getAllTipe();
        $data['v_content'] = 'member/tipe/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/tipe/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
		$id_tipekamar = $this->m_tipe->getMaxTipe();
		$dataToInsert = array("tipekamar" => $post['txtTipeKamar'],"id_tipekamar" => $id_tipekamar['id_tipekamar']+1);
		if($this->db->insert('tipekamar',$dataToInsert)){
		  $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal menambahkan data","gagal");  
		}
		redirect('admin/tipe/daftar');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('tipekamar',array('id_tipekamar' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
        }
        redirect('admin/tipe/daftar');
    }

    public function edit($id){
        $data = $this->m_tipe->getTipeByID($id); 
        if(count($data)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/tipe/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');   
            $data['dataDetail'] = $data;
            $data['v_content'] = 'member/tipe/edit';
            $this->load->view('member/layout', $data);
        }
    }

    public function doEdit($id){
            $post = $this->input->post();
			$dataToInsert = array("tipekamar" => $post['txtTipeKamar']);
            if($this->db->update('tipekamar',$dataToInsert,array('id_tipekamar' => $id))){
              $this->m_umum->generatePesan("Berhasil update data","berhasil");
            }else{
              $this->m_umum->generatePesan("Gagal update data","gagal");  
            }
            redirect('admin/tipe/daftar');
    }

}