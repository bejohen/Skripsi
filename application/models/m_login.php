<?php

class m_login extends CI_Model {
    
    function checkLogin($username,$password){
        $this->db->select('*');
        $this->db->from('user as us');
        $this->db->where('us.username', $username);
        $this->db->where('us.password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
        $querycheck = $query->result();
        $dataArr = array('id_user' => $querycheck[0]->id_user,
						 'username' => $querycheck[0]->username,
						 'nama' => $querycheck[0]->nama,
						 'jabatan' => $querycheck[0]->jabatan);
        $this->session->set_userdata('loginData',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }  
    }
	
	 function checkLoginPelanggan($email,$password){
        $this->db->select('*');
        $this->db->from('pelanggan as us');
        $this->db->where('us.email', $email);
        $this->db->where('us.password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->result();
			if($querycheck[0]->status >= 3){
				return "blokir"; 
			}else{
				$dataArr = array('id_pelanggan' => $querycheck[0]->id_pelanggan,
								 'nama_panggilan' => $querycheck[0]->nama_panggilan,
								 'nama_lengkap' => $querycheck[0]->nama_lengkap,
								 'email' => $querycheck[0]->email);
				$this->session->set_userdata('loginDataPelanggan',$dataArr);
				return "berhasil"; 
			}
        }else{
			$this->db->select('*');
			$this->db->from('pelanggan as us');
			$this->db->where('us.email', $email);
			$query = $this->db->get();
			$querycheck = $query->result();
			// echo $querycheck[0]->status;
			// exit();
			if($querycheck[0]->status >= 3){
				return "blokir"; 
			}else{
				$dataToInsert = array("status" => $querycheck[0]->status+1);
				$this->db->update('pelanggan',$dataToInsert,array('email' => $email));
				$this->session->set_flashdata('GagalLogin', 'Ya');    
				return "gagal";
			}
        }
        
        
    }
	
	
	function doResetByEmail($email){
		$this->db->select('*');
        $this->db->from('pelanggan as us');
        $this->db->where('us.email', $email);
        $query = $this->db->get();
        if($query->num_rows()>0){
			$new_pass = $this->generateRandomString(6);
			$this->db->update('pelanggan',array("password" => md5($new_pass)),array("email"=>$email));
			return $new_pass;
		}else{
			return false;
		}
		
	}
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	public function checkLoginApps($email,$password){
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	function kirim($email,$ket){
		$content = $ket;
		'<table border="0" cellpadding="0" style=""background-color:#f92424;border-radius:3px 3px 0 0!important;color:#ffffff;" cellspacing="0" height="100%" width="100%">
			<tr>
				<td>
					$ket
				</td>
			</tr>
		</table>';
		$this->sendEmail("hgarudawira@gmail.com","Hotel Garuda Wira",$email,"","Notifikasi",$content);
    }
	
	function sendEmail($fromEmail, $fromName, $to, $cc="", $subject, $template, $attach = array()) {
		$today = date ( "Y-m-d H:i:s" );
		$config = Array (
				'protocol' => 'smtp',
				'mailtype' => 'html',
				'smtp_crypto' => '',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_timeout' => 100,
				'smtp_user' => 'tokokudev@gmail.com',
				// 'smtp_user' => 'fixedasset.ims@gmail.com',
				'smtp_pass' => 'prosupport',
				// 'smtp_pass' => '098ims!@#',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'crlf' => '\r\n' 
				// 'protocol' => 'smtp',
				// 'mailtype' => 'html',
				// 'smtp_crypto' => '',
				// 'smtp_host' => 'mail.hsedepartemen.us',
				// 'smtp_port' => 25,
				// 'smtp_timeout' => 30,
				// 'smtp_user' => 'admin@hsedepartemen.us',
				// 'smtp_pass' => 'jalanamerika636',
				// 'mailtype' => 'html',
				// 'charset' => 'utf-8',
				// 'crlf' => '\r\n' 
		);
		$this->load->library ( 'email', $config );
		$this->email->set_newline ( "\r\n" );
		$this->email->from ( $fromEmail, $fromName );
		$this->email->to ( $to );
		$this->email->cc ( $cc );
		$this->email->subject ( $subject );
		$this->email->message ( $template );
		if (count ( $attach ) > 0) 
		{
			for($i=0;$i<count($attach);$i++)
			{
				$this->email->attach ( $attach [$i] );
			}
		}
		
		if ($this->email->send ()) {
			 // echo "Berhasil";
			$this->email->clear ( TRUE );
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
			return false;
		}
	}
}
