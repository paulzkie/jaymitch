<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservationpackages extends CI_Controller {

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
	public function index()
	{
		$data = $this->jaymitch->getContact();

		$getPackages = $this->jaymitch->getPackages();
		$getTime = $this->jaymitch->getTime();

		$this->load->view('header.php');
		$this->load->view('reservationpackages.php',['getPackages'=>$getPackages,'getTime'=>$getTime]);
		$this->load->view('footer.php',['userdata' => $data]);
	}

	public function insertDetails(){

		$place =  $this->input->post('place');
		$rdate = $this->input->post('rdate');
		$time = $this->input->post('time');
		$motif = $this->input->post('motif');
		$pax = $this->input->post('pax');
		$package = $this->input->post('package');

		$data = array(
				'userid' => $this->session->userdata["userid"],
				'place' => $place,
				'dateofevent' => $rdate,
				'time' => $time,
				'motif' => $motif,
				'pax' => $pax,
				'packagetype' => $package
			);
		$this->jaymitch->insertHold($data);

		$getHoldid = $this->jaymitch->getHoldid();

		$this->session->set_userdata(array(
								"holdid"=>$getHoldid[0]->maxid
								));
	}
}
