<!DOCTYPE html>
<html lang="th">
<?php
include ("connect.php");
include ("header.php");
//include "connect.php";
?>
<head>
  <meta charset="utf-8">
 
  <title>ระบบบริหารจัดการเรียนการสอน สาขาวิทยาการคอมพิวเตอร์</title>





</head>


  <div class="content-wrapper">
    <div class="container-fluid">
  <?php
  $strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";//23-26
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);
  $sub= $objResult2["sub_id"];
  $id="";
 
      $strSQL = "INSERT INTO checkscore ";
      $strSQL .="(cs_id,regis_section,score) ";
      $strSQL .="VALUES ";
      $strSQL .="('".$id."','".$_GET["sub_id"]."', ";
      $strSQL .="'".$_POST["text_score"]."') ";
      $objQuery = mysqli_query($con,$strSQL);
 
if($objQuery)
{


?>
    <script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลคะแนนคาบเรียนเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "cn_frm.php?sub_id=<?=$sub;?>";
      } 
});
        </script>
        
 <?php



}
else
{
  echo "Error Save [".$strSQL."]";
}

?>
   </div>
        </div>
        <div class="card-footer small text-muted"> </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
