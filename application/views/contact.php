
<!-- //header -->
<!-- banner -->
<script type="text/javascript">
$(document).on("click","#btnContact", function(){
	$.ajax({
		type: "POST",
		url: base_url+"index.php/contact/insert",
		data: $("#contactform").serialize(),
		success: function(data){
			var message = JSON.parse(data);

			if(message.stat==1){
				alert(message.msg);
				$("input").val(""), $("textarea").val('');
			}else{
				alert(message.msg);
			}
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
								<a href="index.php
">
									<div class="burst-36 ">
									   <div>
											<div><span><img src="<?php echo base_url()?>assets/images/logo.png" alt=""/></span></div>
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
<!-- contact-page -->
<div class="contact">
	<div class="container">
		<div class="contact-info">
			<h3>VIEW ON MAP</h3>
			<div class="strip-line"></div>
		</div>
		<div class="contact-map">
		<?php
			foreach ($userdata as $data ) 
			echo $data->map;
		?>
		</div>
		<div class="contact-form">
			<div class="contact-info">
				<h3>CONTACT FORM</h3>
				<div class="strip-line"></div>
			</div>
			<form id="contactform" method="post">
				<div class="contact-left">
					<input type="text" name="name" placeholder="Name" required>
					<input type="text" name="Email" placeholder="E-mail" required>
					<input type="text" name="subject" placeholder="Subject" required>
				</div>
				<div class="contact-right">
					<textarea name="message" placeholder="Message" required></textarea>
				</div>
				<div class="clearfix"></div>
			</form>
			<button type="submit" id="btnContact">Submit</button>
		</div>
	</div>
</div>
<!-- //contact-page -->
<!-- footer-top -->
