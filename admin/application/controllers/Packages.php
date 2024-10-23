<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Packages extends CI_Controller {

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

		$data = $this->jaymitch->getPackages();

		$this->load->view('header.php');
		$this->load->view('packages.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function insert(){
		$date = date("F d, Y h:i A");
		$category = $this->input->post('category');

		if(empty($category)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a category.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'category' => $category
				);
			$this->jaymitch->insertCategory($data);

			$m = array(
					'stat' =>1,
					'msg' => 'Successully added.'
				);
			echo json_encode($m);
		}
	}

	public function delete(){
		$date = date("F d, Y h:i A");
		$this->jaymitch->deletePackage($this->input->post('packageinfoid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successully deleted.'
				);
			echo json_encode($m);
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$packageinfoid = $this->input->post('packageinfoid');
		$packagename = $this->input->post('packagename');
		$desc = $this->input->post('description');
		$price = $this->input->post('packageprice');

		if(empty($packagename)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a package name.'
				);
			echo json_encode($m);
		}else if(empty($desc)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a description.'
				);
			echo json_encode($m);
		}else if(empty($price)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a price.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'packagename' => $packagename,
					'Descript' => $desc,
					'packageprice' => $price
				);
			$this->jaymitch->updatePackageinfo($data, $packageinfoid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successully updated.'
				);
			echo json_encode($m);
		}
	}
}
