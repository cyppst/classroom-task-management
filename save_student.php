<?php
include ("connect.php");
include ("header.php");
$MEMBERNO = $_REQUEST["text_plain"];

	//Check MEMBERNo for dupplicate
	$check = "SELECT * FROM student  WHERE  std_number = '$MEMBERNO'";
	$result = mysqli_query($con,$check);
	$num=mysqli_num_rows($result);
        if($num > 0)
        {
  ?>
 <script>
      swal({
        title:"",
        text: "รหัสนักศึกษาถูกใช้ไปแล้ว !!!",
        type: "warning",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {
            window.location.href = "stu_add.php";
      }
});
        </script>
<?php
		}else{
    $id="";
$strSQL = "INSERT INTO student ";
$strSQL .="(std_number,std_group,std_name,std_lname,std_phone,std_line,std_pass) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["text_plain"]."','".$_POST["tech_pass"]."','".$_POST["name"]."' ";
$strSQL .=",'".$_POST["lname"]."','".$_POST["tech_lname"]."','".$_POST["tech_phone"]."','".$_POST["text_plain"]."') ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
if($objQuery){
            ?>
 <script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลนักศึกษาเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {
            window.location.href = "main_stu.php";
      }
});
        </script>
<?php
}
else
{
  echo "Error Save [".$strSQL."]";
}
}
?>



