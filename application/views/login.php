<script type="text/javascript">
$(document).on("click","#login", function(){
			$.ajax({
            type: "POST",
            url: base_url+"validate",
            data: $("#loginform").serialize(),
            success: function(data){
                console.log(data);
                if(data=='customer'){
                    window.location.href= base_url+'welcome';
                }else if(data=="none"){
                    alert("Account does not exist.");   
                }else if(data=="false"){
                    alert("Invalid password."); 
                }else if(data=="status"){
                    alert("Account is not yet verified.");  
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
					<div class="">
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<!-- //point burst circle -->
							
						</div>
					</div>
	</div>
</div>

<!-- //banner -->
<!-- login-page -->
<div class="login">
	<div class="container">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3>LOGIN</h3>
					 <div class="strip"></div>
					 <div id="add_err"></div>
					 <form id="loginform" method="post">
						 <h5>User Name:</h5>	
						 <input type="text" name="username">
						 <h5>Password:</h5>
						 <input type="password" name="password">	
					 				
						 <input type="submit" value="LOGIN" id="login">  
					 </form>
			</div>
			<div class="col-md-6 login-right">
					<h3>NEW REGISTRATION</h3>
					<div class="strip"></div>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="<?php echo base_url()?>register" class="hvr-shutter-in-horizontal button">CREATE AN ACCOUNT</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //login-page -->
<!-- footer-top -->