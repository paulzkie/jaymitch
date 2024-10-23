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
              $("#add_err").hide();
            },
            beforeSend: function(){
                 $("#add_err").css('display', 'inline', 'important');
                 $("#add_err").html("<div id='popup1' class='overlay'>"+
                   "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
                  "<img src='<?php echo base_url()?>assets/images/Spin.gif' style='width:250px;height:200px;'></div></div></div>");
            }
        });
}else{

}

});

//cancel reservation
$(document).on("click","#cancel", function(){

if(confirm("Are you sure you want to cancel this reservation?")==true){

        $.ajax({
            type: "POST",
            url: base_url+"rescheduled/cancel",
            data: {reserveid: $(this).data("reserveid"), email: $(this).data("email")},
            success: function(data){
              alert("Successfully cancelled.");
              $("#datacontainer").load(base_url+"index.php/rescheduled #datalist");
              $("#add_err").hide();
            },
            beforeSend: function(){
                 $("#add_err").css('display', 'inline', 'important');
                 $("#add_err").html("<div id='popup1' class='overlay'>"+
                   "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
                  "<img src='<?php echo base_url()?>assets/images/Spin.gif' style='width:250px;height:200px;'></div></div></div>");
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
<div id="add_err"></div>
<section id="main-content">
  <section class="wrapper">
    <div class="form-w3layouts">
      <div class="table-agile-info">
       <div class="panel panel-default">
          <div class="panel-heading">
           Rescheduled List
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
                <tr>
                  <th>Customer Name</th>
                  <th>Transaction Code</th>
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($userdata as $data){ ?>
                <tr data-expanded="true">
                  <td><?php echo $data->fname.' '.$data->lname?></td>
                  <td><?php echo $data->transactioncode?></td>
                  <td><?php echo $data->total?></td>
                  <td><?php echo $data->payment?></td>
                  <td>
                  <?php
                  if($data->image==""){
                  echo "No image available";
                   }else{ ?>
                   <img src="<?php echo base_url()?>assets/paymentImages/<?php echo $data->image?>" width="144" height="144" d="myImg" 
                   style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url()?>assets/paymentImages/<?php echo $data->image?>');"></td>
                  <?php }
                  ?>
                   <?php
                      if($data->payment==0.00){ ?>
                      <td><a href="<?php echo base_url()?>index.php/view?reserveid=<?php echo $data->reserveid?>&code=<?php echo $data->transactioncode?>"><button class="btn-primary update" type="submit">View</button></a>
                      <button class="btn-warning cancel" id="cancel" data-reserveid="<?php echo $data->reserveid?>"
                      data-email="<?php echo $data->email?>" type="submit">Cancel</button> 
                      <?php }else{ ?>
                      <td>
                      <button class="btn-primary update" type="submit" id="confirm"
                      data-reserveid="<?php echo $data->reserveid?>"
                      data-email="<?php echo $data->email?>">Confirm</button>
                      <a href="<?php echo base_url()?>index.php/view?reserveid=<?php echo $data->reserveid?>&code=<?php echo $data->transactioncode?>"><button class="btn-primary update" type="submit">View</button></a>
                      <button class="btn-warning cancel" id="cancel" data-reserveid="<?php echo $data->reserveid?>"
                      data-email="<?php echo $data->email?>" type="submit">Cancel</button>    
                      </td>
                   <?php } ?>
                </tr> 
                 <?php } ?>
              </tbody>
            </table>
            <button id="modalshow" hidden="">asd</button>
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