
<!-- //header -->
<!-- banner -->
<?php
$date=date("F d, Y");
?>
<style type="text/css">
.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close2 {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 0.2s;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close2:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

/*Let's make it appear when the page loads*/
.overlay:target:before {
    display: none;
}
.overlay:before {
  content:"";
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: block;
  background: rgba(0, 0, 0, 0.6);
  position: fixed;
  z-index: 9;
}
.overlay .popup {
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: fixed;
  top: 0;
  left: 35%;
  padding: 25px;
  margin: 70px auto;
  z-index: 10;
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  transition: all 0.6s ease-in-out;
}
.overlay:target .popup {
    top: -100%;
    left: -100%;
}

@media screen and (max-width: 768px){
  .box{
    width: 70%;
  }
  .overlay .popup{
    width: 70%;
    left: 15%;
  }
} 	
</style>
<script type="text/javascript">
$(document).on("click","#reserve", function(){
$("#add_err").css('display', 'none', 'important');
place = $(this).data("place");
rdate = $(this).data("dateofevent");
time = $(this).data("time");
motif =$(this).data("motif");
pax = $(this).data("pax");
package = $(this).data("packagetype");
total = $(this).data("total");
	 $.ajax({
	 	type: "POST",
	 	url: base_url+"summary/insert",
	 	data:{ place: place, rdate: rdate, time: time, motif: motif, pax: pax, package: package, total: total},
	 	success: function(data){
	 		$("#add_err").css('display', 'inline', 'important');
	 		$("#add_err").html("<div id='popup1' class='overlay'>"+
			  "<div class='popup'><a class='close' id='xclose'>"+
			  "x</a><div class='alert alert-success' role='alert'><strong>"+
			  "</strong>Your reservation has been sent. Pay your bill in any bank or remittance to confirm your reservation request. Thank you!"+
			  "<br><br><div class='form-group'><a href='"+base_url+"lists' class='btn btn-sm btn-info'>Back to Home</a></div></div></div>");
	 	},
	 	beforeSend: function(){
	 		var progress = setInterval(move, 1000);
			$("#add_err").css('display', 'inline', 'important');
			$("#add_err").html("<div id='popup1' class='overlay'>"+
			 "<div class='popup'><a class='close' id='xclose'>"+
			 "x</a><div id='myProgress'><div id='myBar'></div></div></div>");
	 	}
	 });
 });	

function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
  	 width++; 
      elem.style.width = width + '%'; 
    if (width >= 100) {
      clearInterval(id);
      $("#add_err").html("<div id='popup1' class='overlay'>"+
	  "<div class='popup'><a class='close' id='xclose'>"+
	  "x</a><div class='alert alert-success' role='alert'><strong>"+
	  "</strong>Your reservation has been sent. Pay your bill in any bank or remittance to confirm your reservation request. Thank you!"+
	  "<br><br><div class='form-group'><a href='"+base_url+"lists' class='btn btn-sm btn-info'>Back to Home</a></div></div></div>");

    } 
  }
}
</script>
<div id="add_err"></div>
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<!-- //point burst circle -->			
						</div>
