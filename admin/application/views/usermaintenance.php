<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
//Add user account
$(document).on('click', '#add', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url+"index.php/usermaintenance/insert",
        data: $("#userform").serialize(),
        success: function(data){
            var message = JSON.parse(data);
            if(message.stat==1){
                alert(message.msg);
                $("input").val(""), $("textarea").val("");
                $("#datacontainer").load(base_url+"index.php/usermaintenance #datalist");  
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
$(document).on('click', '.delete', function(){
    if(confirm("Are you sure you want to deleted this?")==true){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/usermaintenance/delete",
                data: {userid: $(this).data("userid"),},
                success: function(data){
                    var message = JSON.parse(data);
                    if(message.stat==1){
                        alert(message.msg);
                        $("#datacontainer").load(base_url+"index.php/usermaintenance #datalist");   
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

$("#userid").val($(this).data("userid"));
$("#fname").val($(this).data("fname"));
$("#lname").val($(this).data("lname"));
$("#contact").val($(this).data("contact"));
$("#address").val($(this).data("address"));
$("#email").val($(this).data("email"));
$("#username").val($(this).data("username"));
$("#password").val($(this).data("password"));

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
                            User Maintenance
                            <?php include "updateuser.php";?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="userform" method="post">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="fname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Lastname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="lname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="contact" class="control-label col-lg-3">Contact #</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="contact" type="text" maxlength="11" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Address</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " name="address" style="resize:none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Username</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="username" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="password" type="password">
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
     User Account List
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
            <th>Full Name</th>
            <th>Contact</th>
            <th data-breakpoints="xs">Address</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Position</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($userdata as $data){ ?>
          <tr data-expanded="true">
            <td><?php echo $data->fname.' '.$data->lname?></td>
            <td><?php echo $data->contact?></td>
            <td><?php echo $data->address?></td>
            <td><?php echo $data->email?></td>
            <td><?php echo $data->username?></td>
            <td><?php echo $data->password?></td>
            <td><?php echo $data->position?></td>
             <?php
                if($data->usertypeid==1){ ?>

                <?php }else{ ?>
                <td><button class="btn-primary update" type="submit"
                data-userid="<?php echo $data->userid?>"
                data-fname="<?php echo $data->fname?>"
                data-lname="<?php echo $data->lname?>"
                data-contact="<?php echo $data->contact?>"
                data-address="<?php echo $data->address?>"
                data-email="<?php echo $data->email?>"
                data-username="<?php echo $data->username?>"
                data-password="<?php echo $data->password?>">Update</button><td>
                <button class="btn-warning delete" data-userid="<?php echo $data->userid?>" type="submit">Delete</button>    
                </td></td>
             <?php } ?>
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