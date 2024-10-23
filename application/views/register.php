<script type="text/javascript">
$(document).on("click","#register", function(){
	$.ajax({
		type: "POST",
		url: base_url+"index.php/register/insert",
		data: $("#regfrom").serialize(),
		success: function(data){
			var message = JSON.parse(data);

			if(message.stat==1){
				alert(message.msg);
				$("input").val(''), $("textarea").val('');
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
              "<img src='<?php echo base_url()?>assets/images/Ellipsis.gif' style='width:250px;height:200px;'></div></div></div>");
	 	}
	});
});
</script>
<div class="banner-slider">
	<div class="banner-pos">
					<div class="banner one page-head">
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<div class="logo">
								<a href="<?php echo base_url();?>index.php/Welcome">
									<div class="burst-36 ">
									   <div>
											<div><span><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></span></div>
									   </div>
									</div>
									<h1>FAVORITES</h1>
								</a>
							</div>
							<!-- //point burst circle -->
						</div>
					</div>
	</div>
</div>
<!-- //banner -->
<!-- registration-form -->
<div id="add_err"></div>
<div class="registration-form">
	<div class="container">
		<h3>Registration</h3>
		<div class="strip"></div>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					 <p>Welcome, please enter the following details to continue.</p>
					 <p>If you have previously registered with us, <a href="<?php echo base_url();?>login">click here</a></p>
					 <form id="regfrom" method="post">
						 <ul>
							 <li class="text-info">First Name: </li>
							 <li><input type="text" name="fname" value=""></li>
						 </ul>
						 <ul>
							 <li class="text-info">Last Name: </li>
							 <li><input type="text" name="lname" value=""></li>
						 </ul>
						 <ul>
							 <li class="text-info">Mobile Number:</li>
							 <li><input type="text" name="contact" value="" maxlength="11" onkeypress="return isNumberKey(event)"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Address:</li>
							 <li><textarea name="address" style="resize: none;" cols="46" rows="5"></textarea></li>
						 </ul>					 
						<ul>
							 <li class="text-info">Email: </li>
							 <li><input type="text" name="email" value=""></li>
						 </ul>
						 <ul>
							 <li class="text-info">Username: </li>
							 <li><input type="text" name="username" value=""><span>Minimum of 8 characters</span></li>
						 </ul>
						 <ul>
							 <li class="text-info">Password: </li>
							 <li><input type="password" name="password" value=""><span>Minimum of 8 characters</span></li>
						 </ul>
						 <ul>
							 <li class="text-info">Re-enter Password:</li>
							 <li><input type="password" name="repassword" value=""></li>
						 </ul>					
					 </form>
					 <center><h3><button class="label label-primary" id="register">Register</button></h3></center>
				 </div>
			</div>
			<div class="clearfix"></div>
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
<!-- registration-form -->

<!-- footer-top -->