<script type="text/javascript">
$(document).on('click', '#save', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url+"index.php/usermaintenance/update",
        data: $("#updateuserform").serialize(),
        success: function(data){
            var message = JSON.parse(data);
            if(message.stat==1){
                alert(message.msg);
                $("#datacontainer").load(base_url+"index.php/usermaintenance #datalist");
                $("#myModal1").hide();
                $("#add_err").hide(); 
            }else{
                alert(message.msg);
                $("#add_err").hide(); 
            }
        },
        beforeSend: function(){
             $("#add_err").css('display', 'inline', 'important');
             $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
              "<img src='<?php echo base_url()?>assets/images/Spin.gif' style='width:250px;height:200px;'></div></div></div>");
         }
    });
});  
</script>
<center>
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <center><h2>Update User</h2></center>
    </div>
    <section class="panel">
                        <header class="panel-heading">
                            User Maintenance
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="updateuserform" method="post">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="fname" id="fname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Lastname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="lname" id="lname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="contact" class="control-label col-lg-3">Contact #</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="contact" id="contact" type="text" maxlength="11" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Address</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " name="address" id="address" style="resize:none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="email" id="email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Username</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="username" id="username" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="password" id="password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="position" class="control-label col-lg-3">Position</label>
                                        <div class="col-lg-6">
                                            <select class="form-control " name="usertypeid">
                                             <option value=""></option>
                                            <?php
                                                foreach ($userposition as $data) { ?>
                                                    <option value="<?php echo $data->usertypeid;?>" ><?php echo $data->position?></option>
                                            <?php } ?>  
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="userid" id="userid">
                                    </form>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" id="save">Save</button>
                                        </div>
                                </div>  
                            </div>
                        </div>
                    </section>   
    </div>
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