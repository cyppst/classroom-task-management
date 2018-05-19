<?php
include ("connect.php");
include ("header_admin.php");


    $id="";
$strSQL = "INSERT INTO semester ";
$strSQL .="(semester_id,semester_name,semester_year) ";
$strSQL .="VALUES ";
$strSQL .="('".$id."' ";
$strSQL .=",'".$_POST["semester_name"]."','".$_POST["semester_year"]."') ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
if($objQuery){
 ?>
 <script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลปีการศึกษาเรียบร้อยแล้ว",
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

?>
    

      
