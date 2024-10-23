<?php include "sidebar.php";?>
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

//Accept reservation
$(document).on("click","#confirm", function(){

if(confirm("Are you sure you want to accept this reservation?")==true){

        $.ajax({
            type: "POST",
            url: base_url+"pending/confirm",
            data: {reserveid: $(this).data("reserveid"), email: $(this).data("email")},
            success: function(data){
              alert("Successfully confirmed.");
              $("#datacontainer").load(base_url+"pending #datalist");
            }
        });
}else{

}

});
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
<section id="main-content">
  <section class="wrapper">
    <div class="form-w3layouts">
      <div class="table-agile-info">
       <div class="panel panel-default">
          <div class="panel-heading" style="margin-top: -50px;">
           Billing Statement
          </div>
          <div id="datacontainer">
            <table  id="datalist" class="table" ui-jq="footable" ui-options='{
              "paging": {
                "enabled": true
              },
              "filtering": {
                "enabled": true
              },
              "sorting": {
                "enabled": true
              }}'>
              
              <thead>
              <tr><td colspan="3" align="center"><h3>Reservation Details</h3></td></tr>
              <?php
                $getDetails = $this->jaymitch->getReservationDetails($this->input->get('reserveid'));

                if($getDetails[0]->packagetype=="Customize"){

                $getMenu = $this->jaymitch->getCustomize($this->input->get('code') );

                }else{

                $getMenu = $this->jaymitch->getMenus($getDetails[0]->packagetype);

                } 

                foreach ($getDetails as $data)  ?>
                <tr>
                <tr><th>Customer Name</th><td><?php echo $data->fname.' '.$data->lname?></td></tr>
                <tr><th>Address</th><td><?php echo $data->place?></td></tr>
                <tr><th>Reservation Date</th><td><?php echo $data->reservationdate?></td></tr>
                <tr><th>Date of Event</th><td><?php echo $data->dateofevent?></td></tr>
                <tr><th>Time</th><td><?php echo $data->time?></td></tr>
                <tr><th>Type of Event</th><td><?php echo $data->motif?></td></tr>
                <tr><th>No of Guest</th><td><?php echo $data->pax?></td></tr>
                </tr>

               
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="table-agile-info">
       <div class="panel panel-default">
          <div id="datacontainer">
                    <center>  <h3>Package Details</h3>
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
                <?php
                  $getPackageName = $this->jaymitch->getPackagetype($data->packagetype);
                  foreach($getPackageName as $name){
                  }
                ?>
                <thead>
            <tr><th align="center">Package Type: </th><td colspan="2" align="center"><?php 
            if($data->packagetype!="Customize"){
             echo $name->packagename;
             }else{ 
              echo "Customize";
              }?>
                
              </td></tr>
            
              <tr>
                <th width="50%">Image</th>
                <th width="50%">Dishname</th>
                <th width="50%">Price</th>
              </tr>
            </thead>
              <?php
              $total=0;
              foreach ($getMenu as $menu) { 
              if($data->packagetype!="Customize"){
              }else{
              $total += $menu->price; 
              }
                ?>              
            <tbody>
              <tr>
                <td align="center"><img src="<?php echo base_url();?>assets/servicesImages/<?php echo $menu->image?>" width="180" height="100" 
                id="myImg" style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>assets/servicesImages/<?php echo $menu->image?>');"></td>
                <td><?php echo $menu->dishname?></td>
                <td>&#8369;<?php echo number_format($menu->price,2)?></td>
              </tr>
              <?php } 
            if($data->packagetype!="Customize"){  ?>
            <tr><th colspan="2"> Price Package : </th><td>&#8369;<?php echo number_format($name->packageprice,2)?></td></tr>
            <tr><th colspan="2"> Total Price : </th><td>&#8369;<?php echo number_format($name->packageprice*$data->pax,2)?></td></tr>
            <tr><th colspan="2"> Service Charge 10% : </th><td>&#8369;<?php echo number_format($name->packageprice*$data->pax*.10,2)?></td></tr>
            <tr><th colspan="2"> Balance : </th><td>&#8369;<?php echo number_format($name->packageprice*$data->pax-$data->payment,2)?></td></tr>
            <?php }else{ ?>
            <tr><th colspan="2"> Price Package : </th><td>&#8369;<?php echo number_format($total,2)?></td></tr>
            <tr><th colspan="2"> Total Price : </th><td>&#8369;<?php echo number_format($total*$data->pax,2)?></td></tr>
            <tr><th colspan="2"> Service Charge 10% : </th><td>&#8369;<?php echo number_format($total*$data->pax*.10,2)?></td></tr>
            <tr><th colspan="2"> Balance : </th><td>&#8369;<?php echo number_format($total*$data->pax-$data->payment,2)?></td></tr>
            <?php } 
              ?>
            </tbody>
            </table>   
          </div>
        </div>
      </div>
    </div>
          <div id="largeImgPanel" onclick="this.style.display='none'">
          <p id="demo">asdsad</p>
            <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />
          </div> 
  </section>
</section>