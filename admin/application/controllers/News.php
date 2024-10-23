<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class News extends CI_Controller {

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

		$data = $this->jaymitch->getNews();

		$this->load->view('header.php');
		$this->load->view('news.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function do_upload(){

		$date = date("F d, Y h:i A");
		$title = $this->input->post('title');
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
		                $m = array(
							'stat' =>0,
							'msg' => 'Error uploading.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		                $data = array(
		                	'title' => $title,
		                	'description' => $desc,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->insertNews($data);

						$m = array(
							'stat' =>1,
							'msg' => 'Successfully added.'
						);
						echo json_encode($m);
		        }
	    	}
	}

	public function update(){

		$date = date("F d, Y h:i A");
		$newsid = $this->input->post('newsid');
		$title = $this->input->post('title');
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
		                	'title' => $title,
		                	'description' => $desc
		                	);

		                $this->jaymitch->updateNews($data, $newsid);

						$m = array(
							'stat' =>1,
							'msg' => 'Successfully updated.'
						);
						echo json_encode($m);
		        }
		        else
		        {
		                $data = array(
		                	'title' => $title,
		                	'description' => $desc,
		                	'image' => $new_name
		                	);

		                $this->jaymitch->updateNews($data, $newsid);

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
						$this->jaymitch->removeNews($this->input->post('newsid'));
						$m = array(
							'stat' =>1,
							'msg' => 'Successfully deleted.'
						);
						echo json_encode($m);
		}
}
