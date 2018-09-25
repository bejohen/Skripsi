<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kamar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
        $this->load->model('m_kamar');
        $this->load->model('m_tipe');
        $this->load->model('m_fasilitasinclude');
    }	

    public function daftar(){
        $data['userLogin'] = $this->session->userdata('loginData'); 
        $data['listData'] = $this->m_kamar->getAllKamar();
        $data['v_content'] = 'member/kamar/list';
        $this->load->view('member/layout', $data);

    }

    public function add(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['listTipeKamar'] = $this->m_tipe->getAllTipe();
		$data['fasilitasInclude'] = $this->m_fasilitasinclude->getAllfasilitasinclude();
        $data['v_content'] = 'member/kamar/add';
        $this->load->view('member/layout', $data);
        
    }

    public function doAdd(){
        $post = $this->input->post();
		if($_FILES['txtFoto1']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto1']['name']);
			move_uploaded_file($_FILES['txtFoto1']['tmp_name'], $uploadfile);
		}
		if($_FILES['txtFoto2']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto2']['name']);
			move_uploaded_file($_FILES['txtFoto2']['tmp_name'], $uploadfile);
		} 
		if($_FILES['txtFoto3']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto3']['name']);
			move_uploaded_file($_FILES['txtFoto3']['tmp_name'], $uploadfile);
		}
		if($_FILES['txtFoto4']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto4']['name']);
			move_uploaded_file($_FILES['txtFoto4']['tmp_name'], $uploadfile);
		}
		$id_kamar = $this->m_kamar->getMaxKamar();
		$id = $id_kamar['id_kamar'] + 1;
		$dataToInsert = array("nama_kamar" => $post['txtKamar'],
							  "id_tipekamar" => $post['txtTipeKamar'],
							  "jumlah_kamar" => $post['txtJumlah'],
							  "lantai_kamar" => $post['txtLantai'],
							  "harga" => str_replace(',', '', $post['txtHarga']),
							  "deskripsi" => $post['txtDeskripsi'],
							  "foto1" => $_FILES['txtFoto1']['name'],
							  "foto2" => $_FILES['txtFoto2']['name'],
							  "foto3" => $_FILES['txtFoto3']['name'],
							  "foto4" => $_FILES['txtFoto4']['name'],
							  "id_kamar" => $id);
		if($this->db->insert('kamar',$dataToInsert)){
			//$id = $this->db->insert_id();
			$no_ruang = $post['txtNoRuangAwal'];
			for($i=0;$i<$post['txtJumlah'];$i++){
				$no_ruang = $no_ruang;
				$dataToInsert = array("id_kamar" => $id,
									  "no_ruang" => $no_ruang);
				$this->db->insert('detilkamar',$dataToInsert);
				$no_ruang = $no_ruang + 1;
			}
			$fasilitasInclude = count($post['txtFasilitasInclude']);
			for($i=0;$i<$fasilitasInclude;$i++){
				$dataToInsert = array("id_kamar" => $id,
									  "id_fasilitasinclude" => $post['txtFasilitasInclude'][$i]);
				$this->db->insert('detilfasilitaskamar',$dataToInsert);
			}
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal menambahkan data","gagal");  
		}
		redirect('admin/kamar/add');
    }

    public function doDelete($id){
		$dataR = $this->m_kamar->getKamarReservasiByID($id); 
		if(count($dataR)>0){
            $this->m_umum->generatePesan("Maaf, kamar yang akan dihapus sedang direservasi, silakan lakukan hapus data setelah reservasi selesai","gagal"); 
            redirect('admin/kamar/daftar');
        }else{
			$hapus = $this->db->delete('kamar',array('id_kamar' => $id));
			if($hapus){
			  $this->db->delete('detilkamar',array('id_kamar' => $id));
			  $this->db->delete('detilfasilitaskamar',array('id_kamar' => $id));
			  $this->m_umum->generatePesan("Berhasil menghapus data","berhasil");  
			}else{
			   $this->m_umum->generatePesan("Gagal menghapus data","gagal");   
			}
			redirect('admin/kamar/daftar');
		}
    }

    public function edit($id){
        $data = $this->m_kamar->getKamarByID($id); 
        $dataR = $this->m_kamar->getKamarReservasiByID($id); 
        if(count($data)==0){
            $this->m_umum->generatePesan("Tidak dapat menemukan data dengan ID tsb","gagal"); 
            redirect('admin/kamar/daftar');
        }elseif(count($dataR)>0){
            $this->m_umum->generatePesan("Maaf, kamar yang akan dihapus sedang direservasi, silakan lakukan edit data setelah reservasi selesai","gagal"); 
            redirect('admin/kamar/daftar');
        }else{
            $data['userLogin'] = $this->session->userdata('loginData');   
            $data['dataDetail'] = $data;
			// $data['fasilitasInclude'] = $this->m_kamar->getFasilitasInclude($id);
			$data['listTipeKamar'] = $this->m_tipe->getAllTipe();
			$data['fasilitasInclude'] = $this->m_fasilitasinclude->getAllfasilitasinclude();
            $data['v_content'] = 'member/kamar/edit';
            $this->load->view('member/layout', $data);
        }
    }

    public function doEdit($id){
            // $post = $this->input->post();
			// $dataToInsert = array("jabatan" => $post['txtJabatan']);
            // if($this->db->update('jabatan',$dataToInsert,array('id_jabatan' => $id))){
              // $this->m_umum->generatePesan("Berhasil update data","berhasil");
            // }else{
              // $this->m_umum->generatePesan("Gagal update data","gagal");  
            // }
            // redirect('admin/jabatan/daftar');
		$post = $this->input->post();
		$foto1 = "";
		$foto2 = "";
		$foto3 = "";
		$foto4 = "";
		if($_FILES['txtFoto1']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto1']['name']);
			move_uploaded_file($_FILES['txtFoto1']['tmp_name'], $uploadfile);
			$foto1 = $_FILES['txtFoto1']['name'];
		}
		if($_FILES['txtFoto2']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto2']['name']);
			move_uploaded_file($_FILES['txtFoto2']['tmp_name'], $uploadfile);
			$foto2 = $_FILES['txtFoto2']['name'];
		} 
		if($_FILES['txtFoto3']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto3']['name']);
			move_uploaded_file($_FILES['txtFoto3']['tmp_name'], $uploadfile);
			$foto3 = $_FILES['txtFoto3']['name'];
		}
		if($_FILES['txtFoto4']['name']!=""){
			$uploaddir = 'assets/kamar/';
			$uploadfile = $uploaddir . basename($_FILES['txtFoto4']['name']);
			move_uploaded_file($_FILES['txtFoto4']['tmp_name'], $uploadfile);
			$foto4 = $_FILES['txtFoto4']['name'];
		}
		$dataToInsert = array("nama_kamar" => $post['txtKamar'],
							  "id_tipekamar" => $post['txtTipeKamar'],
							  "jumlah_kamar" => $post['txtJumlah'],
							  "lantai_kamar" => $post['txtLantai'],
							  "harga" => str_replace(',', '', $post['txtHarga']),
							  "deskripsi" => $post['txtDeskripsi'],
							  "foto1" => $_FILES['txtFoto1']['name'],
							  "foto2" => $_FILES['txtFoto2']['name'],
							  "foto3" => $_FILES['txtFoto3']['name'],
							  "foto4" => $_FILES['txtFoto4']['name']);
		if($this->db->update('kamar',$dataToInsert,array('id_kamar' => $id))){
			$id = $this->uri->segment(4);
			$this->db->where('id_kamar', rawurldecode($id) );
			$this->db->delete('detilkamar');
			$no_ruang = $post['txtNoRuangAwal'];
			for($i=0;$i<$post['txtJumlah'];$i++){
				$no_ruang = $no_ruang;
				$dataToInsert = array("id_kamar" => $id,
									  "no_ruang" => $no_ruang);
				$this->db->insert('detilkamar',$dataToInsert);
				$no_ruang = $no_ruang + 1;
			}
			$fasilitasInclude = count($post['txtFasilitasInclude']);
			$this->db->where('id_kamar', rawurldecode($id) );
			$this->db->delete('detilfasilitaskamar');
			for($i=0;$i<$fasilitasInclude;$i++){
				$dataToInsert = array("id_kamar" => $id,
									  "id_fasilitasinclude" => $post['txtFasilitasInclude'][$i]);
				$this->db->insert('detilfasilitaskamar',$dataToInsert);
			}
			$this->m_umum->generatePesan("Berhasil mengupdate data","berhasil");
		}else{
		  $this->m_umum->generatePesan("Gagal mengupdate data","gagal");  
		}
		redirect('admin/kamar/add');
    }

}