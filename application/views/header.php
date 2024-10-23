<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
date_default_timezone_set("Asia/Manila");
$date=date("F d, Y");
if(isset($this->session->userdata["userid"])){
$fullname = $this->session->userdata["fullname"];
$userid = $this->session->userdata["userid"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jay & Mitch Catering Services</title>
	<link rel="icon" href="<?php echo base_url();?>assets/images/logo.png">
	<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
		
	<!--//fonts-->
			<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Favorites Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->	
	<!-- js -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<!-- js -->
	<!-- cart -->
		<script src="<?php echo base_url();?>assets/js/simpleCart.min.js"> </script>

	<!-- cart -->
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/move-top.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		<script type="text/javascript">
			var base_url = "<?php echo base_url();?>";
		</script>
	<!-- start-smoth-scrolling -->
<?php
$getSlider = $this->jaymitch->getSlider();
?>
<style type="text/css">
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #4CAF50;
}
.banner{
background-size:cover;
-webkit-background-size: cover;
-o-background-size: cover;
-ms-background-size: cover;
-moz-background-size: cover;
min-height: 800px;
}
.banner.one{
background:url(<?php echo base_url();?>admin/assets/images/<?php echo $getSlider[0]->image?>) no-repeat 0px 0px;
background-size:cover;
-webkit-background-size: cover;
-o-background-size: cover;
-ms-background-size: cover;
-moz-background-size: cover;
}
.banner.two{
background:url(<?php echo base_url();?>admin/assets/images/<?php echo $getSlider[1]->image?>) no-repeat 0px 0px;
background-size:cover;
-webkit-background-size: cover;
-o-background-size: cover;
-ms-background-size: cover;
-moz-background-size: cover;
}
.banner.three{
background:url(<?php echo base_url();?>admin/assets/images/<?php echo $getSlider[2]->image?>) no-repeat 0px 0px;
background-size:cover;
-webkit-background-size: cover;
-o-background-size: cover;
-ms-background-size: cover;
-moz-background-size: cover;
}	
.dropbtn {
    background-color: transparent;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: transparent;
}
.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close2 {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 0.2s;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close2:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

/*Let's make it appear when the page loads*/
.overlay:target:before {
    display: none;
}
.overlay:before {
  content:"";
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: block;
  background: rgba(0, 0, 0, 0.6);
  position: fixed;
  z-index: 9;
}
.overlay .popup {
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: fixed;
  top: 0;
  left: 35%;
  padding: 25px;
  margin: 70px auto;
  z-index: 10;
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  transition: all 0.6s ease-in-out;
}
.overlay:target .popup {
    top: -100%;
    left: -100%;
}

@media screen and (max-width: 768px){
  .box{
    width: 70%;
  }
  .overlay .popup{
    width: 70%;
    left: 15%;
  }
}
#largeImgPanel {
                text-align: center;
                display: none;
                position: fixed;
                margin-top: 40px;
                z-index: 100;
                top: 0; left: 0; width: 100%; height: 100%;
            }		
</style>
<script type="text/javascript">
$(document).on("click","#xclose", function(){
	$("#add_err").hide();
});

function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
  	 width++; 
      elem.style.width = width + '%'; 
    if (width >= 100) {
      document.getElementById("add_err").hide = true;
    } 
  }
}
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
</head>
<body>
<!-- header -->
<div class="header">
	<div class="container">
		<div class="top-header">
				<div class="header-left">
					<img src="<?php echo base_url();?>assets/images/logo.png" height="60" width="250">
				</div>
				<?php
					if(isset($this->session->userdata["userid"])){ ?>

				<?php	}else{ ?>
				<div class="login-section">
					<ul>
						<li><a href="<?php echo base_url();?>login">Login</a></li> |
						<li><a href="<?php echo base_url();?>register">Register</a> </li>
					</ul>
				</div>
				<?php	} ?>
					<script src="<?php echo base_url();?>assets/js/classie.js"></script>
				<!-- //search-scripts -->
				<div class="header-right">
						<div class="cart box_1">
							<?php
								if(isset($this->session->userdata["userid"])){ 
                  $countNotif = $this->jaymitch->getNewNotif();
                  ?>
								<div class="dropdown">
								  <button class="dropbtn"><h3><?php echo $fullname?></h3><p>
                    <?php
                    if($countNotif[0]->newNotif==0){ ?>
                    (<?php echo $countNotif[0]->newNotif;?>) No notifi..
                    <?php }else{ ?>
                    (<?php echo $countNotif[0]->newNotif;?>) New notif..
                    <?php }
                    ?>
                    </p></button>
								  <div class="dropdown-content">
								    <a href="<?php echo base_url();?>lists">List</a>
								    <a href="<?php echo base_url();?>validate/logout" class="simpleCart_empty">Log out</a>
								  </div>
								</div>	
							<?php	}else{ ?>
								<h3>Welcome Guest</h3>
							<?php	} ?>	
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"></div>
		</div>
	</div>
</div>