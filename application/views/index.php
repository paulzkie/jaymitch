<!-- //header -->
<!-- banner -->

<div class="banner-slider">
	<div class="banner-pos">
		<!-- responsiveslides -->
							<script src="<?php echo base_url();?>assets/js/responsiveslides.min.js"></script>
								<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
								</script>
		<!-- responsiveslides -->
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider3">
				<li>
					<div class="banner one">
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<div class="logo">
								<a href="index.php">
									<div class="burst-36 ">
									   <div>
											<div><span><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></span></div>
									   </div>
									</div>
									
								</a>
							</div>
							<!-- //point burst circle -->
						</div>
					</div>
				</li>
				<li>
					<div class="banner two">
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<div class="logo">
								<a href="index.php">
									<div class="burst-36 ">
									   <div>
											<div><span><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></span></div>
									   </div>
									</div>
									
								</a>
							</div>
							<!-- //point burst circle -->
						</div>
					</div>
				</li>
				<li>
					<div class="banner three">
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<div class="logo">
								<a href="index.php">
									<div class="burst-36 ">
									   <div>
											<div><span><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></span></div>
									   </div>
									</div>
									
								</a>
							</div>
							<!-- //point burst circle -->
						</div>
					</div>
				</li>				
			</ul>
		</div>
	</div>
	<div class="clearfix"></div>
	<!-- banner-bottom -->
	<!-- //banner-bottom -->
</div>
<!-- //banner -->
<!-- welcome -->
<div class="welcome">
	<div class="container">
		<div class="wel-info">
			<h3>WELCOME</h3>
			<div class="strip-line"></div>
			<p><?php
				echo $getAbout[0]->description;
				?></p>
		</div>
	</div>
</div>
<!-- //welcome -->