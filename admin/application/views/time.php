<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
//Add user account
$(document).on('click', '#add', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url+"index.php/time/insert",
        data: $("#timeform").serialize(),
        success: function(data){
            var message = JSON.parse(data);
            if(message.stat==1){
                alert(message.msg);
                $("input").val("");
                $("#datacontainer").load(base_url+"index.php/time #datalist");     
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
//Delete user account
$(document).on('click', '.delete', function(e){
    e.preventDefault();
    if(confirm("Are you sure you want to deleted this?")==true){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/time/delete",
                data: {timeid: $(this).data("timeid"),},
                success: function(data){
                    var message = JSON.parse(data);
                    if(message.stat==1){
                        alert(message.msg);
                        $("#datacontainer").load(base_url+"index.php/time #datalist");
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
    }else{
        alert("Delete Cancelled.");
    }
});
//update user account
$(document).on('click', '.update', function(){

$("#timeid").val($(this).data("timeid"));

$("#modalshow").click();

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
                            Time Maintenance
                            <?php include "updatetime.php";?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="timeform" method="post">
                                    <div class="form-group ">
                                        <label for="time" class="control-label col-lg-3">Start time:</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="starttime" type="time">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="time" class="control-label col-lg-3">End time:</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="endtime" type="time">
                                        </div>
                                    </div>
                                    </form>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" id="add">Add</button>
                                        </div>
                                </div>  
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Time List
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
            <th>Start Time</th>
            <th>End Time</th>          
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($userdata as $data){ ?>
          <tr data-expanded="true">
            <td><?php echo $data->starttime?></td>
            <td><?php echo $data->endtime?></td>
            <td><button class="btn-primary update" type="submit"
            data-timeid="<?php echo $data->timeid?>">Update</button><td>
            <button class="btn-warning delete" data-timeid="<?php echo $data->timeid?>" type="submit">Delete</button>    
            </td></td>
          </tr> 
           <?php } ?>
        </tbody>
      </table>
      <button id="modalshow" hidden="">asd</button>
    </div>
  </div>
</div>
            <!-- page end-->
        </div>
</section>