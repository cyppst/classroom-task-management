<?php


include ("connect.php");
include ("header_admin.php");


  if(isset($_GET['id']))
  {
    $id = $_GET['se_id'];
    $sql_show = "select * from semester where se_id = ".$se_id." ";
    $result_show = mysqli_query($con,$sql_show) or die(mysql_error());
    $data = mysqli_fetch_assoc($result_show);                   
  }

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE semester SET ";
$strSQL .=" semester_name = '".$_POST["su_no"]."' ";
$strSQL .=",semester_year = '".$_POST["su_name"]."' ";
$strSQL .="WHERE semester_id = '".$_GET["se_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{
?>
 <script> 
      swal({
        title:"",
        text: "เแก้ไขข้อมูลปีการศึกษาเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "semester_admin.php";
      } 
});
        </script>
<?php
}
else
{
    echo "Error Save [".$strSQL."]";
}


}


?>






<?php if($chsave==1){ ?>
<script type="text/javascript">
    $(window).on('load',function(){
     
        $('#exampleModal').modal('show');
      
    });
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><u>ผลการทำงาน</u></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <font color="green">บันทึกข้อมูลการแก้ไขได้สำเร็จ</font>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>





<?php }?>

<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="semester_admin.php">ปีการศึกษา</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมูลปีการศึกษา</li>
</ol>


      <div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">รายละเอียดปีการศึกษา</h4>
                                            <hr>
                                        </div>

                                    <div class="card-body">      

                                         <form action="?se_id=<?php echo $_GET["se_id"];?>" name="frmEdit" method="post">
                    
                    <?php
                      $strSQL = "SELECT * FROM semester WHERE semester_id = '".$_GET["se_id"]."' ";
                      $objQuery = mysqli_query($con,$strSQL);
                      $objResult = mysqli_fetch_assoc($objQuery);
                      if(!$objResult)
                      {
                        echo "Not found ID=".$_GET["se_id"];
                      }
                      else
                      {
                    ?>

                            <div class="row">
                                        <div class="col-md-6 pr-1">
                                          <div class="form-group">
                                              <label>ภาคเรียน</label>
                    <input type="text" class="form-control" name="su_no" value="<?php echo $objResult["semester_name"];?>" placeholder="กรอกรหัสภาคเรียน">
                                          </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ปีการศึกษา</label>
                    <input type="text" class="form-control" name="su_name"  value="<?php echo $objResult["semester_year"];?>" placeholder="กรอกชื่อปีการศึกษา" maxlength="13" required>
                                            </div>
                                        </div>
                                        </div>

                
                                     

                    <hr>
        

<center>
<a href="semester_admin.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
  <input type="submit" name="submit" value="อัพเดต" class="btn btn-info btn-fill pull">   
</center>
                                        <?php
                        }
                      
                    ?>

                          </form>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
                </div>
            </div>

                  
<?php

include ("footer.php");

?>