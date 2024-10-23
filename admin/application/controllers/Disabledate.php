<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Disabledate extends CI_Controller {

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

		$data = $this->jaymitch->getAbout();

		$this->load->view('header.php');
		$this->load->view('disabledate.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function dates(){

		$getDates = $this->jaymitch->getDates();

		foreach ($getDates as $dates) {
			$getdate[] = $dates->dateofevent;
		}
			echo json_encode($getdate);

	}

	public function insert(){

		$date = date("F d, Y h:i A");
		$rdate = $this->input->post('rdate');

		if(empty($rdate)){
			$m = array(
					'stat' =>0,
					'msg' => 'Choose date to disable.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'dateofevent' => $rdate
				);
			$this->jaymitch->insertDate($data);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully date disabled.'
				);

			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'date disabled',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);
			echo json_encode($m);
		}
	}
}
