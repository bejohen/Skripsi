<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class konfirmasipembayaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_konfirmasipembayaran');
    }	

    public function listpending(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_konfirmasipembayaran->getAllListPending();
        $data['v_content'] = 'member/konfirmasipembayaran/listpending';
        $this->load->view('member/layout', $data);

    }
	
	 public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_konfirmasipembayaran->getAllPembayaranKonfirmasi();
        $data['v_content'] = 'member/konfirmasipembayaran/daftar';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/fasilitas_include/add';
        $this->load->view('member/layout', $data);
        
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
		$status = $this->uri->segment(5);
		$id_kp = $this->uri->segment(6);
		$dataToInsert = array("status_konfirmasipembayaran" => $status,
							  "id_user" => $data['userLogin']['id_user'],
							  "tgl_confirm" => date('Y-m-d h:i:s'));
		if($this->db->update('konfirmasipembayaran',$dataToInsert,array('id_reservasi' => $id,'id_konfirmasipembayaran' => $id_kp))){
			$dataToInsert = array("status_reservasi" => $status);
			$this->db->update('reservasi',$dataToInsert,array('id_reservasi' => $id));
		  $this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal update data","gagal");  
		}
		redirect('admin/konfirmasipembayaran/daftar');
    }

}