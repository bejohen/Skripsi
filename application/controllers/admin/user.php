<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_user');
    }

    public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_user->getAlluser();
        $data['v_content'] = 'member/user/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/user/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtUsername', 'username', 'required|is_unique[user.username]');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('oldPost',$post);
            $this->m_umum->generatePesan(validation_errors(),"gagal");
            redirect('admin/user/add');
        }else{
            if($post['txtPassword'] != $post['txtVerifikasi']){
                $this->m_umum->generatePesan("Verifikasi password tidak sama","gagal");
            }else{
				$id_user = $this->m_user->getMaxUser();
                $dataToInsert = array(	"username" => $post['txtUsername'],
                                        "nama" => $post['txtNamauser'],
                                        "jabatan" => $post['txtLevel'],
                                        "password" => md5($post['txtPassword']),
										"id_user" => $id_user['id_user'] + 1);

                if($this->db->insert('user',$dataToInsert)){

                $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
                
                }else{
                
                $this->m_umum->generatePesan("Gagal menambahkan data","gagal");
                    
                }
            }   
        }
        redirect('admin/user/daftar');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('user',array('id_user' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus user","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus user","gagal");   
        }
        redirect('admin/user/daftar');
    }

    public function edit($id){
        $datauser = $this->m_user->getuserByID($id);
        if(count($datauser)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/user/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');
            $data['dataDetail'] = $datauser;
            $data['v_content'] = 'member/user/edit';
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
                                        "nama" => $post['txtNamauser'],
                                        "jabatan" => $post['txtLevel'],
                                        "password" => $password);
                if($this->db->update('user',$dataToInsert,array('id_user' => $id))){
    				$this->m_umum->generatePesan("Berhasil update user","berhasil");           
                }else{           
    				$this->m_umum->generatePesan("Gagal update user","gagal");    
                }
            }
            redirect('admin/user/daftar');
    }

    

	
	

}