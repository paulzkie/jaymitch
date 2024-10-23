<script type="text/javascript">
$(document).ready(function (e) {
    // alert(base_url);
 $("#paymentform").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
   url: base_url+"index.php/lists/update",
   type: "POST",
   data:  new FormData($(this)[0]),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
            var message = JSON.parse(data);  
            if(message.stat==1){
                alert(message.msg);
                $("#myModal").hide();
                $("#add_err").hide();
                $("#datacontainer").load(base_url+"lists #datalist");
                }else{
                alert(message.msg);    
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
 }));
});
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$(function(){
    $('#datepicker').datepicker({maxDate: 0,dateFormat: 'MM dd, yy'
    });
});
</script>
<center>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <center><h2>Payment Form</h2></center>
    </div>
    <div class="modal-body">
        <table >
          <form id="paymentform" method="post" enctype="multipart/form-data">
              <input type="hidden" name="reserveid" id="reserveids">
              <input type="hidden" name="transactioncode" id="transcode">
              <tr><td width="10%;"><label for="inputEmail3" class="col-sm-2 control-label">Bank:</label></td>
              <td>
              <!-- <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank or Remittance name"> -->
              <select class="form-control" id="bank" name="bank">
                  <?php
                $getBanks = $this->jaymitch->getBanks();
                foreach ($getBanks as $banks){  ?>
                <option value="<?php echo $banks->bank?>"><?php echo $banks->bank?></option>
                <?php } ?>
              </select>
              </td></tr>
              <tr><td><label for="inputPassword3" class="col-sm-2 control-label">Control #:</label></td>
              <td><input type="text" class="form-control" id="controlnum" name="ctrlno" placeholder="Control number"></td></tr>    
              <tr><td width="10%;"><label for="inputEmail3" class="col-sm-2 control-label">Amount:</label></td>   
              <td><input type="text" class="form-control" id="amount" name="amount" placeholder="amount" onkeypress="return isNumberKey(event)"></td></tr> 
              <tr><td width="10%;"><label for="inputEmail3" class="col-sm-2 control-label">Date of payment:</label></td>
              <td><input type="text" class="form-control" id="datepicker" name="dateofpayment" placeholder="date"></td></tr> 
              <tr><td width="10%;"><label for="inputEmail3" class="col-sm-2 control-label">Upload Image Reciept:</label></td>
              <td><input type="file" class="form-control" id="image" name="image"></td></tr>      
              <tr><td><hr style="opacity:0.00%;"></hr></td></tr>
              <tr><td></td><td><button type="submit" style="background-color: cyan;color:black;" id="paynow">Pay now</button></td></tr>   
          </form>      
        </table>          
      </div>    
    </div>
  </div>
</div>