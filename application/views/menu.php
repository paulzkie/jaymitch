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
<!-- menu-page -->
<div class="menu">
	<div class="container">
		<div class="menu-info">
			<h3>CHECK OUT OUR MENU HERE</h3>
			<div class="strip-line"></div>
		</div>
		<div class="our-menu-grids">
			<?php
				foreach ($getDish as $dish) { ?>
			<div class="order-top">
				<li class="im-g"><a href="#">
				<img src="<?php echo base_url()?>admin/assets/servicesImages/<?php echo $dish->image?>" class="img-responsive" width="144" height="144" d="myImg" 
                   style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url()?>admin/assets/servicesImages/<?php echo $dish->image?>');">	
				</a></li>
				<li class="data">
					<h3>&#8369;<?php echo $dish->price?></h3>
					<h4><?php echo $dish->dishname?></h4>
					<p><?php echo $dish->description?></p>
				</li>
				<!-- <li class="bt-nn">
					<a class="hvr-shutter-in-horizontal button" href="orders.php">EXPLORE</a>
				</li> -->
				<div class="clearfix"></div>
			</div>
			<?php	} ?>
		</div>
	</div>
	<div id="largeImgPanel" onclick="this.style.display='none'">
        <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />
    </div>
</div>