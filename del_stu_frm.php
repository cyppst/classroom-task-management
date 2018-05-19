<?php
include ("connect.php");
include ("header.php");

$strSQL = "DELETE FROM student ";
$strSQL .="WHERE std_id = '".$_GET["std_id"]."' ";
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
            window.location.href = "main_stu.php";
      } 
});
        </script>