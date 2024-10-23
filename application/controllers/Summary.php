<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class Summary extends CI_Controller {

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

		$getHold = $this->jaymitch->getHold($this->session->userdata["holdid"]);

		if($getHold[0]->packagetype=="Customize"){

		$getMenu = $this->jaymitch->getSummaryOrder($this->session->userdata["holdid"], $this->session->userdata["userid"] );

		$this->load->view('header.php');
		$this->load->view('summary.php',['getHold'=> $getHold,'getMenu'=> $getMenu]);
		$this->load->view('footer.php',['userdata'=>$data]);

		}else{

		$getMenu = $this->jaymitch->getMenu($getHold[0]->packagetype); 

		$this->load->view('header.php');
		$this->load->view('summary.php',['getHold'=> $getHold,'getMenu'=> $getMenu]);
		$this->load->view('footer.php',['userdata'=>$data]);

		}
	}

	function random_num( $length = 8 ) {
    $nums = "0123456789";
    $number = substr( str_shuffle( $nums ), 0, $length );
    return $number;
	}

	function random_char( $length = 3 ) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $characters = substr( str_shuffle( $chars ), 0, $length);
    return $characters;
	}

	public function insert(){

		$email = $this->session->userdata["email"];
		$fullname = $this->session->userdata["fullname"];

		$date=date("F d, Y");
		$transactioncode = $this->random_num(8).'-'.$this->random_char(3);
		$place = $this->input->post('place');
		$rdate = $this->input->post('rdate');
		$time = $this->input->post('time');
		$motif = $this->input->post('motif');
		$pax = $this->input->post('pax');
		$package = $this->input->post('package');
		$total = $this->input->post('total');

		if($package=="Customize"){

		$Orders = $this->jaymitch->getSummaryOrder($this->session->userdata["holdid"], $this->session->userdata["userid"] );
		
		foreach($Orders as $order){

				$getOrders = array(
					'menuid' => $order->menuid,
					'userid' => $this->session->userdata["userid"],
					'transactioncode' => $transactioncode
					);

			$this->jaymitch->insertCustomize($getOrders);

		}	
			$data = array(
					'transactioncode' => $transactioncode,	
					'userid' => $this->session->userdata["userid"],
					'place' => $place,
					'dateofevent' => $rdate,
					'time' => $time,
					'motif' => $motif,
					'pax' => $pax,
					'packagetype' => $package,
					'total' => $total,
					'status' => 'Pending',
					'reservationdate' => $date
				);

			$to = $email;
			$subject = 'Reservation Request';
			$message = '<html><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Reservation Request</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			</head>
			<body style="margin: 0px; padding: 0px;">';
			$message .= 'Dear '.$fullname.'<br>
			<p>Welcome to Jay and Mitch Catering Services.</p><br>
			<p>Your reservation request has been sent. Please pay your bill at Metro bank or Palawan Express to confirm you request. Thank you.</p>';
			$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
			<script src="./js/ga-tracking.min.js"></script>
			</body></html>';
			$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						mail($to, $subject, $message, $headers); 
						
			$this->jaymitch->insertReserve($data);
			$this->jaymitch->deleteOrders($this->session->userdata["holdid"], $this->session->userdata["userid"]);
			$this->jaymitch->deleteHold($this->session->userdata["holdid"]);

		}else{

			$data = array(
					'transactioncode' => $transactioncode,	
					'userid' => $this->session->userdata["userid"],
					'place' => $place,
					'dateofevent' => $rdate,
					'time' => $time,
					'motif' => $motif,
					'pax' => $pax,
					'packagetype' => $package,
					'total' => $total,
					'status' => 'Pending',
					'reservationdate' => $date
				);
			
			$to = $email;
			$subject = 'Reservation Request';
			$message = '<html><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Reservation Request</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			</head>
			<body style="margin: 0px; padding: 0px;">';
			$message .= 'Dear '.$fullname.'<br>
			<p>Welcome to Jay and Mitch Catering Services.</p><br>
			<p>Your reservation request has been sent. Please pay your bill at Metro bank or Palawan Express to confirm you request. Thank you.</p>';
			$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
			<script src="./js/ga-tracking.min.js"></script>
			</body></html>';
			$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						mail($to, $subject, $message, $headers); 

			$this->jaymitch->insertReserve($data);
			$this->jaymitch->deleteHold($this->session->userdata["holdid"]);
		}
	}

}
