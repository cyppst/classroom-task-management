<?php
include ("connect.php");
include ("header.php");


$strSQL = "DELETE FROM work ";
$strSQL .="WHERE work_id = '".$_GET["work_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);

$strSQL2 = "DELETE FROM work_score ";
$strSQL2 .="WHERE work_id = '".$_GET["work_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2);

$strSQL3 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_assoc($objQuery3);


  ?>

<script> 
      swal({
        title:"",
        text: "ลบข้อมูลการส่งงานเรียบร้อยแล้ว",
        type: "error",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "javascript:history.back(1)";
      } 
});
        </script>