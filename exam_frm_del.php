<?php
include ("connect.php");
include ("header.php");


$strSQL = "DELETE FROM examination ";
$strSQL .="WHERE exa_id = '".$_GET["exa_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);

$strSQL2 = "DELETE FROM examination_list ";
$strSQL2 .="WHERE exa_id = '".$_GET["exa_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2);

$strSQL3 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_assoc($objQuery3);


 ?>

<script> 
      swal({
        title:"",
        text: "ลบข้อมูลสำเร็จ",
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