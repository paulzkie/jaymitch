<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class About extends CI_Controller {

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
		$this->load->view('about.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$aboutid = $this->input->post('aboutid');
		$desc = $this->input->post('description');
		$vision = $this->input->post('vision');

		if(empty($desc)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a description.'
				);
			echo json_encode($m);
		}else if(empty($vision)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a vision.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'description' => $desc,
					'vision' => $vision
				);
			$this->jaymitch->updateAbout($data, $aboutid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);

			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Update about us',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);
			echo json_encode($m);
		}
	}
}
