<script type="text/javascript">
$(document).on('click', '#save', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url+"index.php/packages/update",
        data: $("#updatepackage").serialize(),
        success: function(data){
            var message = JSON.parse(data);
            if(message.stat==1){
                alert(message.msg);
                $("#datacontainer").load(base_url+"index.php/packages #datalist");
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
      <center><h2>Update Package</h2></center>
    </div>
    <section class="panel">
                        <header class="panel-heading">
                            <div id="packagetitle"></div>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="updatepackage" method="post">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Package Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="packagename" id="packagename" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " name="description" id="description" style="resize:none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="contact" class="control-label col-lg-3">Package Price</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="packageprice" id="packageprice" type="text" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                    <input type="hidden" name="packageinfoid" id="packageinfoid">
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