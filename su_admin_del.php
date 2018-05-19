<?php
include ("connect.php");
include ("header_admin.php");


$strSQL = "DELETE FROM subjected ";
$strSQL .="WHERE su_id = '".$_GET["su_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);

 
 ?>
 <script> 
      swal({
        title:"",
        text: "ลบข้อมูลวิชาเรียบร้อยแล้ว",
        type: "error",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "subject_admin.php";
      } 
});
        </script>