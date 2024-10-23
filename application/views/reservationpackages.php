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
<?php
if($this->input->get('packageinfoid')) { ?>
<script type="text/javascript">
//Show packages
// $(document).on("change","#packages", function(){
// 	packageinfoid = $("#packages").val();
// 	var xmlhttp1 = new XMLHttpRequest();
// 	xmlhttp1.onreadystatechange = function (){
// 		if(xmlhttp1.readyState==4 && xmlhttp1.status==200){
// 			document.getElementById('modalpackages').innerHTML = xmlhttp1.responseText;
// 		}
// 	};

// });	
setInterval(showpack(), 10000);

function showpack(){
var xmlhttp1 = new XMLHttpRequest();
	xmlhttp1.onreadystatechange = function (){
		if(xmlhttp1.readyState==4 && xmlhttp1.status==200){
			document.getElementById('modalpackages').innerHTML = xmlhttp1.responseText;
		}
	};
	xmlhttp1.open("GET","tablepackage?packageinfoid="+<?php echo $this->input->get('packageinfoid')?>, true);
	xmlhttp1.send();	
}
//checkout
$(document).on("click","#checkout", function(){
place = $("#place").val();
rdate = $("#datepicker").val();
time = $("#time").val();
motif = $("#motif").val();
pax = $("#pax").val();
package = "<?php echo $this->input->get('packageinfoid')?>";
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
}else{
	$.ajax({
		type: "POST",
		url: base_url+"reservationpackages/insertDetails",
		data: {place: place, rdate: rdate, time: time, motif: motif, pax: pax, package: package},
		success: function(data){
			window.location.href=base_url+'summary';
		}
	});
}

});

</script>
<?php }else{ ?>
<script type="text/javascript">
// setInterval(showpack(), 99999);

// function showpack(){
// var xmlhttp1 = new XMLHttpRequest();
// 	xmlhttp1.onreadystatechange = function (){
// 		if(xmlhttp1.readyState==4 && xmlhttp1.status==200){
// 			document.getElementById('modalpackages').innerHTML = xmlhttp1.responseText;
// 		}
// 	};
// 	xmlhttp1.open("GET","tablepackage?packageinfoid="+<?php echo $this->input->get('packageinfoid')?>, true);
// 	xmlhttp1.send();	
// }

//checkout
$(document).on("click","#checkout", function(){
place = $("#place").val();
rdate = $("#datepicker").val();
time = $("#time").val();
motif = $("#motif").val();
pax = $("#pax").val();
package = $("#packages").val();	

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
}else if(package=="Select Package"){
	alert("Choose package first.");
}else{
	$.ajax({
		type: "POST",
		url: base_url+"reservationpackages/insertDetails",
		data: {place: place, rdate: rdate, time: time, motif: motif, pax: pax, package: package},
		success: function(data){
			window.location.href=base_url+'summary';
		}
	});
}
});

//Show packages
$(document).on("change","#packages", function(){
	packageinfoid = $("#packages").val();
	var xmlhttp1 = new XMLHttpRequest();
	xmlhttp1.onreadystatechange = function (){
		if(xmlhttp1.readyState==4 && xmlhttp1.status==200){
			document.getElementById('modalpackages').innerHTML = xmlhttp1.responseText;
		}
	};
	xmlhttp1.open("GET","tablepackage?packageinfoid="+packageinfoid, true);
	xmlhttp1.send();
});	
</script>
<?php } ?>
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
	<div class="container">
		<div class="contact-info">
			<h3>Reservation</h3>
			<div class="strip-line"></div>
		</div>
		<div class="contact-map" style="margin-top: -89px;">
		<center>
				<div class="grid_3 grid_5">
				 <h3>Choose type of package:</h3>
				<ol class="breadcrumb"  style="font-size: 30px;">
				  <li><a href="<?php echo base_url();?>reservationpackages">Packages</a></li>
				  <li><a href="<?php echo base_url();?>customize">Create own package</a></li>
				</ol>
			   </div>
			   <div class="contact-info" style="margin-top: -79px;">
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
					<?php
					if($this->input->get('packageinfoid')!=""){ ?>
					<input type="text" class="form-control" id="place" name="place" placeholder="Click the packages to choose other packages." disabled="">
					<?php }else if($this->input->get('packageinfoid')==""){ ?>
					<select class="form-control" name="package" id="packages">
						<option>Select Package</option>
						<?php
							foreach ($getPackages as $package) { ?>
						<option value="<?php echo $package->packageinfoid?>"><?php echo $package->packagename?></option>
						<?php	} ?>
					</select>
					<?php }
					?>
					</center>
					<div id="modalpackages" style="margin-left: 90px;"></div>		
				</div>
				<div class="clearfix"></div>
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
