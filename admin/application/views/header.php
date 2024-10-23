<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
$username ="";
if (isset($this->session->userdata['username'])) {
$username = ($this->session->userdata['username']);
$position = ($this->session->userdata['position']);
}else{
    redirect('../', 'refresh');
}
?>
<!DOCTYPE html>
<head>
<title>Jay & Mitch Admin Panel</title>
<link rel="icon" href="<?php echo base_url();?>assets/images/logo.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="text/javascript">
    var base_url = "<?php echo base_url();?>";
</script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo base_url();?>assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css" type="text/css"/>
<link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/monthly.css">
<!-- //calendar -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/popup.css">

<!-- //font-awesome icons -->
<script src="<?php echo base_url();?>assets/js/jquery2.0.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets/js/morris.js"></script>
<style type="text/css">
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: pink;
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
</style>
<script type="text/javascript">

setInterval('someFunc()', 1000);

function someFunc()
{
$.ajax({
            async: true,
            type: "POST",
            url: base_url+"index.php/dashboard/countNotifications",
            success: function (data) {
                var message = JSON.parse(data);         
                $("#myNotif").html(message.countnotif);          
            }  
        });

 $.ajax({
            async: true,
            type: "POST",
            url: base_url+"index.php/dashboard/countPending",
            success: function (data) {
                var message = JSON.parse(data);
                $("#pendingMessage").html(message.msg);        
            }  
        });

  $.ajax({
            async: true,
            type: "POST",
            url: base_url+"index.php/dashboard/countCancelled",
            success: function (data) {
                var message = JSON.parse(data);

                $("#cancelMessage").html(message.msg);          
            }  
        });
  $.ajax({
            async: true,
            type: "POST",
            url: base_url+"index.php/dashboard/countResched",
            success: function (data) {
                var message = JSON.parse(data);

                $("#reschedMessage").html(message.msg);          
            }  
        });
}
</script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        <?php echo $position;?>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-success"><b id="myNotif"></b></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="<?php echo base_url()?>index.php/pending"><b id="pendingMessage"></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="<?php echo base_url()?>index.php/cancelled"><b id="cancelMessage"></a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="<?php echo base_url()?>index.php/rescheduled"><b id="reschedMessage"></a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo base_url();?>assets/images/2.png">
                <span class="username"><?php echo $username?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="<?php echo base_url();?>validate/logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>