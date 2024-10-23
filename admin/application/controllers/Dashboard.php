<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

		$this->load->view('header.php');
		$this->load->view('dashboard.php');
		$this->load->view('footer.php');
	}

	public function countNotifications(){
		$getPendingNotif = $this->jaymitch->getPendingNotif();
		$getCancelledNotif = $this->jaymitch->getCancelledNotif();
		$getReschedNotif = $this->jaymitch->getReschedNotif();

		$totalnotif = $getPendingNotif[0]->countPending + $getCancelledNotif[0]->countCancel + $getReschedNotif[0]->countResched;

		$m = array(
				'countnotif' => $totalnotif
			);

		echo json_encode($m);

	}

	public function countPending(){

		$getPendingNotif = $this->jaymitch->getPendingNotif();

		$m = array(
				'countnotif' => $getPendingNotif[0]->countPending,
				'msg' => $getPendingNotif[0]->countPending.' pending request.'
			);

		echo json_encode($m);
	}

	public function countCancelled(){

		$getCancelledNotif = $this->jaymitch->getCancelledNotif();

		$m = array(
				'countnotif' => $getCancelledNotif[0]->countCancel,
				'msg' => $getCancelledNotif[0]->countCancel.' has been cancelled .'
			);

		echo json_encode($m);
	}

	public function countResched(){

		$getReschedNotif = $this->jaymitch->getReschedNotif();

		$m = array(
				'countnotif' => $getReschedNotif[0]->countResched,
				'msg' => $getReschedNotif[0]->countResched.' reschedule request .'
			);

		echo json_encode($m);
	}

}
