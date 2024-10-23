<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Validate extends CI_Controller {

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
    }
	public function index(){

		$date = date("F d, Y h:i A");
		$struser = stripslashes($this->input->post('username'));
		$username = $struser;
		$strpass =  stripslashes($this->input->post('password'));
		$password = $strpass;

		$data = $this->jaymitch->adminlogin($username);

		if(!empty($data)){
				if($data[0]->username==$username && $data[0]->password==$password ||$data[0]->email==$username && $data[0]->password==$password){
					if($data[0]->stat == "Inactive"){
						 echo "status";
					}else{
							$this->session->set_userdata(array(
								"userid"=>$data[0]->userid, 
								"username"=>$data[0]->fname.' '.$data[0]->lname,
								"position"=>$data[0]->position
								));
							echo "admin";

							$logtbl = array(
											'userid' => $this->session->userdata("userid"),
											'action' => 'Admin login',
											'logdate' => $date
											);
							$this->jaymitch->insertlogtbl($logtbl);
							// mysql_query("insert into logtbl (action,userid,logdate)values('Admin login','".$_SESSION["userid"]."','$date')");
					}
				}else{
					 echo "false";
				}	
			}else{
				echo "none";
			}
		}

		public function logout(){
			$date = date("F d, Y h:i A");
			$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Admin logout',
							'logdate' => $date
						);
			$this->jaymitch->insertlogtbl($logtbl);
			$array_items = array('userid' => '', 'username' => '','position'=>'');
			$this->session->unset_userdata($array_items);
			$this->session->sess_destroy();
			redirect('../', 'refresh');
		}
	}
