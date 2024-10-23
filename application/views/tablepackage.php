<div>
<?php
$packageinfoid = $this->input->get('packageinfoid');
$getMenu = $this->jaymitch->getMenu($packageinfoid); 
?>
			 <h2><?php echo $getMenu[0]->packagename?></h2>
				<div class="col-md-6" style="width:900px;">
					<p><?php echo $getMenu[0]->Descript?></p>
					  <table class="table table-bordered" width="700">
						<thead>
							<tr>
								<th width="50%" style="color: black;">Image</th>
								<th width="50%" style="color: black;">Dishname</th>
								<th width="50%" style="color: black;">Description</th>
								<th width="50%" style="color: black;">Price</th>
							</tr>
						</thead>
<?php
foreach ($getMenu as $menu) { ?>
						<tbody>
							<tr>
								<td align="center"><img src="<?php echo base_url();?>admin/assets/servicesImages/<?php echo $menu->image?>" width="180" height="100" 
								id="myImg" style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>admin/assets/servicesImages/<?php echo $menu->image?>');"></td>
								<td style="color: black;"><?php echo $menu->dishname?></td>
								<td style="color: black;"><div style="height: 100px;
    width: 150px;
    overflow-x: hidden;overflow-y: auto;"><div style="height: 100;
    width: 150px;
    overflow-y: auto;overflow-x: hidden;
    padding-right: 20px;"><?php echo $menu->description?></div></div></td>
								<td style="color: black;">&#8369;<?php echo number_format($menu->price,2)?></td>
							</tr>
<?php } ?>
						<tr><th colspan="3" style="color: black;"> Package Price: </th><td style="color: black;"> &#8369;<?php echo number_format($getMenu[0]->packageprice,2)?></td></tr>
						</tbody>
					  </table>                    
		<div class="clearfix"> </div>
	</div>
</div>
