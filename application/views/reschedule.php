<script type="text/javascript">
$(document).on("click","#save", function(){
  if($("#datepicker").val()==""){
          alert("Choose date");      
  }else{
        $.ajax({
              type: "POST",
              url: base_url+"view/update",
              data: $("#rescheduleform").serialize(),
              success: function(data){
                alert("Successfully rescheduled");
                $("#viewcontent").load(base_url+"index.php/view?reserveid=<?php echo $this->input->get('reserveid')?>&code=<?php echo $this->input->get('code')?> #servicestbl");
                $("#myModal").hide();
                $("#add_err").hide();
            },
            beforeSend: function(){
              $("#myModal").hide();
              $("#add_err").css('display', 'inline', 'important');
              $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
               "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
            }
        });
      }          
});
</script>
<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link href='//fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<center>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content" style="margin-top:100px;width: 750px;">
    <div class="modal-header" style="width: 750px;">
      <span class="close">&times;</span>
      <center><h2>Reschedule Form</h2></center>
    </div>
          <div class="modal-body" style="width: 750px;">
                  <table width="700">
                      <form id="rescheduleform" method="post">
                          <input type="hidden" name="reserveid" id="reserveid">
                          <tr><td width="10%;"><label for="inputEmail3" class="col-sm-2 control-label">Date:</label></td>
                          <td><input type="text" class="form-control" id="datepicker" name="rdate" placeholder="Choose date"></td></tr> 
                          <tr><td><hr style="opacity:0.00%;"></hr></td></tr>
                        </form>     
                          <tr><td></td><td><button type="submit" class="btn btn-primary" id="save">Save</button></td></tr>         
                  </table>          
          </div>    
    </div>
  </div>
</div>