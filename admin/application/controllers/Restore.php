<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restore extends CI_Controller {

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

	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->helper(array('form', 'url'));
    }

	public function index(){

		$this->load->view('restore.php');
	}

	public function do_upload(){

	    // $config['upload_path']          = './assets/db_backup/';
     //    $config['allowed_types']        = '*';
  //       // $config['encrypt_name'] = TRUE;
  //       $new_name = time().$_FILES["zip_file"]['name'];
		// $config['file_name'] = $new_name;

		// $this->load->helper('file');
        // echo json_encode($_POST);

        // $this->load->library('upload', $config);

	    //     foreach ($_FILES as $key => $value) {
			 	// // $this->upload->do_upload($key);
		   //      if ( ! $this->upload->do_upload($key))
		   //      {
		   //              $params = array('error' => $this->upload->display_errors());
					// 	echo json_encode($params);
		   //      }
		   //      else
		   //      {

					// 	$m = array(
					// 		'stat' =>1,
					// 		'msg' => 'Successfully added.'
					// 	);
					// 	echo json_encode($m);
		   //      }
	    // 	}


		  // $isi_file = file_get_contents('assets/db_backup/jaymitchdb.sql');
		  // $string_query = rtrim( $isi_file, "\n;"  );
		  // $array_query = explode(";", $string_query);
		  // foreach($array_query as $query)
		  // {
		  //   $this->db->query($query);
		  // }
      //   $config['upload_path'] = './assets/db_backup/';
      //   $config['allowed_types'] = '*';
      //   $config['max_size']    = '';
      //   $this->load->library('upload', $config);
      //   if ( ! $this->upload->do_upload('zip_file'))
      //   {
      //       $error = array('error' => $this->upload->display_errors());
   			// echo json_encode($error);
      //   }
      //   else
      //   {
            // $data = array('upload_data' => $this->upload->data());
            $zip = new ZipArchive;
            $file = base_url().'assets/db_backup/jaymitchdb.zip';
            if ($zip->open('./assets/db_backup/jaymitchdb.zip') === TRUE) {
                    $zip->extractTo('./assets/db_backup/');
                    $zip->close();
                    echo 'ok';
            } else {
                    echo 'failed';
            }
        // }
 
	}
}


