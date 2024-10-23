<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Cancelledreport extends CI_Controller {

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

		$data = $this->jaymitch->getPending();

		$this->load->view('header.php');
		$this->load->view('cancelledreport.php',['userdata'=>$data]);
		$this->load->view('footer.php');
	}

	public function searchCancelled(){

		$from = $this->input->post('from');
		$to = $this->input->post('to');

		$data = $this->jaymitch->searchCancelled($from, $to);
 ?>
		<table  id="datalist" class="table" ui-jq="footable" ui-options='{
              "paging": {
                "enabled": tru
              },
              "filtering": {
                "enabled": true
              },
              "sorting": {
                "enabled": true
              }}'>
              <thead>
                <tr>
                  <th style="color:black;">Customer Name</th>
                  <th style="color:black;">Transaction Code</th>
                  <th style="color:black;">Total</th>
                  <th style="color:black;">Payment</th>
                  <th style="color:black;">Image</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($data as $datas){ ?>
                <tr data-expanded="true">
                  <td style="color:black;"><?php echo $datas->fname.' '.$datas->lname?></td>
                  <td style="color:black;"><?php echo $datas->transactioncode?></td>
                  <td style="color:black;"><?php echo $datas->total?></td>
                  <td style="color:black;"><?php echo $datas->payment?></td>
                  <td style="color:black;">
                  <?php
                  if($datas->image==""){
                  echo "No image available";
                   }else{ ?>
                   <img src="<?php echo base_url()?>assets/paymentImages/<?php echo $datas->image?>" width="144" height="144" d="myImg" 
                   style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url()?>assets/paymentImages/<?php echo $datas->image?>');"></td>
                  <?php } ?>
                </tr> 
                 <?php } ?>
              </tbody>
            </table>

	<?php }
}
