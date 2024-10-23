<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Userlevelmaintenance extends CI_Controller {

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

		$data = $this->jaymitch->getPosition();

		$this->load->view('header.php');
		$this->load->view('userlevelmaintenance.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}
	public function insert(){

		$date = date("F d, Y h:i A");
		$position = $this->input->post('position');

		if(empty($position)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a position.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'position' => $position
				);
			$this->jaymitch->insertPosition($data);

			$m = array(
					'stat' =>1,
					'msg' => 'Successully added.'
				);
			echo json_encode($m);
		}
	}

	public function delete(){

		$date = date("F d, Y h:i A");
		$this->jaymitch->deletePosition($this->input->post('usertypeid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successully deleted.'
				);
			echo json_encode($m);
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$usertypeid = $this->input->post('usertypeid');
		$position = $this->input->post('position');

		if(empty($position)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a position.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'position' => $position
				);
			$this->jaymitch->updatePosition($data, $usertypeid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);
			echo json_encode($m);
		}
	}
}
