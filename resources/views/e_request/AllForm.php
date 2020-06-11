<?php
  include_once ("../../connection/DB-connection.php");
  $db = new Database();
  $con=$db->dbConnection();
  session_start();
if(!isset($_SESSION['userid'])){
 return;
}
  if(isset($_GET['value'])){
    $sr=$_GET['value'];
    if(strlen($sr)>0){
      $wh="and lower(name_kh) LIKE '%".strtolower($sr)."%'";
    }else{
      $wh="";
    }
    $sql="SELECT id,name_kh,file_name FROM e_request_form where status='t' ".$wh;
    $formName=$con->prepare($sql);
    $formName->execute();
    if($formName->rowCount()>0){
      while($row=$formName->fetch(PDO::FETCH_ASSOC)){
        $name="'".$row['name_kh']."'";
        $id="'".$row['id'].",".$row['file_name']."'";
        echo '<a class="dropdown-item during showformitems" href="javascript:void(0);" onclick="ShowForm('.$id.','.$name.')">'.$row['name_kh'].'</a>';
      }
    }else{
      echo '<a class="dropdown-item during showformitems text-danger" href="javascript:void(0);">Not Found !!!!!</a>';
    }
    return;
  }
?>
<style>
 .dropbtn {
  /* background-color: #4CAF50; */
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<div class="container-fluid" >
  <div class='col-md-12' style="margin-top:10px;" style="">
    <div class="row">
        <div class="col-md-3">
            <p class="chooseForm"><img src="storage/img/hand.png" alt="" width="40px" height="40px"> ជ្រើសរើសសំណើ :</p>
        </div>        
        <div class="col-md-4" style="width: 100%">
          <div class="dropdown" style="width: 100%">
            <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" onclick="dropdownsearchallform()" style="width: 100%">
                Dropdown button
            </button> -->

            <div class="input-group mb-3">
                <input type="text" class="form-control searchAllForm" placeholder="Please Select Form....." onclick="dropdownsearchallform()" onkeyup="dropdownsearchallformkeyup(this.value)" id="searchallform" autocomplete="off">
                <div class="input-group-append">
                <span class="input-group-text" onclick="dropdownsearchallform()"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="dropdown-menu " id="dropdownsearchallform" >
              <?php 
                $sql="SELECT id,name_kh,file_name FROM e_request_form where status='t'";
                $formName=$con->prepare($sql);
                $formName->execute();
                if($formName->rowCount()>0){
                  while($row=$formName->fetch(PDO::FETCH_ASSOC)){
                    // if($row[''])
                    $name="'".$row['name_kh']."'";
                    $id="'".$row['id'].",".$row['file_name']."'";
                    echo '<a class="dropdown-item during showformitems" href="javascript:void(0);" onclick="ShowForm('.$id.','.$name.')">'.$row['name_kh'].'</a>';
                  }
                }

              ?>    
            </div>
          </div>
        </div>
    </div>
    <!-- <div style="width:100%;height:5px;background:#1fa8e0"></div> -->
    <div id="dropdownFormshow" class="during">
      <?php 
        // include_once();
      ?>
    </div>
  </div>
<!-- </div> -->