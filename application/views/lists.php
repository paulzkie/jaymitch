
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
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link href='//fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
$(document).on("click","#paymentBtn", function(){
$("#add_err").css('display', 'none', 'important');
$("#reserveids").val($(this).data("reserveids"));
$("#transcode").val($(this).data("transcode"));
$("#myBtn").click();
 });	

//Cancel of reservation
$(document).on("click","#cancel", function(){
if(confirm("Are you sure you want to cancel this?")==true){

        $.ajax({
            type: "POST",
            url: base_url+"lists/cancel",
            data: {reserveid: $(this).data("reserveid")},
            success: function(data){
              $("#add_err").html("<div id='popup1' class='overlay'>"+
              "<div class='popup'><a class='close' href='#popup1' id='returnlists'>"+
              "x</a><div class='alert alert-success' role='alert'><strong>"+
              "</strong>Your reservation has been cancelled!"+
              "<br><br><div class='form-group'><a href='javascript:;' id='returnlists' class='btn btn-sm btn-info'>Back to Home</a></div></div></div>");
            },
            beforeSend: function(){
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
               "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
            }
        });

}else{

}
});

$(document).on("click","#returnlists", function(e){
     e.preventDefault();
     $("#datacontainer").load(base_url+"lists #datalist");
     $("#add_err").hide();
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
    } 
  }
}
</script>
<div id="add_err"></div>
						<div class="container">
							<?php include "nav.php";
							include "payment.php";?>
							<!-- point burst circle -->
							<!-- //point burst circle -->			
						</div>
<div class="contact" style="margin-top: -89px;">
	<div class="container">
		<div class="contact-info">
			<h3>Reservation History</h3>
			<div class="strip-line"></div>
		</div>
		<div class="contact-map" style="margin-top: -20px;">
		<center>
			<div id="SummaryDetails" style="margin-left: 100px;">
				<div class="col-md-6" id="datacontainer" style="width:900px;">
					  <table class="table table-bordered" id="datalist" width="700">
					  	<thead>
						  	<tr>
						  	<th style="color: black;"><center>Trans-Code</th>
						    <th style="color: black;"><center>Downpayment</th>
								<th style="color: black;"><center>total</th>
								<th style="color: black;"><center>Status</th>
								<th style="color: black;"><center>Action</th>
						  	</tr>
					  	</thead>
					  	<tbody>
					  		<?php
					  			foreach($getReserve as $reserve){ ?>
					  		<tr>
						  		<td align="center" style="color: black;"><?php echo $reserve->transactioncode?></td>
						  		<td align="center" style="color: black;">&#8369;<?php echo number_format($reserve->total*0.50,2)?></td>
						  		<td align="center" style="color: black;">&#8369;<?php echo number_format($reserve->total,2)?></td>
						  		<td align="center" style="color: black;"><?php echo $reserve->status?></td>
						  		<td align="center">
                  <?php
                  if($reserve->status=="Cancelled" && $reserve->payment==0.00){  ?>
                    <a href="<?php echo base_url()?>view?reserveid=<?php echo $reserve->reserveid?>&code=<?php echo $reserve->transactioncode?>" ><button style="background-color: cyan;color: black;">View</button></a>
                   <?php }else if($reserve->status=="Cancelled"){  ?>
                    <a href="<?php echo base_url()?>view?reserveid=<?php echo $reserve->reserveid?>&code=<?php echo $reserve->transactioncode?>" ><button style="background-color: cyan;color: black;">View</button></a>
                   <?php }else if($reserve->status=="Confirmed"){  ?>
                    <a href="<?php echo base_url()?>view?reserveid=<?php echo $reserve->reserveid?>&code=<?php echo $reserve->transactioncode?>" ><button style="background-color: cyan;color: black;">View</button></a>
                      <button style="background-color: orange;color: black;" id="cancel"
                      data-reserveid="<?php echo $reserve->reserveid?>">Cancel</button>
                   <?php }else{ ?>
                    <button style="background-color: lightblue;color: black;" id="paymentBtn" 
                    data-reserveids="<?php echo $reserve->reserveid?>"
                    data-transcode="<?php echo $reserve->transactioncode?>">Payment</button>
                    <a href="<?php echo base_url()?>view?reserveid=<?php echo $reserve->reserveid?>&code=<?php echo $reserve->transactioncode?>" ><button style="background-color: cyan;color: black;">View</button></a>
                    <button style="background-color: orange;color: black;" id="cancel"
                    data-reserveid="<?php echo $reserve->reserveid?>">Cancel</button>
                  <?php }
                  ?>
						  			
						  		</td>
						  	</tr>	
					  		<?php } ?>
					  	</tbody>
					  </table>
					  <button id="myBtn" hidden="">asd</button>                    
					<div class="clearfix"> </div>
				</div>			
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
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
                        $('#datepicker').datepicker({minDate: 21,dateFormat: 'MM dd, yy',beforeShowDay: editDays
                        });
                    });
</script>
<!-- //contact-page -->
<!-- footer-top -->
