<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Verify extends CI_Controller {

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
	public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
	public function index()
	{
		$date = date("F d, Y h:i A");
		
		$data = array(
				'stat' => 'Active'
			);
		$this->jaymitch->verifyUser($data ,$this->input->get('userid'));

		$data = $this->jaymitch->emailLogin($this->input->get('userid'));

							$this->session->set_userdata(array(
								"userid"=>$data[0]->userid, 
								"fullname"=>$data[0]->fname.' '.$data[0]->lname,
								"email" =>$data[0]->email
								));

							$logtbl = array(
											'userid' => $this->session->userdata("userid"),
											'action' => 'Customer login',
											'logdate' => $date
											);
							$this->jaymitch->insertlogtbl($logtbl);
							// mysql_query("insert into logtbl (action,userid,logdate)values('Admin login','".$_SESSION["userid"]."','$date')");	

		echo "<script>alert('You have successfully verify your account. You may now login your account.');
		window.location.href='index.php';
		</script>";

	}
}
