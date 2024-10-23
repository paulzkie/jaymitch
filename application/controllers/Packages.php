<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

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

		$getPackages = $this->jaymitch->getPackage();
		$data = $this->jaymitch->getContact();

		$this->load->view('header.php');
		$this->load->view('packages.php');
		$this->load->view('footer.php',['userdata' => $data]);
	}

	public function showpackages(){
		$packageid = $this->input->post('packageinfoid'); ?>
		 
<center>
     <div class="gallery-grids" style="height: 800px;width: 1100px;overflow-y: auto;">
          <?php
          $getPackages = $this->jaymitch->getPackage1($packageid);
            foreach ($getPackages as $packages) { ?>
          <div class="col-md-4 gallery-grid gallery1" style="width: 1200px;">
          <h3><center><?php echo $packages->packagename?></h3><br>
           <div style="height: 400px;overflow-x: hidden;overflow-y: auto;border: solid 1px;border-radius: 7px;border-color:silver;padding: 20px;background-color:rgba(255,0,0,0.5);">
            <table id="packages" class="table table" width="700" style="color:black">
              
              <thead> 
              <tr>
                <th width="50%" style="color:black">Dishname</th>
                <th width="50%" style="color:black">Description</th>
              </tr> 
            </thead>
            <tbody>
          <?php 
          $getPackageMenus = $this->jaymitch->getPackageMenus($packages->packageinfoid); 
            foreach($getPackageMenus as $packagemenus){
          ?>
              <tr>
                <td style="color:black"><a href="javascript:;" onclick="showImage(this.src, '<?php echo base_url()?>admin/assets/servicesImages/<?php echo $packagemenus->image?>');"><?php echo $packagemenus->dishname?></a></td>
                <td width="20" height="100" style="color:black;"><div style="height: 100%;
    width: 100%;
    overflow: hidden;"><div style="height: 100%;
    width: 100%;
    overflow: auto;
    padding-right: 20px;font-size: 13px;"><?php echo $packagemenus->description?></div></div></td>
              </tr>
          <?php } ?>
              <tr><th colspan="1" style="color:black"> Price Package : </th><td style="color:black">&#8369;<?php echo number_format($packages->packageprice,2)?></td></tr>
            
            </tbody>
            </table> 
          </div>
          </div>
          <?php } ?> 
          <div class="clearfix"> </div>
    </div>       

	<?php }
}
