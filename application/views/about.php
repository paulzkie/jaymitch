<div class="banner-slider">
	<div class="banner-pos">
					<div class="banner one page-head">
						<div class="container">
							<?php include "nav.php";?>
							<!-- point burst circle -->
							<div class="logo">
								<a href="index.php">
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
<!-- about-page -->
<div class="about-page">
	<div class="container">
		<div class="about-info">
			<h3>ABOUT</h3>
			<div class="strip-line st-border"></div>
		</div>	
		<div class="about-grids">	
			<div class="col-md-7 about-grid">
				<h4>ABOUT US</h4>
				<p><?php
				echo $getAbout[0]->description;
				?></p>
			</div>
			<div class="col-md-7 about-grid">
				<h4>VISION</h4>
				<p><?php
				echo $getAbout[0]->vision;
				?></p>
			</div>
			<div class="col-md-5 about-grid">
				<img src="images/g4.jpg" alt=""/>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- test -->
<div class="testimonial">
	<div class="container">
		<!-- responsiveslides -->
							<script src="js/responsiveslides.min.js"></script>
								<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider4").responsiveSlides({
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
	</div>
</div>
<!-- //test -->

