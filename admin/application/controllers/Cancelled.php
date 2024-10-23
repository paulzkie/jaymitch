<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Cancelled extends CI_Controller {

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

		$data = $this->jaymitch->getCancelled();

		$this->load->view('header.php');
		$this->load->view('cancelled.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function getCancelled(){

		$data = $this->jaymitch->getCancelled();
		?>
		<table  id="datalist" class="table" ui-jq="footable" ui-options='{
              "paging": {
                "enabled": true
              },
              "filtering": {
                "enabled": true
              },
              "sorting": {
                "enabled": true
              }}'>
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Transaction Code</th>
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($data as $datas){ ?>
                <tr data-expanded="true">
                  <td><?php echo $datas->fname.' '.$datas->lname?></td>
                  <td><?php echo $datas->transactioncode?></td>
                  <td><?php echo $datas->total?></td>
                  <td><?php echo $datas->payment?></td>
                  <td>
                  <?php
                  if($datas->image==""){
                  echo "No image available";
                   }else{ ?>
                   <img src="<?php echo base_url()?>assets/paymentImages/<?php echo $datas->image?>" width="144" height="144" d="myImg" 
                   style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url()?>assets/paymentImages/<?php echo $datas->image?>');"></td>
                  <?php }?>
                      <td><a href="<?php echo base_url()?>index.php/view?reserveid=<?php echo $datas->reserveid?>&code=<?php echo $datas->transactioncode?>"><button class="btn-primary update" type="submit">View</button></a>
                </tr> 
                 <?php } ?>
              </tbody>
            </table>
	<?php 
	}

	public function confirm(){

		$date = date("F d, Y h:i A");
		$reserveid = $this->input->post('reserveid');
		$email = $this->input->post('email');

		$getEmail = $this->jaymitch->getEmail($email);

		$to = $email;
		$subject = 'Reservation Cancelled';
		$message = '<html><head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Reservation Cancelled</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body style="margin: 0px; padding: 0px;">';
		$message .= 'Dear '.$getEmail[0]->fname.' '.$getEmail[0]->lname.'<br>
		<p>Welcome to Jay and Mitch Catering Services.</p><br>
		<p>Your reservation has been cancelled. </p>';
		$message .= '<script type="text/javascript" async="" src="./js/ga.js"></script><script src="./js/jquery-1.10.1.min.js"></script>
		<script src="./js/ga-tracking.min.js"></script>
		</body></html>';
		$headers = 'From: Jay&Mitch-CateringServices'. "\r\n";
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		mail($to, $subject, $message, $headers);  

		$data = array(
				'status' => 'Confirmed'
			);

		$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Cancelled reservation request',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);
		
		$this->jaymitch->insertConfirm($data, $reserveid);
	}
}
