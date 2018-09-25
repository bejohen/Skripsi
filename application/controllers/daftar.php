<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class daftar extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('m_umum');
        $this->load->model('m_pelanggan');
    }
	
	public function index(){
		$data['login'] = "nav-active"; 
        $this->load->view('daftar',$data);

    }

    public function add(){
       // $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/pelanggan/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
		$dataToInsert = array("surname" => $post['txtSurname'],
							  "first_name" => $post['txtFirstName'],
							  "no_hp" => $post['txtNohp'],
							  "username" => $post['txtUsername'],
							  "password" => md5($post['txtPassword']),
							  "email" => $post['txtEmail'],
							  "tglregister" => date("Y-m-d H:i:s"));
		if($this->db->insert('tblpelanggan',$dataToInsert)){
		  $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal menambahkan data","gagal");  
		}
		redirect('admin/pelanggan/daftar');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('tblpelanggan',array('id_pelanggan' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
        }
        redirect('admin/pelanggan/daftar');
    }

    public function edit($id){
        $data = $this->m_pelanggan->getPelangganByID($id); 
        if(count($data)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/pelanggan/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');   
            $data['dataDetail'] = $data;
            $data['v_content'] = 'member/pelanggan/edit';
            $this->load->view('member/layout', $data);
        }
    }

    public function doEdit($id){
            $post = $this->input->post();
			$dataToInsert = array("jenjang" => $post['txtJenjang']);
            if($this->db->update('tbljenjang',$dataToInsert,array('id_jenjang' => $id))){
              $this->m_umum->generatePesan("Berhasil update data","berhasil");
            }else{
              $this->m_umum->generatePesan("Gagal update data","gagal");  
            }
            redirect('admin/jenjang/daftar');
    }

}