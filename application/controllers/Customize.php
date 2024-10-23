<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customize extends CI_Controller {

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
	public function index()
	{
		$data = $this->jaymitch->getContact();

		$getCat = $this->jaymitch->getCat();

		// $getMenu = $this->jaymitch->getMenus();

		$getOrder = $this->jaymitch->getOrder($this->session->userdata["userid"]);
		$getTime = $this->jaymitch->getTime();

		$this->load->view('header.php');
		$this->load->view('customize.php',['getCat'=>$getCat, 'getOrder'=> $getOrder,'getTime'=>$getTime]);
		$this->load->view('footer.php',['userdata' => $data]);
	}

	public function insertorder(){

		$menuid = $this->input->post('menuid');
		$catid = $this->input->post('catid');
		$price = $this->input->post('price');

		if($this->jaymitch->getOrderid($menuid)){
			echo "0";
		}else{
			echo "1";
		$data = array(
				'userid' => $this->session->userdata["userid"],
				'menuid' => $menuid,
				'catid' => $catid,
				'price' => $price
			);
		$this->jaymitch->insertOrder($data);
		}
	}

	public function insertDetails(){

		$place =  $this->input->post('place');
		$rdate = $this->input->post('rdate');
		$time = $this->input->post('time');
		$motif = $this->input->post('motif');
		$pax = $this->input->post('pax');

		$data = array(
				'userid' => $this->session->userdata["userid"],
				'place' => $place,
				'dateofevent' => $rdate,
				'time' => $time,
				'motif' => $motif,
				'pax' => $pax,
				'packagetype' => 'Customize'
			);

		$this->jaymitch->insertHold($data);

		$getHoldid = $this->jaymitch->getHoldid();

		$this->session->set_userdata(array(
								"holdid"=>$getHoldid[0]->maxid
								));
		$holdid = array(
				'holdid' => $this->session->userdata["holdid"]
			);

		$this->jaymitch->updateOrder($holdid, $this->session->userdata["userid"]);
	}

	public function remove(){
		$this->jaymitch->removeOrder($this->input->post('orderid'));
	}
}
