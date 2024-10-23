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
$(document).on("click","#search", function(){
        $.ajax({
            type: "POST",
            url: base_url+"pendingreport/searchPending",
            data: $("#searchdate").serialize(),
            success: function(data){
              // $("#datacontainer").load(base_url+"pending #datalist");
              $("#myPending").html(data);
              $("#add_err").hide(); 
            },
            beforeSend: function(){
             $("#add_err").css('display', 'inline', 'important');
             $("#add_err").html("<div id='popup1' class='overlay'>"+
               "<div class='popup' style='width:200px;background-color:transparent;margin-left:50px;'>"+
              "<img src='<?php echo base_url()?>assets/images/Spin.gif' style='width:250px;height:200px;'></div></div></div>");
            }
        });

});

function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
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
<div id="add_err"></div>
<section id="main-content">
  <section class="wrapper">
  <div class="panel-heading">
           Pending Reports
  </div>
    <div class="form-w3layouts">
     <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      <form id="searchdate" metho="post">
        <label>Date From : </label><input class="form-control" type="text" id="datepicker" name="from">               
      </div>
      <div class="col-sm-5 m-b-xs">
        <label>To : </label><input class="form-control" type="text" id="datepicker1" name="to">              
      </div>
      </form>
      <div class="col-sm-5 m-b-xs">
        <button class="btn btn-sm btn-default" id="search">Search</button>  
        <button class="btn btn-info" id="print"  onclick="printContent('printing')">Print</button>              
      </div>
      <div class="col-sm-4">
      </div>
    </div>
      <div class="table-agile-info">
       <div class="panel panel-default" id="printing">
          <div class="panel-heading">
           Pending Report List
          </div>
          <div id="datacontainer">
          <div id="myPending"></div>
            <!-- <table  id="datalist" class="table" ui-jq="footable" ui-options='{
              "paging": {
                "enabled": tru
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
                      <button class="btn-warning cancel" data-reserveid="<?php echo $data->reserveid?>" type="submit">Cancel</button> 
                      <?php }else{ ?>
                      <td>
                      <button class="btn-primary update" type="submit" id="confirm"
                      data-reserveid="<?php echo $data->reserveid?>"
                      data-email="<?php echo $data->email?>">Confirm</button>
                      <a href="<?php echo base_url()?>index.php/view?reserveid=<?php echo $data->reserveid?>&code=<?php echo $data->transactioncode?>"><button class="btn-primary update" type="submit">View</button></a>
                      <button class="btn-warning cancel" data-reserveid="<?php echo $data->reserveid?>" type="submit">Cancel</button>    
                      </td>
                   <?php } ?>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script type="text/javascript">
  $("#datepicker").datepicker({dateFormat: 'MM dd, yy', onSelect: function(date) {
    $("#datepicker1").datepicker('option', 'minDate', date);
  }
});

$("#datepicker1").datepicker({dateFormat: 'MM dd, yy'});
</script>