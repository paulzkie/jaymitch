<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Usermaintenance extends CI_Controller {

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

		$data = $this->jaymitch->getUser();
		$pos = $this->jaymitch->getPosition();

		$this->load->view('header.php');
		$this->load->view('usermaintenance.php',['userdata'=>$data, 'userposition'=>$pos]);
		$this->load->view('footer.php');
	}
	public function insert(){

		$date = date("F d, Y h:i A");
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$usertypeid = $this->input->post('usertypeid');

		if(empty($fname)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a first name.'
				);
			echo json_encode($m);
		}else if(empty($lname)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a last name.'
				);
			echo json_encode($m);
		}else if(empty($contact)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a contact.'
				);
			echo json_encode($m);
		}else if(empty($address)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a address.'
				);
			echo json_encode($m);
		}else if(empty($email)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a email.'
				);
			echo json_encode($m);
		}else if(empty($username)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a username.'
				);
			echo json_encode($m);
		}else if(empty($password)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a password.'
				);
			echo json_encode($m);
		}else if(empty($usertypeid)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a position.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'fname' => $fname,
					'lname' => $lname,
					'contact' => $contact,
					'address' => $address,
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'usertypeid' => $usertypeid
				);

			$this->jaymitch->insertUser($data);

			$m = array(
					'stat' =>1,
					'msg' => 'Successully added.'
				);
			echo json_encode($m);
		}
	}

	public function delete(){

		$date = date("F d, Y h:i A");
		$this->jaymitch->deleteUser($this->input->post('userid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successully deleted.'
				);
			echo json_encode($m);
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$userid = $this->input->post('userid');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$usertypeid = $this->input->post('usertypeid');

		if(empty($fname)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a first name.'
				);
			echo json_encode($m);
		}else if(empty($lname)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a last name.'
				);
			echo json_encode($m);
		}else if(empty($contact)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a contact.'
				);
			echo json_encode($m);
		}else if(empty($address)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a address.'
				);
			echo json_encode($m);
		}else if(empty($email)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a email.'
				);
			echo json_encode($m);
		}else if(empty($username)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a username.'
				);
			echo json_encode($m);
		}else if(empty($password)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a password.'
				);
			echo json_encode($m);
		}else if(empty($usertypeid)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a position.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'fname' => $fname,
					'lname' => $lname,
					'contact' => $contact,
					'address' => $address,
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'usertypeid' => $usertypeid
				);

			$this->jaymitch->updateUser($data, $userid);

			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);
			echo json_encode($m);
		}
	}
}