<div class="contact" style="margin-top: -89px;">
	<div class="container">
		<div class="contact-info">
			<h3>Summary Details</h3>
			<div class="strip-line"></div>
		</div>
		<div class="contact-map" style="margin-top: -20px;">
		<center>
			<div id="SummaryDetails" style="margin-left: 100px;">
				<div class="col-md-6" style="width:900px;">
					<h3>Reservation Details</h3>
					  <table class="table table-bordered" width="700">
						<tr><th>Customer Name: </th><td><?php echo $this->session->userdata["fullname"]?></td></tr>
						<?php
							foreach($getHold as $hold){ ?>
						<tr><th>Reservation Date: </th><td><?php echo $date?></td></tr>
						<tr><th>Address: </th><td><?php echo $hold->place?></td></tr>
						<tr><th>Date of Event: </th><td><?php echo $hold->dateofevent?></td></tr>	
						<tr><th>Time of Event: </th><td><?php echo $hold->time?></td></tr>
						<tr><th>Motif: </th><td><?php echo $hold->motif?></td></tr>
						<tr><th>Number of Guest: </th><td><?php echo $hold->pax?></td></tr>
						<?php } ?>
					  </table>                    
					<div class="clearfix"> </div>
				</div>	

		<!--Package Details-->
				<div class="col-md-6" style="width:900px;">
					<h3>Package Details</h3>
					  <table class="table table-bordered" width="700">
					  		<?php
					  			$getPackageName = $this->jaymitch->getPackagetype($hold->packagetype);
					  		?>
					  		<thead>
						<tr><th align="center">Package Type: </th><td colspan="3" align="center"><?php if($hold->packagetype!="Customize"){ echo $getPackageName[0]->packagename;}else{ echo "Customize";}?></td></tr>
						
							<tr>
								<th width="50%">Image</th>
								<th width="50%">Dishname</th>
								<th width="50%">Price</th>
							</tr>
						</thead>
							<?php
							$total=0;
							foreach ($getMenu as $menu) { 
							if($hold->packagetype!="Customize"){
							}else{
							$total += $menu->price;	
							}
								?>							
						<tbody>
							<tr>
								<td align="center"><img src="<?php echo base_url();?>admin/assets/servicesImages/<?php echo $menu->image?>" width="180" height="100" 
								id="myImg" style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>admin/assets/servicesImages/<?php echo $menu->image?>');"></td>
								<td><?php echo $menu->dishname?></td>
								<td>&#8369;<?php echo number_format($menu->price,2)?></td>
							</tr>
							<?php }
							echo "<tr><td colspan='3'><center><h2 style='color:black;'>PRICE</h2></td></tr>";  
						$reservationfee = 1500;	
						if($hold->packagetype!="Customize"){
						$charge = $getMenu[0]->packageprice*$hold->pax*.10;
						  ?>
						<tr><th colspan="2"> Price Package : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice,2)?></td></tr>
						<tr><th colspan="2"> Service Charge 10% : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice*$hold->pax*.10,2)?></td></tr>
						<tr><th colspan="2"> Reservation Fee : </th><td style="color: black;">&#8369;<?php echo number_format("1500",2)?></td></tr>
						<tr><th colspan="2"> Total Price : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice*$hold->pax+$charge+$reservationfee,2)?></td></tr>

						<tr><th colspan="2"> Downpayment : </th><td style="color: black;">&#8369;<?php echo number_format(($getMenu[0]->packageprice*$hold->pax+$charge+$reservationfee)*.50,2)?></td></tr>
						<?php }else{ 
						$charge = $total*$hold->pax*.10;	
							?>
						<tr><th colspan="2"> Price Package : </th><td style="color: black;">&#8369;<?php echo number_format($total,2)?></td></tr>
						<tr><th colspan="2"> Service Charge 10%  : </th><td style="color: black;">&#8369;<?php echo number_format($total*$hold->pax*.10,2)?></td></tr>
						<tr><th colspan="2"> Reservation Fee 10%  : </th><td style="color: black;">&#8369;<?php echo number_format("1500",2)?></td></tr>
						<tr><th colspan="2"> Total Price : </th><td style="color: black;">&#8369;<?php echo number_format($total*$hold->pax+$charge+$reservationfee,2)?></td></tr>		
						<tr><th colspan="2"> Downpayment : </th><td style="color: black;">&#8369;<?php echo number_format(($total*$hold->pax+$charge+$reservationfee)*0.50,2)?></td></tr>
						<?php	}	
							?>
						</tbody>
					  </table>       
				<div class="clearfix"> </div>
				
				<button style="margin-left: 400px;background-color: green;" class="btn btn-success" id="reserve"
				data-place="<?php echo $hold->place?>"
				data-dateofevent="<?php echo $hold->dateofevent?>"
				data-time="<?php echo $hold->time?>"
				data-motif="<?php echo $hold->motif?>"
				data-pax="<?php echo $hold->pax?>"
				<?php 
				if($hold->packagetype!="Customize"){ ?>
				data-packagetype="<?php echo $hold->packagetype?>"
				data-total="<?php echo $getMenu[0]->packageprice*$hold->pax+$charge+$reservationfee?>">Reserve Now</button>
				<?php }else{ ?>
				data-packagetype="<?php echo $hold->packagetype?>"
				data-total="<?php echo $total*$hold->pax+$charge+$reservationfee?>">Reserve Now</button>
				<?php } ?>
				
			</div>			
		</div>
		</div>
	</div>
</div>
<div id="largeImgPanel" onclick="this.style.display='none'">
            <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />  
        </div>  
<script type="text/javascript">
            function showImage(smSrc, lgSrc) {
                document.getElementById('largeImg').src = smSrc;
                showLargeImagePanel();
                unselectAll();
                setTimeout(function() {
                    document.getElementById('largeImg').src = lgSrc;
                }, 1)
            }
            function showLargeImagePanel() {
                document.getElementById('largeImgPanel').style.display = 'block';
            }
            function unselectAll() {
                if(document.selection)
                    document.selection.empty();
                if(window.getSelection)
                    window.getSelection().removeAllRanges();
            }
        </script>
<style type="text/css">
#largeImgPanel {
                text-align: center;
                display: none;
                position: fixed;
                margin-top: 40px;
                z-index: 100;
                top: 0; left: 0; width: 100%; height: 100%;
            }
</style>

<!-- //contact-page -->
<!-- footer-top -->
