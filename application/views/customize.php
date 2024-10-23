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
$(document).on("click","#checkout", function(){
place =  $("#place").val();
rdate = $("#datepicker").val();
time = $("#time").val();
motif = $("#motif").val();
pax = $("#pax").val();
if(place==""){
	alert("Enter a place of event.");
}else if(rdate==""){
	alert("Choose a date.");
}else if(time=="Select time"){
	alert("Choose a time.");
}else if(motif=="Type of event"){
	alert("Enter a type of event.");
}else if(pax=="Select No. of guest"){
	alert("Select number of guest.");
}else if(pax=="Select No. of guest"){
	alert("Select number of guest.");
}else{
	$.ajax({
		type: "POST",
		url: base_url+"customize/insertDetails",
		data: {place: place, rdate: rdate, time: time, motif: motif, pax: pax},
		success: function(data){
			window.location.href=base_url+'summary';
		},
		beforeSend: function(){
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
               "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
        }
	});
}

});

//add menu
$(document).on("click","#add", function(){
menuid=$(this).data("menuid");
catid=$(this).data("catid");
price=$(this).data("price");
		
		$.ajax({
			type: "POST",
			url: base_url+"customize/insertorder",
			data: {menuid:menuid, catid:catid, price:price},
			success: function(data){
				if(data=="1"){
					alert("Menu added.");
					$("#orderdata").load(base_url+"customize #orderlist");
					$("#add_err").hide();	
				}else{
					alert("This menu is already exist.");
					$("#add_err").hide();
				}			
			},
			beforeSend: function(){
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
               "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
            }
		});
		pax = $("#pax").val();
totalorder = $("#totalorder").val();
var totalprice = totalorder * pax;
var n = Number(totalprice);
var value = n.toLocaleString(
  undefined, // use a string like 'en-US' to override browser locale
  { minimumFractionDigits: 2 }
 );
document.getElementById("totalprice").innerHTML= value;
});
//getpax
$(document).on("change", "#pax", function(){
pax = $("#pax").val();
totalorder = $("#totalorder").val();
var totalprice = totalorder * pax;
var n = Number(totalprice);
var value = n.toLocaleString(
  undefined, // use a string like 'en-US' to override browser locale
  { minimumFractionDigits: 2 }
 );
document.getElementById("totalprice").innerHTML= value;
});
//remove menu
$(document).on("click","#remove", function(){
		
		$.ajax({
			type: "POST",
			url: base_url+"customize/remove",
			data: {orderid: $(this).data("orderid")},
			success: function(data){
				alert("Menu removed.");
				$("#orderdata").load(base_url+"customize #orderlist");
				 $("#add_err").hide();
				 pax = $("#pax").val();
				totalorder = $("#totalorder").val();
				var totalprice = totalorder * pax;
				var n = Number(totalprice);
				var value = n.toLocaleString(
				  undefined, // use a string like 'en-US' to override browser locale
				  { minimumFractionDigits: 2 }
				 );
				document.getElementById("totalprice").innerHTML= value;
			},
			beforeSend: function(){
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
               "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
            }
		});
});

setInterval('getTot()', 0010);

function getTot(){
pax = $("#pax").val();
totalorder = $("#totalorder").val();
var totalprice = totalorder * pax;
if(pax=="Select No. if guest"){
$("#totalprice").html("0");
}else{
var n = Number(totalprice);
var value = n.toLocaleString(
  undefined, // use a string like 'en-US' to override browser locale
  { minimumFractionDigits: 2 }
 );
$("#totalprice").html(value);	
}


}
</script>
<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link href='//fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<!-- //point burst circle -->			
						</div>
