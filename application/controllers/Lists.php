<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Lists extends CI_Controller {

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
	public function index(){

		$data = $this->jaymitch->getContact();

		$getReserve = $this->jaymitch->getReserve($this->session->userdata["userid"]);

		$this->load->view('header.php');
		$this->load->view('lists.php',['getReserve'=> $getReserve]);
		$this->load->view('footer.php',['userdata'=>$data]);
	}

	public function update(){

		$email = $this->session->userdata["email"];
		$fullname = $this->session->userdata["fullname"];
		$reserveid = $this->input->post('reserveid');
		$bank = $this->input->post('bank');
		$ctrlno = $this->input->post('ctrlno');
		$amount = $this->input->post('amount');
		$dateofpayment = $this->input->post('dateofpayment');

		$config['upload_path']          = './admin/assets/paymentImages/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 200000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        // $config['encrypt_name'] = TRUE;
        $new_name = time().$_FILES["image"]['name'];
		$config['file_name'] = $new_name;

		$this->load->helper('file');
        // echo json_encode($_POST);
        // $this->load->library('upload');

        $this->load->library('upload', $config);

	        foreach ($_FILES as $key => $value) {
			 	// $this->upload->do_upload($key);
		        if ( ! $this->upload->do_upload($key))
		        {
						$m = array(
							'stat' =>0,
							'msg' => 'Error uploading payment.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		        	$totalpayment = $this->jaymitch->getReservation($reserveid);

		        	foreach($totalpayment as $total)
		        	$tot = $total->total;
		        	if($amount<$tot*0.50){
		        		$m = array(
							'stat' =>0,
							'msg' => 'Please pay exact amount or higher.'
						);
						echo json_encode($m);
		        	}else{
		                $data = array(
		                	'bank' => $bank,
		                	'ctrlno' => $ctrlno,
		                	'payment' => $amount,
		                	'dateofpayment' => $dateofpayment,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->updatePayment($data, $reserveid);
		                $to = $email;
						$subject = 'Payment';
						$message = '<html><head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						<title>Reservation Payment</title>
						<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
						</head>
						<body style="margin: 0px; padding: 0px;">';
						$message .= 'Dear '.$fullname.'<br>
						<p>Welcome to Jay and Mitch Catering Services.</p><br>
						<p>Your payment has been sent. Please wait for the confirmation of your request.</p>';
						$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
						<script src="./js/ga-tracking.min.js"></script>
						</body></html>';
						$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
						$headers  .= 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						mail($to, $subject, $message, $headers); 

						$m = array(
							'stat' =>1,
							'msg' => 'Payment sent. Please wait for the confirmation of your reservation.'
						);
						echo json_encode($m);
					}
		        }
	    	}

	}

	public function cancel(){

		$email = $this->session->userdata["email"];
		$fullname = $this->session->userdata["fullname"];
		$data = array(
				'status' => 'Cancelled'
			);
		$to = $email;
			$subject = 'Cancellation of reservation';
			$message = '<html><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Cancellation of reservation</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			</head>
			<body style="margin: 0px; padding: 0px;">';
			$message .= 'Dear '.$fullname.'<br>
			<p>Welcome to Jay and Mitch Catering Services.</p><br>
			<p>You cancelled your reservation request.</p>';
			$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
			<script src="./js/ga-tracking.min.js"></script>
			</body></html>';
			$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						mail($to, $subject, $message, $headers);

		$this->jaymitch->cancelReservation($data, $this->input->post('reserveid'));
	}
}
