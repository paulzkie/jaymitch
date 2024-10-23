
<style type="text/css">
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
} 	
</style>

<div class="banner-slider">
	<div class="banner-pos">
					<div class="banner one page-head">
						<div class="container">

									<?php include "nav.php";?>

							<div class="logo">
								<a href="index.php">
									<div class="burst-36 ">
									   <div>
											<div><span><img src="<?php echo base_url()?>assets/images/logo.png" alt=""/></span></div>
									   </div>
									</div>
									<h1>Packages</h1>
								</a>
							</div>
							<!-- //point burst circle -->
							
							
						</div>
					</div>
	</div>
</div>

<!-- //banner -->
<!-- gallery-page -->
<div class="gallery" style="margin-top: -50px;">
	<div class="container">
		<div class="gallery-grids" style="height: 200;width: 1200px;background-color:rgba(255,0,0,0.5);">
			<?php
					$getPackages = $this->jaymitch->getPackage();

						foreach ($getPackages as $packages) { ?>
					<div class="col-md-4 gallery-grid gallery1" style="padding: 10px;margin:30px;width: 320px;border: solid 1px;border-radius: 7px;background-color:rgba(255,0,0,0.5);">
					<h3><center><?php echo $packages->packagename?></h3><br>
					  	Description: <?php echo $packages->Descript?>
					 <br>
					 <button class="btn btn-info" id="viewpackages" onclick="viewpackages(this)"
					 data-packageinfoid="<?php echo $packages->packageinfoid?>"
					 >View More</button>
					 <?php
					 if(isset($this->session->userdata['userid'])){ ?>
					 <a class="btn btn-default" href="reservationpackages?packageinfoid=<?php echo $packages->packageinfoid?>"
					 data-packageinfoid="<?php echo $packages->packageinfoid?>"
					 >Reserve now</a>		
					 <?php }else{ ?>

					<?php }
					 ?> 	
					</div>
					<?php 	
					} ?>	
					<div id="add_err"></div>
					<button id="showpackages" hidden="">asd</button>
		</div>
	</div>
</div>
<div id="largeImgPanel" onclick="this.style.display='none'">
        <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />
</div> 
<script type="text/javascript">
function viewpackages(x){
var packageinfoid = x.getAttribute('data-packageinfoid');
	$.ajax({
		type: "POST",
		url: base_url+"index.php/packages/showpackages",
		data: { packageinfoid: packageinfoid,},
		success: function(data){
			$("#add_err").css('display', 'inline', 'important');
	 		$("#add_err").html("<div id='popup1' class='overlay' style='background-color: transparent;'>"+
			  "<div class='popup' style='margin-top:10px;margin-left:-370px;width:1150px;height:600px;'><a class='close' id='xclose' style='color:black;'>"+
			  "CLOSE</a>'"+data+"'"+
			  "<br><br><div class='form-group'><a href='"+base_url+"lists' class='btn btn-sm btn-info'>Back to Home</a></div></div></div>");
		}
	});
}
</script>