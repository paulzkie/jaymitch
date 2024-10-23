<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="<?php echo base_url();?>dashboard">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                        <span> Maintenance</span>
                    </a>
                    <ul class="sub">
						<li><a href="<?php echo base_url();?>usermaintenance">Usermaintenance</a></li>
						<li><a href="<?php echo base_url();?>userlevelmaintenance">User level Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>about">About Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>contact">Contact Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>slider">Slider Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>gallery">Gallery Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>news">News Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>time">Time Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>pax">Pax Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>payments">Payment Maintenance</a></li>
                        <li><a href="<?php echo base_url();?>disabledate">Disable date</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Monitoring</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url();?>pending">Pending Reservation</a></li>
                        <li><a href="<?php echo base_url();?>rescheduled">Rescheduled Reservation</a></li>
                        <li><a href="<?php echo base_url();?>confirmed">Confirmed Reservation</a></li>
                        <li><a href="<?php echo base_url();?>cancelled">Cancelled Reservation</a></li>
                        <li><a href="<?php echo base_url();?>completed">Completed Reservation</a></li>
                        <li><a href="<?php echo base_url();?>inquiry"">View Inquiry</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        <span> Services</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">Events</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                        <span>Foods</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url();?>category">Category</a></li>
                        <li><a href="<?php echo base_url();?>menu">Menu</a></li>
						<li><a href="<?php echo base_url();?>packages">Packages</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        <span>Utilities </span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url()?>backup">Backup</a></li>
                        <li><a href="<?php echo base_url()?>restore">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>restore/do_upload">
                        <input type="file" name="zip_file" onchange="this.form.submit();"></form>Restore</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo base_url()?>pendingreport">Pending/Rescheduled Reports</a></li>
                        <li><a href="<?php echo base_url()?>confirmedreport">Confirmed Reports</a></li>
                        <li><a href="<?php echo base_url()?>cancelledreport">Cancelled Reports</a></li>
                        <li><a href="flot_chart.php">Finished Reports</a></li>
                    </ul>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->