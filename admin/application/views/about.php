<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
//Add user account
$(document).on('click', '#update', function(){
document.getElementById("description").disabled=false;
document.getElementById("vision").disabled=false;
$("#aboutid").val($(this).data("aboutid"));
$("#save").show();
$("#cancel").show();
$("#update").hide();
});
//update about
$(document).on('click', '#save', function(){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/about/update",
                data: $("#aboutform").serialize(),
                success: function(data){
                    var message = JSON.parse(data);
                    if(message.stat==1){
                        alert(message.msg);
                        $("#save").hide();
                        $("#cancel").hide();
                        $("#update").show();
                        $("#add_err").hide(); 
                        document.getElementById("description").disabled=true;
                        document.getElementById("vision").disabled=true;  
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
//cancel update about
$(document).on('click', '#cancel', function(){
document.getElementById("description").disabled=true;
document.getElementById("vision").disabled=true;
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
                            About Maintenance
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="aboutform" method="post">
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                        <textarea class="form-control" style="resize:none;" rows="10" name="description" id="description" disabled><?php echo $userdata[0]->description;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-3">Vision</label>
                                        <div class="col-lg-6">
                                        <textarea class="form-control" style="resize:none;" rows="10" name="vision" id="vision" disabled><?php echo $userdata[0]->vision;?></textarea>
                                        <input type="hidden" name="aboutid" id="aboutid">
                                        </div>
                                    </div>
                                    </form>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" id="update" 
                                            data-aboutid="<?php echo $userdata[0]->aboutid?>" >Update</button>
                                            <button class="btn btn-primary" type="submit" style="display: none;" id="save">Save</button>
                                            <button class="btn btn-primary" type="submit" style="display: none;" id="cancel">Cancel</button>
                                        </div>
                                </div>  
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>