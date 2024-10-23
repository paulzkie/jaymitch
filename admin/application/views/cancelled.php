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

setInterval('countCancelled()', 1000);

function countCancelled()
{
 $.ajax({
            async: true,
            type: "POST",
            url: base_url+"index.php/cancelled/getCancelled",
            success: function (data) {
                $("#myCancel").html(data);          
            }  
        });
}
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
          <div class="panel-heading">
           Cancelled List
          </div>
          <div id="datacontainer">
          <div id="myCancel"></div>
            <!-- <table  id="datalist" class="table" ui-jq="footable" ui-options='{
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
                  <?php }?>
                      <td><a href="<?php echo base_url()?>index.php/view?reserveid=<?php echo $data->reserveid?>&code=<?php echo $data->transactioncode?>"><button class="btn-primary update" type="submit">View</button></a>
                </tr> 
                 <?php } ?>
              </tbody>
            </table> -->
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