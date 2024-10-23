<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Pax extends CI_Controller {

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

		$data = $this->jaymitch->getPax();

		$this->load->view('header.php');
		$this->load->view('pax.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}
	public function insert(){

		$date = date("F d, Y h:i A");
		$pax = $this->input->post('pax');
		if(empty($pax)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a pax.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'pax' => $pax
				);
			$this->jaymitch->insertPax($data);

			$m = array(
					'stat' =>1,
					'msg' => 'Successully added.'
				);
			echo json_encode($m);
		}
	}

	public function delete(){

		$date = date("F d, Y h:i A");
		$this->jaymitch->delPax($this->input->post('paxid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successully deleted.'
				);
			echo json_encode($m);
	}

	public function updates(){

		$date = date("F d, Y h:i A");

		$paxid = $this->input->post('paxid');

		$pax = $this->input->post('pax');

		if(empty($pax)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a pax.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'pax' => $pax
				);
			$this->jaymitch->updatePax($data, $paxid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);
			echo json_encode($m);
		}
	}
}
