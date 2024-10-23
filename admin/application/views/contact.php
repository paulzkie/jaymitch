<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
$(document).on('click', '#update', function(){
document.getElementById("address").disabled=false;
document.getElementById("contact").disabled=false;
document.getElementById("email").disabled=false;
document.getElementById("map").disabled=false;
$("#contactid").val($(this).data("contactid"));
$("#save").show();
$("#cancel").show();
$("#update").hide();
});
//update contact
$(document).on('click', '#save', function(){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/contact/update",
                data: $("#contactform").serialize(),
                success: function(data){
                    var message = JSON.parse(data);
                    if(message.stat==1){
                        alert(message.msg);
                        $("#save").hide();
                        $("#cancel").hide();
                        $("#update").show();
                        $("#add_err").hide(); 
                        document.getElementById("address").disabled=true;
                        document.getElementById("contact").disabled=true;
                        document.getElementById("email").disabled=true;
                        document.getElementById("map").disabled=true; 
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
//cancel update contact
$(document).on('click', '#cancel', function(){
document.getElementById("address").disabled=true;
document.getElementById("contact").disabled=true;
document.getElementById("email").disabled=true;
document.getElementById("map").disabled=true;
$("#save").hide();
$("#cancel").hide();
$("#update").show();
});
</script>
<div id="add_err"></div>
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Contact Maintenance
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="contactform" method="post">
                                <?php
                                            foreach ($userdata as $data) { ?>
                                        <div class="form-group ">
                                            <label for="ccomment" class="control-label col-lg-3">Address</label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" style="resize:none;" rows="10" name="address" id="address" disabled><?php echo $data->address;?></textarea>
                                            </div>
                                        </div>    
                                        <div class="form-group ">
                                        <label for="contact" class="control-label col-lg-3">Contact #</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="contact" name="contact" type="text" value="<?php echo $data->contact;?>" maxlength="11" onkeypress="return isNumberKey(event)" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="contact" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="email" name="email" type="email" value="<?php echo $data->email;?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                            <label for="ccomment" class="control-label col-lg-3">Google Map</label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" style="resize:none;" rows="10" name="map" id="map" disabled><?php echo $data->map;?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="contactid" id="contactid">
                                    </form>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" id="update" 
                                            data-contactid="<?php echo $data->contactid?>" >Update</button>
                                            <button class="btn btn-primary" type="submit" style="display: none;" id="save">Save</button>
                                            <button class="btn btn-primary" type="submit" style="display: none;" id="cancel">Cancel</button>
                                        </div>
                                </div>  
                                  <?php } ?> 
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>