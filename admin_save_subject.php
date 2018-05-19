<?php
include ("connect.php");
include ("header_admin.php");
$MEMBERNO = $_REQUEST["name"];
	 
	//Check MEMBERNo for dupplicate 		
	$check = "SELECT * FROM subjected  WHERE  su_no = '$MEMBERNO'";
	$result = mysqli_query($con,$check);
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
             ?>
 <script> 
      swal({
        title:"",
        text: "รหัสนี้ใช้ไปแล้ว",
        type: "warning",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "subjected.php";
      } 
});
        </script>
<?php
 
		}else{
    $id="";
$strSQL = "INSERT INTO subjected ";
$strSQL .="(su_id,su_no,su_name) ";
$strSQL .="VALUES ";
$strSQL .="('".$id."' ";
$strSQL .=",'".$_POST["name"]."','".$_POST["lname"]."') ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
if($objQuery){
  ?>
 <script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลรายวิชาเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "subject_admin.php";
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
    

      
