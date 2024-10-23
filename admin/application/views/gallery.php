<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
//Add slider
$(document).ready(function (e) {
    // alert(base_url);
 $("#galleryform").on('submit',(function(e) {
  e.preventDefault();
  image = $("#image").val();
  if(image==""){
      alert("No image selected.");
  }else{

  $.ajax({
   url: base_url+"index.php/gallery/do_upload",
   type: "POST",
   data:  new FormData($(this)[0]),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
            var message = JSON.parse(data);  
            if(message.stat==1){
                alert(message.msg);
                $("#datacontainer").load(base_url+"index.php/gallery #datalist");
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
      }
 }));
});

//Delete Slider
$(document).on('click', '.delete', function(){
    if(confirm("Are you sure you want to deleted this?")==true){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/gallery/remove",
                data: {galleryid: $(this).data("galleryid"),},
                success: function(data){
                    var message = JSON.parse(data);
                    if(message.stat==1){
                        alert(message.msg);
                        $("#datacontainer").load(base_url+"index.php/gallery #datalist"); 
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
    }else{
        alert("Delete Cancelled.");
    }
});
//update Slider
$(document).on('click', '.update', function(){

$("#galleryid").val($(this).data("galleryid"));
$("#name").val($(this).data("name"));
$("#description").val($(this).data("desc"));

$("#modalshow").click();

});
</script>

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
<div id="add_err"></div>
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Gallery Maintenance
                            <?php include "updategallery.php";?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="galleryform" method="post" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " name="description" style="resize:none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="image" name="image" type="file">
                                        </div>
                                    </div>             
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" id="add">Add</button>
                                        </div>
                                    </div> 
                                    </form> 
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Gallery List
    </div>
    <div id="datacontainer">
      <table  id="datalist" class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th>Name</th>
            <th data-breakpoints="xs">Description</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($userdata as $data){ ?>
          <tr data-expanded="true">
            <td><?php echo $data->name?></td>
            <td><?php echo $data->description?></td>
            <td><img src="<?php echo base_url();?>assets/images/<?php echo $data->image?>" width="144" height="144" id="myImg" 
            style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>assets/images/<?php echo $data->image?>');"
            alt="<?php echo $data->name;?>"></td>
                <td><button class="btn-primary update" type="submit"
                data-galleryid="<?php echo $data->galleryid?>"
                data-name="<?php echo $data->name?>"
                data-desc="<?php echo $data->description?>">Update</button><td>
                <button class="btn-warning delete" data-galleryid="<?php echo $data->galleryid?>" type="submit">Delete</button>    
                </td></td>
          </tr>
           <?php } ?>
        </tbody>
      </table>
          <div id="largeImgPanel" onclick="this.style.display='none'">
          <p id="demo">asdsad</p>
            <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />
            
          </div>  
        </div>
      <button id="modalshow" hidden="">asd</button>
    </div>
  </div>
</div>
            <!-- page end-->
        </div>
</section>