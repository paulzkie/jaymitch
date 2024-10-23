<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
		$aboutid = $this->input->post('aboutid');
		$desc = $this->input->post('description');

		if(empty($desc)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a description.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'description' => $desc
				);
			$this->jaymitch->updateAbout($data, $aboutid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);
			echo json_encode($m);
		}
	}
}
