<?php
public function index(){ ?>
<center>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
     <div class="gallery-grids" style="height: 800px;width: 1200px;overflow-y: auto;">
          <?php
          $packageinfoid = $this->input->post('packageinfoid');
          $getPackages = $this->jaymitch->getPackage();

            foreach ($getPackages as $packages) { ?>
          <div class="col-md-4 gallery-grid gallery1" style="width: 1200px;">
          <h3><center><?php echo $packages->packagename?></h3><br>
              <?php echo $packages->Descript?>
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
                <td style="color:black"><?php echo $packagemenus->dishname?></td>
                <td width="20" height="100" style="color:black;"><div style="height: 100%;
    width: 100%;
    overflow: hidden;"><div style="height: 100%;
    width: 100%;
    overflow: auto;
    padding-right: 20px;font-size: 18px;"><?php echo $packagemenus->description?></div></div></td>
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
      </div>    
    </div>
  </div>
</div>
<?php }
?>
