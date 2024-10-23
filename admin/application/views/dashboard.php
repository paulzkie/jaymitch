<!--header end-->
<?php
include "sidebar.php";
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Up Coming Events</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
								<table id="datalist" class="table" ui-jq="footable" ui-options='{
					              "paging": {
					                "enabled": true
					              },
					              "filtering": {
					                "enabled": true
					              },
					              "sorting": {
					                "enabled": true
					              }}'>
					              	
					              <tr>
					              	<td>Date</td>
					              	<td>Event</td>
					              </tr>	
					              <?php
					              	$getEvent = $this->jaymitch->getEvent();
					              	foreach ($getEvent as $event ) { ?>
					              <tr>
					              	<td><?php echo $event->dateofevent?></td>
					              	<td><?php echo $event->motif?></td>		
					              </tr>
					              <?php	} ?>
					              </table>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<!-- //calendar -->
			<div class="clearfix"> </div>
		</div>
</section>

