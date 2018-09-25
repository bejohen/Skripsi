<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fasilitas_include extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_fasilitasinclude');
    }	

    public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_fasilitasinclude->getAllFasilitasInclude();
        $data['v_content'] = 'member/fasilitas_include/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/fasilitas_include/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
		$id_fasilitasinclude = $this->m_fasilitasinclude->getMaxFasilitasInclude();
		$dataToInsert = array("nama_fasilitasinclude" => $post['txtFasilitasInclude'],
							  "content" => $post['txtContent'],
							  "id_fasilitasinclude" => $id_fasilitasinclude['id_fasilitasinclude'] + 1);
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

    public function doEdit($id){
		$post = $this->input->post();
		$dataToInsert = array("nama_fasilitasinclude" => $post['txtFasilitasInclude'],
							  "content" => $post['txtContent'] );
		if($this->db->update('fasilitasinclude',$dataToInsert,array('id_fasilitasinclude' => $id))){
		  $this->m_umum->generatePesan("Berhasil update data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal update data","gagal");  
		}
		redirect('admin/fasilitas_include/daftar');
    }

}