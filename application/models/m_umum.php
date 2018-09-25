<?php

class m_umum extends CI_Model {
    function __construct() {
        parent::__construct();
		// if(!$this->session->userdata('loginData')){
            // redirect('admin/login');
        // }
        
    }
	public function kirim($email, $ket){
		$data['userLogin'] = $this->session->userdata('loginData');
		$this->load->library('email');
		$link_gambar = "";
		
		$subject    = "Registration As an Incoming Member";
		$message = '<table border="0" cellpadding="0" style=""background-color:#f92424;border-radius:3px 3px 0 0!important;color:#ffffff;" cellspacing="0" height="100%" width="100%">
			<tr>
				<td>'.$ket.
					
				'</td>
			</tr>
		</table>';

    	
		$this->sendEmail($email,$subject,$message);
		// $this->sendEmail('agung.serv@gmail.com',$subject,$message);
	}
	
	public function sendEmail($email,$subject,$message){
		$this->load->library('email');
		
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'mail.blast0@gmail.com';
		$config['smtp_pass']    = 'mail098*()2';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      

		$this->email->initialize($config);
		$this->email->from('suncity.com');
		
		$this->email->to($email); 
		$this->email->subject($subject);
		$this->email->message($message);  
		
		if($this->email->send() == 1){
			echo json_encode(array("status" => "Success"));
			
		}else{
			echo json_encode(array("status" =>"Failed"));
		}
	}
	
	
	/* function kirim($email,$ket){
		$content = $ket.
		'<table border="0" cellpadding="0" style=""background-color:#f92424;border-radius:3px 3px 0 0!important;color:#ffffff;" cellspacing="0" height="100%" width="100%">
			<tr>
				<td>
					$ket
				</td>
			</tr>
		</table>';
		$this->sendEmail("suncity@gmail.com","Sun City",$email,"","Notifikasi",$content);
    } */
	
	/* function sendEmail($fromEmail, $fromName, $to, $cc="", $subject, $template, $attach = array()) {
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
	} */
	
	
    function generatePesan($pesan, $type) {
        if ($type == "berhasil") {
            $str = '<div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                        </button>

                        <!--<i class="ace-icon fa fa-check green"></i>-->
                        '.$pesan.'
                    </div>';
        } elseif($type=="gagal") {
            $str = '<div class="alert alert-block alert-danger">
                        <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                        </button>

                        <!--<i class="ace-icon fa fa-times red"></i>-->
                        '.$pesan.'
                    </div>';
        }else{
            $str = '<div class="alert alert-block alert-warning">
                        <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                        </button>

                        
                        '.$pesan.'
                    </div>';
        }
        
        $this->session->set_flashdata('msgbox',$str);
		
		return $str;
    }
    
    
    
   

    function sendWhatsAppMessage($toNumber,$message){
        $key = '9bd664161dc8bcad0c28c30300b86853';
        $secret = 'c65e4abf04cc85a523923a48712f54b6';
        $message = urlencode($message);
        $urlPair = "http://128.199.178.179/whatapi/api/send_message?nomor=".$toNumber."&pesan=".$message."&secret=".$secret."&key=".$key."";
        $exe  = json_decode(file_get_contents($urlPair));
        $status       = $exe->success;

        if($status==1){
            return true;
        }else{
            return false;
        }
        //return $status;

    }
	
	
    function formatTanggal($datetime,$format='d/m/Y'){
        
        //die($datetime); 
        $time = strtotime($datetime);
        
        
        $myFormatForView = date($format, $time);
        return $myFormatForView;
    
    }

    
}
