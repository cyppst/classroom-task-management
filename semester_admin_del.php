<?php
include ("connect.php");
include ("header_admin.php");


$strSQL = "DELETE FROM semester ";
$strSQL .="WHERE semester_id = '".$_GET["se_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);

 ?>
 <script> 
      swal({
        title:"",
        text: "ลบข้อมูลปีการศึกษาเรียบร้อยแล้ว",
        type: "error",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "semester_admin.php";
      } 
});
        </script>
