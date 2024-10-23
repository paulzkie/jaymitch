<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Createpackage extends CI_Controller {

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

		$data = $this->jaymitch->getMenu();
		$getCategory = $this->jaymitch->getCategory();
		$getTemp = $this->jaymitch->getTemp();

		$this->load->view('header.php');
		$this->load->view('createpackage.php',['getMenu'=>$data,'getCategory'=>$getCategory, 'getTemp'=>$getTemp]);
		$this->load->view('footer.php');
	}

	public function searchcategory(){

		$catid = $this->input->post('catid');

		$getCat = $this->jaymitch->getCat($catid); ?>

		<div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Dishname</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th style="width:30px;">Action</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($getCat as $menu){ ?>
          <tr data-expanded="true">
            <td><?php echo $menu->dishname?></td>
            <td><?php echo $menu->description?></td>
            <td>&#8369;<?php echo number_format($menu->price,2)?></td>
            <td><?php echo $menu->category?></td>
            <td><img src="<?php echo base_url();?>assets/servicesImages/<?php echo $menu->image?>" width="144" height="144" id="myImg" 
            style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>assets/servicesImages/<?php echo $menu->image?>');"
            alt="<?php echo $menu->dishname;?>"></td>
                <td><button class="btn-primary" type="submit"
                data-menuid="<?php echo $menu->menuid?>"
                data-dishname="<?php echo $menu->dishname?>"
                data-desc="<?php echo $menu->description?>"
                data-price="<?php echo $menu->price?>" id="add">Add</button>
                </td>
          </tr>
           <?php } ?>
        </tbody>
      </table>
    </div>


	<?php }

	public function insert(){

		$date = date("F d, Y h:i A");
		$menuid = $this->input->post('menuid');

		if($this->jaymitch->getTempMenuid($menuid)){
			$m = array(
					'stat' =>0,
					'msg' => 'This menu is already in the package.'
				);
			echo json_encode($m);
		}else{
				$m = array(
					'stat' =>1,
					'msg' => 'Successfully added.'
				);
			$data = array(
					'menuid' => $menuid
				);
			$this->jaymitch->insertTemp($data);
			echo json_encode($m);	
		}
	}

	public function insertPackage(){

		$date = date("F d, Y h:i A");
		$packagename = $this->input->post('packagename');
		$desc = $this->input->post('desc');
		$packageprice = $this->input->post('packageprice');

		if(empty($packagename)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a packagename.'
				);
			echo json_encode($m);
		}else if(empty($desc)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a description.'
				);
			echo json_encode($m);
		}else if(empty($packageprice)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a price.'
				);
			echo json_encode($m);
		}else{

				$data = array(
					'packagename' => $packagename,
					'Descript' => $desc,
					'packageprice' => $packageprice
					);

				$this->jaymitch->insertPackageInfo($data);

				$getMenuID = $this->jaymitch->getTempMenu();

				$getPackageInfoID = $this->jaymitch->getPackageInfoID();

				foreach ($getMenuID as $id) 

				foreach ($getPackageInfoID as $package) {
					$datapackage = array(
							'packageinfoid' => $package->maxid,
							'menuid' => $id->menuid 
						);
					$this->jaymitch->insertPackage($datapackage);
				}
				$m = array(
					'stat' =>1,
					'msg' => 'Successfully created.'
				);
				echo json_encode($m);

				$logtbl = array(
							'userid' => $this->session->userdata("userid"),
							'action' => 'Created packages.',
							'logdate' => $date
						);
		$this->jaymitch->insertlogtbl($logtbl);	
		}
	}

	public function remove(){
		$this->jaymitch->deleteTempMenu($this->input->post('tempid'));
		$m = array(
					'stat' =>1,
					'msg' => 'Successfully removed.'
				);
			echo json_encode($m);
	}

	public function update(){

		$catid = $this->input->post('catid');
		$category = $this->input->post('category');

		if(empty($category)){
			$m = array(
					'stat' =>0,
					'msg' => 'Enter a category.'
				);
			echo json_encode($m);
		}else{
			$data = array(
					'category' => $category
				);
			$this->jaymitch->updateCategory($data, $catid);
			$m = array(
					'stat' =>1,
					'msg' => 'Successfully updated.'
				);
			echo json_encode($m);
		}
	}
}
