<!-- footer-top -->
<div class="footer-top">
	<div class="container">
		<div class="col-md-3 footer-grid">
			<h4>ADDRESS</h4>
			<ul>
				<?php
				foreach ($userdata as $data){ ?>
					<li class="list-one"><?php echo $data->address?></li>
					<li class="list-two"><a href="mailto:info@example.com"><?php echo $data->email?></a></li>
					<li class="list-three"><?php echo $data->contact?></li>
				<?php } ?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //footer-top -->
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="footer-left">
			<p>&copy; 2017 Jay and Mitch Catering</p>
		</div>
		<div class="footer-right">
			<ul>
				<li><a href="#" class="twitter"> </a></li>
				<li><a href="#" class="facebook"> </a></li>
				<li><a href="#" class="chrome"> </a></li>
				<li><a href="#" class="pinterest"> </a></li>
				<li><a href="#" class="linkedin"> </a></li>
				<li><a href="#" class="dribbble"> </a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<!-- //footer -->
<!-- smooth scrolling -->
	<script type="text/javascript">
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal
	btn.onclick = function() {
	    modal.style.display = "block";
	   $("#reserveid").val($(this).data("reserveid"));
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

		function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : event.keyCode
	    if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
	    return true;
	}
	document.getElementById("checkout").style.backgroundColor="red";
	function EnableSubmit(){	
		if(document.getElementById("check").checked==false){
			document.getElementById("checkout").disabled=true;
			document.getElementById("checkout").style.backgroundColor="red";
		}else{
			document.getElementById("checkout").disabled=false;
			document.getElementById("checkout").style.backgroundColor="green";			
	}
	}	
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>