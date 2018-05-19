<?php
include ("connect.php");
include ("header.php");

$strSQL = "DELETE FROM registration ";
$strSQL .="WHERE regis_id = '".$_GET["regis_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);



  ?>

<script> 
      swal({
        title:"",
        text: "ลบข้อมูลนักศึกษาเรียบร้อยแล้ว",
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