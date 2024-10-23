<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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

		$this->load->view('header.php');
		$this->load->view('contact.php',['userdata' => $data]);
		$this->load->view('footer.php',['userdata' => $data]);
	}

	public function insert(){

		$name = $this->input->post('name');
		$Email = $this->input->post('Email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');

		if(empty($name)){

			$m = array(
				'stat'=>0,
				'msg'=> 'Enter your name'
			);
			echo json_encode($m);
		}else if(empty($Email)){
			$m = array(
				'stat'=>0,
				'msg'=> 'Enter your email'
			);
			echo json_encode($m);
		}else if(empty($subject)){
			$m = array(
				'stat'=>0,
				'msg'=> 'Enter a subject'
			);
			echo json_encode($m);
		}else if(empty($message)){
			$m = array(
				'stat'=>0,
				'msg'=> 'Enter your message'
			);
			echo json_encode($m);
		}else{

			$data = array(
				'name'=>$name,
				'Email'=>$Email,
				'subject'=>$subject,
				'message'=>$message
			);

			$this->jaymitch->insertInquiry($data);

			$m = array(
				'stat'=>1,
				'msg'=>'Your message has been sent.'
			);
			echo json_encode($m);
		}

	}
}
