<script type="text/javascript">
// $(document).on('click', '#save', function(){
//              $.ajax({
//                  url: base_url+"index.php/category/update",
//                  type: "POST",
//                  data:  $("#updatecategory").serialize(),
//                  success: function(data){
//                           var message = JSON.parse(data);  
//                           if(message.stat==1){
//                               alert(message.msg);
//                               $("#datacontainer").load(base_url+"index.php/category #datalist");
//                               $("#myModal1").hide();
//                           }else{
//                               alert(message.msg);    
//                           }
//                        }      
//                   });    
// }); 

$(document).on('click', '#save', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url+"index.php/category/update",
        data: $("#updatecategory").serialize(),
        success: function(data){
            var message = JSON.parse(data);
            if(message.stat==1){
                alert(message.msg);
                $("#datacontainer").load(base_url+"index.php/category #datalist");
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
  <div class="modal-content" style="width: 800px;">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <center><h2>Update Category</h2></center>
    </div>
    <section class="panel">
                        <header class="panel-heading">
                            Food Category
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body" style="width: 800px;">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="updatecategory" method="post">
                                    <div class="form-group ">
                                        <label for="position" class="control-label col-lg-3">Category Name: </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="category" id="category" type="text">
                                        </div>
                                    </div>
                                    <input type="hidden" name="catid" id="catid">
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