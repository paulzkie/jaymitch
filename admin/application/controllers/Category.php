<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Category extends CI_Controller {

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

		$data = $this->jaymitch->getCategory();

		$this->load->view('header.php');
		$this->load->view('category.php',['userdata'=>$data]);
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
					'msg' => 'Successfully added.'
				);
			echo json_encode($m);

			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Add category',
							'logdate' => $date
						);
			$this->jaymitch->insertlogtbl($logtbl);
		}
	}

	public function delete(){

		$date = date("F d, Y h:i A");
		$this->jaymitch->deleteCategory($this->input->post('catid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successfully deleted.'
				);
			echo json_encode($m);

			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'delete category.',
							'logdate' => $date
						);
			$this->jaymitch->insertlogtbl($logtbl);
	}

	public function update(){

		$date = date("F d, Y h:i A");

		$catid = $this->input->post('catid');
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
			$this->jaymitch->updateCategory($data, $catid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successfully updated.'
				);
			echo json_encode($m);

 			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Update category.',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);
		}
	}
}
