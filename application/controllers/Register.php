<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$data = $this->jaymitch->getContact();


		$this->load->view('header.php');
		$this->load->view('register.php');
		$this->load->view('footer.php',['userdata' => $data]);
	}

	public function insert(){

		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repass = $this->input->post('repassword');

		
		if(empty($fname)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter first name.'
				);
			echo json_encode($m);
		}else if(empty($lname)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter last name.'
				);
			echo json_encode($m);
		}else if(empty($contact)){	
			$m = array(
					'stat' => 0,
					'msg' => 'Enter contact.'
				);
			echo json_encode($m);
		}else if(empty($address)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter address.'
				);
			echo json_encode($m);
		}else if(empty($email)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter email.'
				);
			echo json_encode($m);
		}else if(empty($username)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter username.'
				);
			echo json_encode($m);
		}else if(empty($password)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter password.'
				);
			echo json_encode($m);
		}else if(empty($repass)){
			$m = array(
					'stat' => 0,
					'msg' => 'Enter confirm password.'
				);
			echo json_encode($m);
		}else if($password!=$repass){
			$m = array(
					'stat' => 0,
					'msg' => 'Password not match.'
				);
			echo json_encode($m);
		}else if(strlen($contact)<11){
			$m = array(
					'stat' => 0,
					'msg' => 'Invalid mobile number.'
				);
			echo json_encode($m);
		}else if(strlen($username)<8){
			$m = array(
					'stat' => 0,
					'msg' => 'Username must be 8 characters.'
				);
			echo json_encode($m);
		}else if(strlen($password)<8){
			$m = array(
					'stat' => 0,
					'msg' => 'password must be 8 characters.'
				);
			echo json_encode($m);
		}else{
			if($this->jaymitch->getEmails($email)){
					$m = array(
					'stat' => 0,
					'msg' => 'Email is already exist.'
					);
					echo json_encode($m);	
			}else {
				if($this->jaymitch->getUsernames($username)){
						$m = array(
						'stat' => 0,
						'msg' => 'Username is already exist.'
						);
						echo json_encode($m);
				}else{
						$data = array(
								'fname' => $fname,
								'lname' => $lname,
								'contact' => $contact,
								'address' => $address,
								'email' => $email,
								'username' => $username,
								'password' => $password,
								'usertypeid' => 3,
								'stat' => 'Inactive'
							);
						$this->jaymitch->registration($data);

						$lastid = $this->jaymitch->getLastId();
						
						foreach($lastid as $id)
						$id->maxid;
						
						$to = $email;
								$subject = 'Account Verification';
								$message = '<html><head>
								<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
								<title>Email Confirmation</title>
								<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
								</head>
								<body style="margin: 0px; padding: 0px;">';
								$message .= 'Dear '.$fname.' '.$lname.'<br>
								<p>Welcome to Jay and Mitch Catering Services.</p><br>
								<p>Please click here to verify your account. <a href="www.jayandmitch.cuccfree.com/verify?userid='.$id->maxid.'">Verify</a></p>';
								$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
								<script src="./js/ga-tracking.min.js"></script>
								</body></html>';
								$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
								$headers  .= 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						mail($to, $subject, $message, $headers);  
					$m = array(
					'stat' => 1,
					'msg' => 'We send email verification at '.$email.' to verify your account.'
					);
					echo json_encode($m);
				}
			}
		}
	}
}
