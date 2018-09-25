<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pelanggan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_pelanggan');
    }
	

    public function daftar(){ 
		$data['login'] = "nav-active"; 
        $this->load->view('daftar',$data);

    }
	
	public function daftar_pelanggan(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_pelanggan->getAllPelanggan();
        $data['v_content'] = 'member/pelanggan/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/pelanggan/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd($id){
        $this->form_validation->set_rules('txtEmail', 'email', 'required|is_unique[pelanggan.email]');
        if ($this->form_validation->run() == FALSE){
			if($id == "front" or $id == "front#"){
				$this->session->set_flashdata('Daftar', 'Ya');
				redirect('admin/pelanggan/daftar/front');
			}else{
				$this->m_umum->generatePesan("Maaf, email yang anda masukan sudah terdaftar!",""); 
				redirect('admin/pelanggan/add');
			}
		}else{
			$post = $this->input->post();
			$id_pelanggan = $this->m_pelanggan->getMaxPelanggan();
			$dataToInsert = array("noktp" => $post['txtNoKTP'],
								  "nama_panggilan" => $post['txtNamaPanggilan'],
								  "nama_lengkap" => $post['txtNamaLengkap'],
								  "alamat" => $post['txtAlamat'],
								  "jenis_kelamin" => $post['txtJenisKelamin'],
								  "no_hp" => $post['txtNohp'],
								  "password" => md5($post['txtPassword']),
								  "email" => $post['txtEmail'],
								  "tglregister" => date("Y-m-d H:i:s"),
								  "status" => 0,
								  "id_pelanggan" => $id_pelanggan['id_pelanggan'] + 1);
			if($this->db->insert('pelanggan',$dataToInsert)){
			  $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			}else{
			  $this->m_umum->generatePesan("Gagal menambahkan data","gagal");  
			}
			if($id == "front" or $id == "front#"){
				$ket = "Terima kasih telah mendaftar di Website Sun City, silakan reservasi kamar di hotel kami.";
				$this->m_umum->kirim($post['txtEmail'],$ket);
				$this->session->set_flashdata('Daftar', 'Ya');
				redirect('login');
			}else{
				redirect('admin/pelanggan/daftar_pelanggan');
			}
		}
    }

    public function doDelete($id){
        $hapus = $this->db->delete('pelanggan',array('id_pelanggan' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
        }
        redirect('admin/pelanggan/daftar_pelanggan');
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
			$dataToInsert = array("noktp" => $post['txtNoKTP'],
								  "nama_panggilan" => $post['txtNamaPanggilan'],
								  "nama_lengkap" => $post['txtNamaLengkap'],
								  "alamat" => $post['txtAlamat'],
								  "jenis_kelamin" => $post['txtJenisKelamin'],
								  "no_hp" => $post['txtNohp'],
								  "password" => md5($post['txtPassword']),
								  "email" => $post['txtEmail']);
            if($this->db->update('pelanggan',$dataToInsert,array('id_pelanggan' => $id))){
              $this->m_umum->generatePesan("Berhasil update data","berhasil");
            }else{
              $this->m_umum->generatePesan("Gagal update data","gagal");  
            }
            redirect('admin/pelanggan/daftar_pelanggan');
    }

}