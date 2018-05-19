<?php
include ("connect.php");
include ("header_admin.php");


$strSQL = "DELETE FROM teacher ";
$strSQL .="WHERE tech_id = '".$_GET["tech_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);

 ?>
 <script> 
      swal({
        title:"",
        text: "ลบข้มูลอาจารย์เรียบร้อยแล้ว",
        type: "error",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "tech_admin.php";
      } 
});
        </script>