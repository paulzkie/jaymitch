<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Time extends CI_Controller {

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

		$data = $this->jaymitch->getTime();

		$this->load->view('header.php');
		$this->load->view('time.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}
	public function insert(){

		$date = date("F d, Y h:i A");
		$s = $this->input->post('starttime');
		$start = date('h:i A', strtotime($s));
		$e = $this->input->post('endtime');
		$end = date('h:i A', strtotime($e));

		if(empty($s)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a start time.'
				);
			echo json_encode($m);
		}else if(empty($e)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a end time.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'starttime' => $start,
					'endtime' => $end
				);
			$this->jaymitch->insertTime($data);

			$m = array(
					'stat' =>1,
					'msg' => 'Successully added.'
				);
			echo json_encode($m);
		}
	}

	public function delete(){

		$date = date("F d, Y h:i A");
		$this->jaymitch->deleteTime($this->input->post('timeid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successully deleted.'
				);
			echo json_encode($m);
	}

	public function updates(){

		$date = date("F d, Y h:i A");

		$timeid = $this->input->post('timeid');

		$s = $this->input->post('starttime');
		$start = date('h:i A', strtotime($s));

		$e1 = $this->input->post('enddtime');
		$ends = date('h:i A', strtotime($e1));

		if(empty($s)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a start time.'
				);
			echo json_encode($m);
		}else if(empty($e1)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a end time.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'starttime' => $start,
					'endtime' => $ends
				);
			$this->jaymitch->updateTime($data, $timeid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);
			echo json_encode($m);
		}
	}
}
