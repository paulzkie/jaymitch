<?php include "sidebar.php";?>
<!--main content start-->
<script type="text/javascript">
$(document).on("click","#add", function(){
            $.ajax({
                  type: "POST",
                  url: base_url+"index.php/createpackage/insert",
                  data: { menuid: $(this).data("menuid"),},
                  success: function(data){
                    var message = JSON.parse(data);
                      if(message.stat==1){
                            alert(message.msg);
                            $("#datacontainer").load(base_url+"index.php/createpackage #datalist");
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
});

$(document).on("click",".delete", function(){
    if(confirm("Are you sure you want to remove this menu?")==true){
      $.ajax({
                  type: "POST",
                  url: base_url+"index.php/createpackage/remove",
                  data: { tempid: $(this).data("tempid"),},
                  success: function(data){
                    var message = JSON.parse(data);
                      if(message.stat==1){
                            alert(message.msg);
                            $("#datacontainer").load(base_url+"index.php/createpackage #datalist");
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

function category(){
var cat = document.getElementById("category").value;
    $.ajax({
        type: "POST",
        url: base_url+"index.php/createpackage/searchcategory",
        data: { catid: cat,},
        success: function(data){
          $("#showCategory").html(data);
        }
    });
}
</script>
<script type="text/javascript">
$(document).on("click","#save", function(){
packagename = $("#packagename").val();
desc = $("#description").val();
packageprice = $("#packageprice").val();

          $.ajax({
                  type: "POST",
                  url: base_url+"index.php/createpackage/insertPackage",
                  data: {packagename: packagename, desc: desc, packageprice: packageprice},
                  success: function(data){
                    var message = JSON.parse(data);
                      if(message.stat==1){
                            alert(message.msg);
                            $("#datacontainer").load(base_url+"index.php/createpackage #datalist");
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
});
</script>
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
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Create Package
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle" id="category" onchange="category()">
            <option></option>
        <?php
            foreach ($getCategory as $category) { ?>
            <option value="<?php echo $category->catid?>">Sort By <?php echo $category->category?></option>
        <?php }  ?>
        </select>             
      </div>
      <div class="col-sm-4">
      </div>
    </div>
    <div id="add_err"></div>
    <div id="showCategory">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Dishname</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th style="width:30px;">Action</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($getMenu as $menu){ ?>
          <tr data-expanded="true">
            <td><?php echo $menu->dishname?></td>
            <td><?php echo $menu->description?></td>
            <td>&#8369;<?php echo number_format($menu->price,2)?></td>
            <td><?php echo $menu->category?></td>
            <td><img src="<?php echo base_url();?>assets/servicesImages/<?php echo $menu->image?>" width="144" height="144" id="myImg" 
            style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>assets/servicesImages/<?php echo $menu->image?>');"
            alt="<?php echo $menu->dishname;?>"></td>
                <td><button class="btn-primary" type="submit"
                data-menuid="<?php echo $menu->menuid?>"
                data-dishname="<?php echo $menu->dishname?>"
                data-desc="<?php echo $menu->description?>"
                data-price="<?php echo $menu->price?>" id="add">Add</button>
                </td>
          </tr>
           <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
    <footer class="panel-footer">
    </footer>
  </div>
</div>

<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    Package Dish List
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
        <tr><th>Pacakge Name:</th><td> <input class="form-control" id="packagename" type="text"></td></tr>
          <tr>
            <th>Dish-Name</th>
            <th data-breakpoints="xs">Description</th>       
            <th>Image</th>
             <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($getTemp as $temp){ ?>
          <tr data-expanded="true">
            <td><?php echo $temp->dishname?></td>
            <td><?php echo $temp->description?></td>   
            <td><img src="<?php echo base_url();?>assets/servicesImages/<?php echo $temp->image?>" width="144" height="144" id="myImg" 
            style="cursor:pointer" onclick="showImage(this.src, '<?php echo base_url();?>assets/servicesImages/<?php echo $temp->image?>');"
            alt="<?php echo $temp->dishname;?>"></td>
             <td>&#8369;<?php echo number_format($temp->price,2)?></td>
            <td><button class="btn-warning delete" data-tempid="<?php echo $temp->tempid?>" type="submit">Delete</button>    
             </td>
          </tr>
           <?php } ?>
          <tr>
            <th colspan="1">Package Description</th><td colspan="4"><textarea class="form-control" name="description" id="description" style="resize: none;" cols="80"></textarea></td>  
          </tr>
          <tr>
           <th colspan="3">Create Package Price: </th><td>&#8369;<input type="text" name="packageprice" id= "packageprice" onkeypress="return isNumberKey(event)"></td>
           <td><button class="btn-primary" id="save">Save</button></td>
          </tr>
        </tbody>
      </table>
          <div id="largeImgPanel" onclick="this.style.display='none'">
          <p id="demo">asdsad</p>
            <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />     
          </div>  
        </div>
      <button id="modalshow" hidden="">asd</button>
    </div>
  </div>
</section>

</section>
<div id="largeImgPanel" onclick="this.style.display='none'">
          <p id="demo">asdsad</p>
            <img id="largeImg" style="width:70%;height:80%;margin:50px; padding:0;" />
            
          </div> 