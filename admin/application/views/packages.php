<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
//create package
$(document).on("click","#btnPackage", function(){
    window.location.href=base_url+'index.php/createpackage';
});

$(document).on("click",".update", function(){

$("#packageinfoid").val($(this).data("packageinfoid"));
$("#packagename").val($(this).data("packagename"));
$("#description").val($(this).data("desc"));
$("#packageprice").val($(this).data("packageprice"));
document.getElementById("packagetitle").innerHTML = $(this).data("packagename");
$("#modalshow").click();
});
//delete package
$(document).on("click",".delete", function(){
if(confirm("Are you sure you want to delete this package?")==true){
        $.ajax({
            type: "POST",
            url: base_url+"index.php/packages/delete",
            data: {packageinfoid: $(this).data("packageinfoid"),},
            success: function(data){
              var message = JSON.parse(data);

              if(message.stat==1){
                  alert(message.msg);
                  $("#datacontainer").load(base_url+"index.php/packages #datalist");
                  $("#add_err").hide(); 
              }else{
                  alert(message.msg);
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
}else{

}
});


</script>
<div id="add_err"></div>
<section id="main-content">
<?php include "updatepackages.php";?>
    <section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Package Maintenance
                            <span class="tools pull-right">
                                <button class="btn btn-primary" id="btnPackage">Create Package</button>
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
    <div class="panel-heading">
     Package List
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
            <th>Pacakge Name</th>
            <th data-breakpoints="xs">Description</th>
            <th>Package Price</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($userdata as $package){ ?>
          <tr data-expanded="true">
            <td><?php echo $package->packagename?></td>
            <td><?php echo $package->Descript?></td>
            <td>&#8369;<?php echo number_format($package->packageprice,2)?></td>
                <td><button class="btn-primary update" type="submit"
                data-packageinfoid="<?php echo $package->packageinfoid?>"
                data-packagename="<?php echo $package->packagename?>"
                data-desc="<?php echo $package->Descript?>"
                data-packageprice="<?php echo $package->packageprice?>">Update</button><td>
                <button class="btn-warning delete" data-packageinfoid="<?php echo $package->packageinfoid?>" type="submit">Delete</button>    
                </td></td>
          </tr>
           <?php } ?>
        </tbody>
      </table>
        </div>
      <button id="modalshow" hidden="">asd</button>
                    </section>
                </div>
            </div>
</div>
            <!-- page end-->
        </div>
</section>