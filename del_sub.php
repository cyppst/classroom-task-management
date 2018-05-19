<?
session_start();

?>
<?php

include("connect.php");
include ("header.php");
$strSQL = "DELETE FROM subject ";
$strSQL .="WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);


?>
 <script> 
      swal({
        title:"",
        text: "ลบข้อมูลการลงทะเบียนเรียบร้อยแล้ว",
        type: "error",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "subject.php";
      } 
});
        </script>