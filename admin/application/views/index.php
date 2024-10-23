<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
<!-- //font-awesome icons -->
<style type="text/css">
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
<script src="<?php echo base_url();?>assets/js/jquery2.0.3.min.js"></script>
<!--Login here-->
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
$(document).on("click","#login", function(){
username = $("#username").val();
password = $("#password").val();
    if(username==""){
        alert('Enter your username');
    }else if(password==""){
        alert('Enter your password');
    }else{
        $.ajax({
            type: "POST",
            url: base_url+"index.php/validate",
            data: $("#loginform").serialize(),
            success: function(data){
                console.log(data);
                if(data=='admin'){
                    window.location.href= base_url+'index.php/dashboard';
                }else if(data=="none"){
                    alert("Account does not exist.");
                    $("#add_err").hide();   
                }else if(data=="false"){
                    alert("Invalid password.");
                    $("#add_err").hide(); 
                }else if(data=="status"){
                    alert("Account is not yet verified.");
                    $("#add_err").hide();  
                }
            },
            beforeSend: function(){
             $("#add_err").css('display', 'inline', 'important');
             $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
              "<img src='<?php echo base_url()?>assets/images/Spin.gif' style='width:250px;height:200px;'></div></div></div>");
            }
        });
    }
});
</script>
</head>
<body>
<div class="log-w3">
<div id="add_err"></div>
<div class="w3layouts-main">
    <h2>ADMIN LOGIN</h2>
        <form id="loginform" method="post">
            <input type="email" class="ggg" name="username" id="username" placeholder="Username" required="">
            <input type="password" class="ggg" name="password" id="password" placeholder="Password" required="">
            <span><input type="checkbox" />Remember Me</span>
                <div class="clearfix"></div>
        </form>
                <input type="submit" id="login" name="login" value="Login">
        
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
