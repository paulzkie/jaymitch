
<!-- <div class="navigation text-center" style="width: 300px;">
	<span class="menu"><img src="<?php echo base_url()?>assets/images/menu.png" alt=""/></span>
		<ul class="nav1" style="width: 300px;">
			<li><a href="<?php echo base_url();?>Welcome">HOME</a></li>
			<li><a href="<?php echo base_url();?>about">ABOUT</a></li>
			<li><a href="<?php echo base_url();?>menu">OUR MENU</a></li>
			<li><a href="<?php echo base_url();?>gallery">GALLERY</a></li>
			<li><a href="<?php echo base_url();?>packages">PACKAGES</a>
			<?php
				if(isset($this->session->userdata["userid"])){ ?>
			<li><a href="<?php echo base_url();?>reservation">RESERVATIONS</a>	
			<li><a href="<?php echo base_url();?>contact">Contact</a></li>
			<?php	}else{ ?>
			<li><a href="<?php echo base_url();?>contact">Contact</a></li>
			<?php	}
			?>	
			<div class="clearfix"></div>
		</ul>
</div> -->
<style type="text/css">
.topnav {
  overflow: hidden;
  background-color: rgba(0,0,0,0.5);
  width: 826.9px;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  border-right: solid 1px;
}

.topnav a:hover {
  background-color: pink;
  color: black;
}

/*.topnav a.active {
    background-color: #4CAF50;
    color: white;
}*/

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
</style>
<center>
<?php
if(isset($this->session->userdata["userid"])){?>
<div class="topnav" id="myTopnav">
  			<a href="<?php echo base_url();?>Welcome">HOME</a>
			<a href="<?php echo base_url();?>about">ABOUT</a>
			<a href="<?php echo base_url();?>menu">OUR MENU</a>
			<a href="<?php echo base_url();?>gallery">GALLERY</a>
			<a href="<?php echo base_url();?>packages">PACKAGES</a>
			<?php
				if(isset($this->session->userdata["userid"])){ ?>
			<a href="<?php echo base_url();?>reservation">RESERVATIONS</a>	
			<a href="<?php echo base_url();?>contact">CONTACT</a>
			<?php	}else{ ?>
			<a href="<?php echo base_url();?>contact">CONTACT</a>
			<?php	}
			?>	
</div>
<?php }else{ ?>
<div class="topnav" id="myTopnav" style="width: 665px;">
  			<a href="<?php echo base_url();?>Welcome">HOME</a>
			<a href="<?php echo base_url();?>about">ABOUT</a>
			<a href="<?php echo base_url();?>menu">OUR MENU</a>
			<a href="<?php echo base_url();?>gallery">GALLERY</a>
			<a href="<?php echo base_url();?>packages">PACKAGES</a>
			<?php
				if(isset($this->session->userdata["userid"])){ ?>
			<a href="<?php echo base_url();?>reservation">RESERVATIONS</a>	
			<a href="<?php echo base_url();?>contact">CONTACT</a>
			<?php	}else{ ?>
			<a href="<?php echo base_url();?>contact">CONTACT</a>
			<?php	}
			?>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>	
</div>
<?php } ?>

</center>
<!-- script for menu -->
										<script> 
											$( "span.menu" ).click(function() {
											$( "ul.nav1" ).slideToggle( 300, function() {
											 // Animation complete.
											});
											});
											function myFunction() {
											    var x = document.getElementById("myTopnav");
											    if (x.className === "topnav") {
											        x.className += " responsive";
											    } else {
											        x.className = "topnav";
											    }
											}
										</script>
									<!-- //script for menu -->