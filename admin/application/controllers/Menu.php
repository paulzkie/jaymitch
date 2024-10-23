<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Menu extends CI_Controller {

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

		$getMenu = $this->jaymitch->getMenu();

		$this->load->view('header.php');
		$this->load->view('menu.php',['getCategory'=>$data, 'getMenu'=> $getMenu]);
		$this->load->view('footer.php');
	}

	public function do_upload(){

		$date = date("F d, Y h:i A");
		$dishname = $this->input->post('dishname');
		$desc = $this->input->post('description');
		$price = $this->input->post('price');
		$category = $this->input->post('category');

		$config['upload_path']          = './assets/servicesImages/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2000000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        // $config['encrypt_name'] = TRUE;
        $new_name = time().$_FILES["image"]['name'];
		$config['file_name'] = $new_name;

		$this->load->helper('file');
        // echo json_encode($_POST);
        // $this->load->library('upload');

        $this->load->library('upload', $config);

	        foreach ($_FILES as $key => $value) {
			 	// $this->upload->do_upload($key);
		        if ( ! $this->upload->do_upload($key))
		        {
		                $m = array(
							'stat' =>0,
							'msg' => 'Error uploading.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		                $data = array(
		                	'dishname' => $dishname,
		                	'description' => $desc,
		                	'catid' => $category,
		                	'price' => $price,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->insertMenu($data);

						$m = array(
							'stat' =>1,
							'msg' => 'Successully added.'
						);
						echo json_encode($m);
		        }
	    	}
	}

	public function remove(){

		$date = date("F d, Y h:i A");
		$this->jaymitch->deleteMenu($this->input->post('menuid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successully deleted.'
				);
			echo json_encode($m);
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$menuid = $this->input->post('menuid');
		$dishname = $this->input->post('dishname');
		$desc = $this->input->post('description');
		$price = $this->input->post('price');
		$category = $this->input->post('category');

		$config['upload_path']          = './assets/servicesImages/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 200000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        // $config['encrypt_name'] = TRUE;
        $new_name = time().$_FILES["image"]['name'];
		$config['file_name'] = $new_name;

		$this->load->helper('file');
        // echo json_encode($_POST);
        // $this->load->library('upload');

        $this->load->library('upload', $config);

	        foreach ($_FILES as $key => $value) {
			 	// $this->upload->do_upload($key);
		        if ( ! $this->upload->do_upload($key))
		        {
		                $data = array(
		                	'dishname' => $dishname,
		                	'description' => $desc,
		                	'catid' => $category,
		                	'price' => $price
		                	);

		                $this->jaymitch->updateMenu($data, $menuid);

						$m = array(
							'stat' =>1,
							'msg' => 'Successully updated.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		                $data = array(
		                	'dishname' => $dishname,
		                	'description' => $desc,
		                	'catid' => $category,
		                	'price' => $price,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->updateMenu($data, $menuid);

						$m = array(
							'stat' =>1,
							'msg' => 'Successully updated.'
						);
						echo json_encode($m);
		        }
	    	}
		}
}
