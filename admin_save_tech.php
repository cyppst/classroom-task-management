<?php
include ("connect.php");
include ("header_admin.php");

    $id="";
$strSQL = "INSERT INTO teacher ";
$strSQL .="(tech_id,no,tech_name,tech_lname,tech_phone,tech_user,tech_pass) ";
$strSQL .="VALUES ";
$strSQL .="('".$id."','".$_POST["text_plain"]."','".$_POST["tech_pass"]."' ";
$strSQL .=",'".$_POST["name"]."','".$_POST["lname"]."','".$_POST["tech_lname"]."','".$_POST["tech_phone"]."') ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
if($objQuery){
   
 ?>
 <script> 
      swal({
        title:"",
        text: "เพิ่มข้อมูลอาจารย์เรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "tech_admin.php";
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
    

      
