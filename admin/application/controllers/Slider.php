<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
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

		$data = $this->jaymitch->getSlider();

		$this->load->view('header.php');
		$this->load->view('slider.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function do_upload(){

		$date = date("F d, Y h:i A");
		$name = $this->input->post('name');
		$desc = $this->input->post('description');

		$config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
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

        $countslider = $this->jaymitch->countSlider();
	        foreach ($_FILES as $key => $value) {
			 	// $this->upload->do_upload($key);
		        if ( ! $this->upload->do_upload($key))
		        {
		                $m = array(
							'stat' =>0,
							'msg' => 'No image selected or error uploading.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		        	if($countslider[0]->countSlider==3){
				        	$m = array(
									'stat' =>0,
									'msg' => 'You have reached the maximum limit of uploading slider.'
									);
									echo json_encode($m);
				     }else{
		                $data = array(
		                	'name' => $name,
		                	'description' => $desc,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->insertSlider($data);

						$m = array(
							'stat' =>1,
							'msg' => 'Successfully added.'
						);
						echo json_encode($m);
		        }
	    	}
	    }
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$sliderid = $this->input->post('sliderid');
		$name = $this->input->post('name');
		$desc = $this->input->post('description');

		$config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
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
		                	'name' => $name,
		                	'description' => $desc
		                	);

		                $this->jaymitch->updateSlider($data, $sliderid);

						$m = array(
							'stat' =>1,
							'msg' => 'Successfully updated.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		                $data = array(
		                	'name' => $name,
		                	'description' => $desc,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->updateSlider($data, $sliderid);

						$m = array(
							'stat' =>1,
							'msg' => 'Successfully updated.'
						);
						echo json_encode($m);
		        }
	    	}
		}

		public function remove(){

			$date = date("F d, Y h:i A");
						$this->jaymitch->removeSlider($this->input->post('sliderid'));
						$m = array(
							'stat' =>1,
							'msg' => 'Successully deleted.'
						);
						echo json_encode($m);
		}
}
