<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_petugas');
    }

    public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_petugas->getAllPetugas();
        $data['v_content'] = 'member/petugas/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/petugas/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtUsername', 'username', 'required|is_unique[user.username]');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('oldPost',$post);
            $this->m_umum->generatePesan(validation_errors(),"gagal");
            redirect('admin/petugas/add');
        }else{
            if($post['txtPassword'] != $post['txtVerifikasi']){
                $this->m_umum->generatePesan("Verifikasi password tidak sama","gagal");
            }else{    
                $dataToInsert = array(	"username" => $post['txtUsername'],
                                        "nama" => $post['txtNamaPetugas'],
                                        "jabatan" => $post['txtLevel'],
                                        "password" => md5($post['txtPassword']));

                if($this->db->insert('user',$dataToInsert)){

                $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
                
                }else{
                
                $this->m_umum->generatePesan("Gagal menambahkan data","gagal");
                    
                }
            }   
        }
        redirect('admin/petugas/daftar');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('user',array('nik' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus petugas","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus petugas","gagal");   
        }
        redirect('admin/petugas/daftar');
    }

    public function edit($id){
        $datapetugas = $this->m_petugas->getPetugasByID($id);
        if(count($datapetugas)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/petugas/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');
            $data['dataDetail'] = $datapetugas;
            $data['v_content'] = 'member/petugas/edit';
            $this->load->view('member/layout', $data);
        }
    }

    public function doEdit($id){
            $post = $this->input->post();
            if($post['txtPassword'] == $post['txtPasswordLama']){
                $password = $post['txtPassword'];
            }else{
                $password = md5($post['txtPassword']);
            }
            $verifikasi = md5($post['txtVerifikasi']);
            if($password != $verifikasi){
                $this->m_umum->generatePesan("Verifikasi password tidak sama","gagal");
            }else{ 
				$dataToInsert = array(	"username" => $post['txtUsername'],
                                        "nama" => $post['txtNamaPetugas'],
                                        "jabatan" => $post['txtLevel'],
                                        "password" => $password);
                if($this->db->update('user',$dataToInsert,array('nik' => $id))){
    				$this->m_umum->generatePesan("Berhasil update petugas","berhasil");           
                }else{           
    				$this->m_umum->generatePesan("Gagal update petugas","gagal");    
                }
            }
            redirect('admin/petugas/daftar');
    }

    

	
	

}