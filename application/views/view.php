
<!-- //header -->
<!-- banner -->
<?php
$date=date("F d, Y");
?>
<style type="text/css">
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #4CAF50;
}
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
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}

$(document).on("click","#reserve", function(){
$("#add_err").css('display', 'none', 'important');

rdate = $(this).data("dateofevent");
time = $(this).data("time");
motif =$(this).data("motif");
pax = $(this).data("pax");
package = $(this).data("packagetype");
total = $(this).data("total");
	 $.ajax({
	 	type: "POST",
	 	url: base_url+"summary/insert",
	 	data:{ rdate: rdate, time: time, motif: motif, pax: pax, package: package, total: total},
	 	success: function(data){
	 		$("#add_err").css('display', 'inline', 'important');
	 		$("#add_err").html("<div id='popup1' class='overlay'>"+
			  "<div class='popup'><a class='close' href='#popup1'>"+
			  "x</a><div class='alert alert-success' role='alert'><strong>"+
			  "</strong>Your reservation has been sent. Pay your bill in any bank or remittance to confirm your reservation request. Thank you!"+
			  "<br><br><div class='form-group'><a href='"+base_url+"lists' class='btn btn-sm btn-info'>Back to Home</a></div></div></div>");
	 	},
	 	beforeSend: function(){
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
               "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
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
	  "<div class='popup'><a class='close' href='#popup1'>"+
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
	<div class="container" id="printing">
		<div class="contact-info">
			<h3>Billing Statement</h3>
			<div class="strip-line"></div>
		</div>
		<div class="contact-map" style="margin-top: -20px;">
		<center>
			<div id="SummaryDetails" style="margin-left: 100px;">
				<div class="col-md-6" id="viewcontent" style="width:900px;">
					<h3>Reservation Details</h3>
					  <table class="table table-bordered" width="700" id="servicestbl">
						<tr><th style="color: black;">Customer Name: </th><td style="color: black;"><?php echo $this->session->userdata["fullname"]?></td></tr>
						<?php

						$getHold = $this->jaymitch->getReserveDetails($this->input->get('reserveid'));

						if($getHold[0]->packagetype=="Customize"){

						$getMenu = $this->jaymitch->getCustomize($this->session->userdata["userid"], $this->input->get('code') );

						}else{

						$getMenu = $this->jaymitch->getMenu($getHold[0]->packagetype); 

						}
							foreach($getHold as $hold){ ?>
						<tr><th style="color: black;">Reservation Date: </th><td style="color: black;"><?php echo $date?></td></tr>
						<tr><th style="color: black;">Address: </th><td style="color: black;"><?php echo $hold->place?></td></tr>
						<tr><th style="color: black;">Date of Event: </th><td style="color: black;"><?php echo $hold->dateofevent?></td></tr>	
						<tr><th style="color: black;">Time of Event: </th><td style="color: black;"><?php echo $hold->time?></td></tr>
						<tr><th style="color: black;">Motif: </th><td style="color: black;"><?php echo $hold->motif?></td></tr>
						<tr><th style="color: black;">Number of Guest: </th><td style="color: black;"><?php echo $hold->pax?></td></tr>
						<tr><th style="color: black;">Bank/Remittance: </th><td style="color: black;"><?php
						if($hold->bank==""){
						echo "N/ A";
						}else{
						echo $hold->bank;	
						}	
						 ?></td></tr>
						<tr><th style="color: black;">Control #: </th><td style="color: black;"><?php
						if($hold->ctrlno==""){
						echo "N/ A";
						}else{
						echo $hold->ctrlno;	
						}?></td></tr>
						<tr><th style="color: black;">Date of Payment: </th><td style="color: black;"><?php
						if($hold->dateofpayment==""){
						echo "N/ A";
						}else{
						echo $hold->dateofpayment;	
						}?></td></tr>
						<tr><th style="color: black;">Amount: </th><td style="color: black;"><?php
						if($hold->payment=="" || $hold->payment==0.00){
						echo "N/ A";
						}else{
						echo "&#8369;".number_format($hold->payment,2);	
						}?></td></tr>
						<?php } ?>
					  </table>                    
					<div class="clearfix"> </div>
				</div>	

		<!--Package Details-->
				<div class="col-md-6" style="width:965px;">
					<h3>Package Details</h3>
					  <table class="table table-bordered" width="800">
					  		<?php
					  			$getPackageName = $this->jaymitch->getPackagetype($hold->packagetype);
					  		?>
					  		<thead>
						<tr><th align="center" style="color: black;">Package Type: </th><td colspan="2" align="center" style="color: black;"><?php if($hold->packagetype!="Customize"){ echo $getPackageName[0]->packagename;}else{ echo "Customize";}?></td></tr>
						
							<tr>
								<th width="50%" style="color: black;">Dishname</th>
								<th width="50%" style="color: black;">Price</th>
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
								<td style="color: black;"><?php echo $menu->dishname?></td>
								<td style="color: black;">&#8369;<?php echo number_format($menu->price,2)?></td>
							</tr>
							<?php }
							echo "<tr><td colspan='2'><center><h2 style='color:black;'>PRICE</h2></td></tr>"; 
						$reservationfee = 1500;	
						if($hold->packagetype!="Customize"){  
						$charge = $getMenu[0]->packageprice*$hold->pax*.10;					
							?>
						<tr><th colspan="1" style="color: black;"> Price Package : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice,2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Service Charge 10% : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice*$hold->pax*.10,2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Reservation Fee : </th><td style="color: black;">&#8369;<?php echo number_format("1500",2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Total Price : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice*$hold->pax+$charge+$reservationfee,2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Balance : </th><td style="color: black;">&#8369;<?php echo number_format($getMenu[0]->packageprice*$hold->pax+$charge+$reservationfee-$hold->payment,2)?></td></tr>
						<?php }else{ 
						$charge = $total*$hold->pax*.10;	
							?>
						<tr><th colspan="1" style="color: black;"> Price Package : </th><td style="color: black;">&#8369;<?php echo number_format($total,2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Service Charge 10% : </th><td style="color: black;">&#8369;<?php echo number_format($total*$hold->pax*.10,2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Reservation Fee : </th><td style="color: black;">&#8369;<?php echo number_format("1500",2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Total Price : </th><td style="color: black;">&#8369;<?php echo number_format($total*$hold->pax+$charge+$reservationfee,2)?></td></tr>
						<tr><th colspan="1" style="color: black;"> Balance : </th><td style="color: black;">&#8369;<?php echo number_format($total*$hold->pax+$charge+$reservationfee-$hold->payment,2)?></td></tr>
						<?php	}	
							?>
						</tbody>
					  </table>       
				<div class="clearfix"> </div>
				
				<?php include "reschedule.php";?>
			</div>			
		</div>
		</div>
	</div>
	<center>
	<table>
	<tr><td><button class="btn btn-info" id="print"  onclick="printContent('printing')">Print</button>
	<?php
	if($getHold[0]->reschedstat==1){ ?>
	<button class="btn btn-default" disabled="">Reschedule</button></td></tr>
	<?php }else{ ?>
	<button class="btn btn-default" id="myBtn" data-reserveid="<?php echo $this->input->get('reserveid')?>">Reschedule</button></td></tr>
	<?php } ?>
	</table>
	
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
<script type="text/javascript">
$.getJSON('checkdates', 
function(index, json){
	dates=index;
	});
 function editDays(date) {
	 
	var disabledDates = dates; 
        for (var i = 0; i < disabledDates.length; i++) {
			if(disabledDates[i]){
            if (new Date(disabledDates[i]).toString() == date.toString()) {  
                 return [false];
				 
            }
			}
        }
        return [true];
 }

$(function(){
    $('#datepicker').datepicker({minDate: 7,dateFormat: 'MM dd, yy', beforeShowDay: editDays
    });
});
// Get the modal

var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!-- //contact-page -->
<!-- footer-top -->
