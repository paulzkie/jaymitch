<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
//Add user account
$(document).on('click', '#add', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: base_url+"index.php/disabledate/insert",
        data: $("#disabledate").serialize(),
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
                data: {usertypeid: $(this).data("usertypeid"),},
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
                            Disable Date
                            <?php include "updatetime.php";?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="disabledate" method="post">
                                    <div class="form-group ">
                                        <label for="time" class="control-label col-lg-3">Date:</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="rdate" type="text" id="datepicker">
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
</div>
            <!-- page end-->
        </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$.getJSON('disabledate/dates', 
function(index, json){
    dates=index;
    });
 function editDays(date) {
     
    var disabledDates = dates; 
        for (var i = 0; i < disabledDates.length; i++) {
            if(disabledDates[i]){
            if (new Date(disabledDates[i]).toString() == date.toString()) {  
                 return [false];
                 
            }
            }
        }
        return [true];
 }

$(function(){
    $('#datepicker').datepicker({minDate: 0,dateFormat: 'MM dd, yy', beforeShowDay: editDays
    });
}); 
</script>