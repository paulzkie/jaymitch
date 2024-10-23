<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

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
        $this->load->library('zip');
    }

	public function index(){

		$this->load->view('backup.php');

		// $this->load->dbutil();
		// $db_format=array('filename'=>'jaymitchdb.sql');
		// $backup=& $this->dbutil->backup($db_format);
		// $dbname='jaymitchdb.zip';
		// $save='assets/db_backup/'.$dbname;
		// write_file($save,$backup);
		// force_download($dbname,$backup);
		$this->load->dbutil();

		// Backup database dan dijadikan variable
		$backup = $this->dbutil->backup();

		// Load file helper dan menulis ke server untuk keperluan restore
		$this->load->helper('file');
		write_file('assets/db_backup/jaymitchdb.zip', $backup);

		// Load the download helper dan melalukan download ke komputer
		$this->load->helper('download');
		force_download('jaymitchdb.zip', $backup);

		$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Back up database',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);
	}
}


