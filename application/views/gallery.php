<div class="container">
<?php include "nav.php";?>
<!-- script for menu -->
<script> 
$( "span.menu" ).click(function() {
$( "ul.nav1" ).slideToggle( 300, function() {
 // Animation complete.
});
});
</script>
</div>	
<div class="gallery" style="margin-top: -80px;">
	<div class="container">
		<div class="gallery-info">
			<h3>GALLERY</h3>
			<div class="strip-line st-border"></div>
		</div>
		<div class="gallery-grids">
					<?php
						foreach ($getGallery as $gallery) { ?>
					<div class="col-md-4 gallery-grid gallery1">
						<a href="<?php echo base_url();?>admin/assets/images/<?php echo $gallery->image?>" class="swipebox"><img src="<?php echo base_url()?>admin/assets/images/<?php echo $gallery->image?>" class="img-responsive" alt="/" style="width: 350px;height: 215px;">
							<div class="textbox">
								<p>SPECIAL OFFER</p>
							</div>
					</div></a>	
					<?php	} ?>
					
					<div class="clearfix"> </div>
					

		</div>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/swipebox.css">
					<script src="<?php echo base_url()?>assets/js/jquery.swipebox.min.js"></script> 
						<script type="text/javascript">
							jQuery(function($) {
								$(".swipebox").swipebox();
							});
						</script>
	</div>
</div>