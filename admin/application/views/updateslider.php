<script type="text/javascript">
$(document).ready(function (e) {
    // alert(base_url);
 $("#updatesliderform").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
   url: base_url+"index.php/slider/update",
   type: "POST",
   data:  new FormData($(this)[0]),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
            var message = JSON.parse(data);  
            if(message.stat==1){
                alert(message.msg);
                $("#myModal1").hide();
                $("#datacontainer").load(base_url+"index.php/slider #datalist");
                $("input").val(""), $("textarea").val("");
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
 }));
});
</script>
<center>
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <center><h2>Update Slider</h2></center>
    </div>
    <section class="panel">
                        <header class="panel-heading">
                            Update Slider Maintenance
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="updatesliderform" method="post" enctype="multipat/form-data">
                                    <div class="form-group ">
                                        <label for="Name" class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="name" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " name="description" id="description" style="resize:none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="image" id="image1" type="file">
                                        </div>
                                    </div>
                                    <input type="hidden" name="sliderid" id="sliderid">
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" id="save">Save</button>
                                        </div>
                                    </div> 
                                    </form> 
                            </div>
                        </div>
                    </section>   
    </div>
  </div>
</div>