<div class="contact" style="margin-top: -89px;">
<div id="add_err"></div>
	<div class="container">
		<div class="contact-info">
			<h3>Reservation</h3>
			<div class="strip-line"></div>
		</div>
		<div class="contact-map" style="margin-top: -79px;">
		<center>
				<div class="grid_3 grid_5">
				 <h3>Choose type of package:</h3>
				<ol class="breadcrumb"  style="font-size: 30px;">
				  <li><a href="<?php echo base_url();?>reservationpackages">Packages</a></li>
				  <li><a href="<?php echo base_url();?>customize">Create own package</a></li>
				</ol>
			   </div>
			   <div class="contact-info">
				<h3>RESERVATION DETAILS</h3>
				<div class="strip-line"></div>
			</div>

				<div><center>
				    <input type="text" class="form-control" id="place" name="place" placeholder="Address of event" required>
					<input type="text" class="form-control" id="datepicker" name="rdate" placeholder="Choose date" required>
					<select class="form-control" name="time" id="time">
						<option>Select time</option>
						<?php
							foreach ($getTime as $time) { ?>
						<option><?php echo $time->starttime.'-'.$time->endtime?></option>
						<?php } ?>
					</select>
					<input type="text" class="form-control" name="motif" id="motif" placeholder="Type of event" required>
					<!-- <select class="form-control" name="motif" id="motif">
						<option>Type of event</option>
						<option value="Birthday">Birthday</option>
						<option value="Wedding">Wedding</option>
						<option value="Reunion">Reunion</option>
						<option value="Debut">Debut</option>
						<option value="Other">Other</option>
					</select> -->
					<!-- <input type="text" class="form-control" name="pax" id="pax" placeholder="Number of Guest" onkeypress="return isNumberKey(event)" required> -->
					<select class="form-control" name="pax" id="pax">
						<option>Select No. of guest</option>
						<?php
						$getPaxes = $this->jaymitch->getPaxes();
						foreach ($getPaxes as $paxes) { ?>
						<option value="<?php echo $paxes->pax;?>"><?php echo $paxes->pax;?></option>
						<?php } ?>
					</select>
					<div>
					<h2>Choose Menu</h2>
										<div class="col-md-6" style="width:530px;height: 500px;overflow-x:hidden;overflow-y: auto;">
						<?php
							foreach($getCat as $cat){
						?>
											  <table class="table table-bordered" width="500">
												<thead>
												<tr><td colspan="5" align="center"><h3 style="color: black;"><?php echo $cat->category?></h3></td></tr>
													<tr>
														<th width="20%">Image</th>
														<th style="color: black;">Dishname</th>
														<th style="color: black;">Price</th>
														<th style="color: black;">Action</th>
													</tr>
												</thead>
						<?php
							$getMenu = $this->jaymitch->getMenus($cat->catid);
							foreach ($getMenu as $menu) {
						?>
												<tbody>
													<tr>
														<td align="center"><img src="<?php echo base_url();?>admin/assets/servicesImages/<?php echo $menu->image?>" width="180" height="100" 
														id="myImg" style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>admin/assets/servicesImages/<?php echo $menu->image?>');"></td>
														<td style="color: black;"><?php echo $menu->dishname?></td>
														<td style="color: black;">&#8369;<?php echo number_format($menu->price,2)?></td>
														<td style="color: black;"><button type="submit" class="btn btn-primary"
														data-menuid="<?php echo $menu->menuid?>"
														data-catid="<?php echo $menu->catid?>"
														data-price="<?php echo $menu->price?>" id="add">Add</button></td>
													</tr>
							<?php } ?>

												</tbody>
											  </table> 
						<?php	} ?>                   
								<div class="clearfix"> </div>
							</div>
						</div>
				</div>
				<div class="clearfix"></div>

										<div class="col-md-6" id="orderdata" style="width:400;margin-left: 550px;margin-top: -500px;">
											  <table class="table table-bordered" id="orderlist" width="500">
												<thead>
												<tr><td colspan="5" align="center"><h3 style="color: black;">Menu Ordered</h3></td></tr>
													<tr>
														<th style="color: black;">Dishname</th>
														<th style="color: black;">Price</th>
														<th style="color: black;">Action</th>
													</tr>
												</thead>
						<?php
						$total = 0;
							foreach ($getOrder as $order) {
							$total += $order->price;
						?>
												<tbody>
													<tr>
														<td style="color: black;"><?php echo $order->dishname?></td>
														<td style="color: black;">&#8369;<?php echo number_format($order->price,2)?></td>
														<td style="color: black;"><button class="btn-warning"
														data-orderid="<?php echo $order->orderid?>" id="remove">Remove</button></td>
													</tr>
							<?php } ?>
													<tr><th style="color: black;">Total Ordered: </th><td style="color: black;">&#8369;<?php echo number_format($total,2)?></td></tr>
													<input type="hidden" id="totalorder" value="<?php echo $total?>">
													<tr><th style="color: black;">Total Price: </th><td style="color: black;">&#8369;<b id="totalprice"></b></td></tr>
												</tbody>
											  </table>                   
								<div class="clearfix"> </div>
							</div>

				<a href="javascript:;" id="myBtn">I agree with terms and condition of Jay and Mitch Catering Services.</a><br>
				<input type="submit" value="CHECKOUT" id="checkout" disabled="">

		</div>
		<div id="largeImgPanel" onclick="this.style.display='none'">
            <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />  
        </div> 
<center>		 
<div id="myModal" class="modal" style="margin-top: 100px;">
  <!-- Modal content -->
  <div class="modal-content" style="width:900px;height:370px;">
    <span class="close">X</span>
    <br>
    <center>
	<table><b>Terms and Condition</b>
	<ol>
	<p style="width:600px;" align="justify">You should settle and make a reservation at least seven days before the event.
You must pay the deposit which is half (50%) of your total bill up until four days before the event.
Failure to pay the downpayment and reservation time on time shall render the Catering Contract null and void.
Should you cancel the event, you agree that you can only refund 50% of your payment.
For rescheduling of events, you are given up until four days before the planned schedule of event. This can be done for ONE TIME ONLY.
The bill includes the transportation allowance amounting to P1,500 and additional 10% for the service charge.
If there are any damages and lost valuables due to the negligence of you or any guest on the event, you should settle it with the management.

After you're done reserving your slot. you need to send a message or email us at jayandmitchcatering@gmail.com to get our Bank Account details. Same process of you're paying through remittance, send us a message or email us to get all the information needed.

The copy of the detailed reservation list should be kept until the day of the event. On the day of the event, you should present the temporary receipt and pay for the remaining balance to get the official receipt.</p>
	</ol>
	<tr><td>Click the checkbox if you agree.</td><input type="checkbox" id="check" onClick="EnableSubmit(this)"></tr>
	</table>
  </div>
</div>
<!-- 		<div class="contact-form">
			<div class="contact-info">
				<h3>CONTACT FORM</h3>
				<div class="strip-line"></div>
			</div>
			<form>
				<div class="contact-left">
					<input type="text" placeholder="Name" required>
					<input type="text" placeholder="E-mail" required>
					<input type="text" placeholder="Subject" required>
				</div>
				<div class="contact-right">
					<textarea placeholder="Message" required></textarea>
				</div>
				<div class="clearfix"></div>
				<input type="submit" value="SUBMIT">
			</form>
		</div> -->
	</div>
</div>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
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
</script>
<!-- //contact-page -->
<!-- footer-top -->
