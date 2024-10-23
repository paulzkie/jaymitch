<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
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
	public function index(){

		$data = $this->jaymitch->getContact();

		$this->load->view('header.php');
		$this->load->view('contact.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$contactid = $this->input->post('contactid');
		$address = $this->input->post('address');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$map = $this->input->post('map');

		if(empty($address)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a address.'
				);
			echo json_encode($m);
		}else if(empty($contact)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a contact.'
				);
			echo json_encode($m);	
		}else if(empty($email)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a email.'
				);
			echo json_encode($m);	
		}else if(empty($map)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a map.'
				);
			echo json_encode($m);	
		}else{
			$data = array(
					'address' => $address,
					'contact' => $contact,
					'email' => $email,
					'map' => $map
				);
			$this->jaymitch->updateContact($data, $contactid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successfully updated.'
				);
			echo json_encode($m);

			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Update contact us.',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);
		}
	}
}
