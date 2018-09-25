<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fasilitas_tambahan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_fasilitastambahan');
    }	

    public function daftar(){
        //$this->m_umum->generatePesan('<h4>Contact Our Stokist today!</h4> Below list of Our Stokist.','warning');
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_fasilitastambahan->getAllfasilitastambahan();
        $data['v_content'] = 'member/fasilitas_tambahan/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/fasilitas_tambahan/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
		$id_fasilitastambahan = $this->m_fasilitastambahan->getMaxfasilitastambahan();
		$dataToInsert = array("nama_fasilitastambahan" => $post['txtfasilitastambahan'],
							  "harga_fasilitastambahan" => str_replace(',', '', $post['txtNominal']),
							  "id_fasilitastambahan" => $id_fasilitastambahan['id_fasilitastambahan'] + 1);
		if($this->db->insert('fasilitastambahan',$dataToInsert)){
		  $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal menambahkan data","gagal");  
		}
		redirect('admin/fasilitas_tambahan/add');
    }

    public function doDelete($id){
        $hapus = $this->db->delete('fasilitastambahan',array('id_fasilitastambahan' => $id));
        if($hapus){
          $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
        }else{
           $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
        }
        redirect('admin/fasilitas_tambahan/daftar');
    }

    public function edit($id){
        $data = $this->m_fasilitastambahan->getfasilitastambahanByID($id); 
        if(count($data)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/fasilitas_tambahan/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');   
            $data['dataDetail'] = $data;
            $data['v_content'] = 'member/fasilitas_tambahan/edit';
            $this->load->view('member/layout', $data);
        }
    }

    public function doEdit($id){
            $post = $this->input->post();
            $dataToInsert = array("nama_fasilitastambahan" => $post['txtfasilitastambahan'],
								  "harga_fasilitastambahan" => str_replace(',', '', $post['txtNominal']));
            if($this->db->update('fasilitastambahan',$dataToInsert,array('id_fasilitastambahan' => $id))){
              $this->m_umum->generatePesan("Berhasil update data","berhasil");
            }else{
              $this->m_umum->generatePesan("Gagal update data","gagal");  
            }
            redirect('admin/fasilitas_tambahan/edit/'.$id);
    }

}