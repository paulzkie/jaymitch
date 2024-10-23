<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class View extends CI_Controller {

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

		$notifstat = array(
			'notifstat'=> 0
		);

		$this->jaymitch->readNotif($notifstat, $this->input->get('reserveid'));

		$data = $this->jaymitch->getContact();

		$this->load->view('header.php');
		$this->load->view('view.php');
		$this->load->view('footer.php',['userdata'=>$data]);

	}

	public function update(){

		$email = $this->session->userdata["email"];
		$fullname = $this->session->userdata["fullname"];
		$reserveid = $this->input->post('reserveid');
		$rdate = $this->input->post('rdate');

		$data = array(
			'dateofevent' => $rdate,
			'status' => 'Rescheduled',
			'reschedstat' => 1
					);

		    $to = $email;
			$subject = 'Reservation Request';
			$message = '<html><head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Reschedule Request</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			</head>
			<body style="margin: 0px; padding: 0px;">';
			$message .= 'Dear '.$fullname.'<br>
			<p>Welcome to Jay and Mitch Catering Services.</p><br>
			<p>Your Reschedule request has been sent. Please wait to confirm your request. Thank you.</p>';
			$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
			<script src="./js/ga-tracking.min.js"></script>
			</body></html>';
			$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						mail($to, $subject, $message, $headers);

			$this->jaymitch->updateResched($data, $reserveid);
	}
}
