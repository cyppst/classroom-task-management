<?php


include ("connect.php");
include ("header.php");
$sub_id=$_GET["sub_id"];
$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);

	if(isset($_GET['id']))
	{
		$id = $_GET['cn_id'];
		$sql_show = "select * from checkname where cn_id = ".$cn_id." ";
		$result_show = mysqli_query($con,$sql_show) or die(mysql_error());
		$data = mysqli_fetch_assoc($result_show);										
	}

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE checkname SET ";
$strSQL .="cn_date = '".$_POST["cn_date"]."' ";
$strSQL .="WHERE cn_id = '".$_POST["cn_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{

 
?>
		<script> 
			swal({
 				title:"",
 				text: "แก้ไขข้อมูลคาบเรียนเรียบร้อยแล้ว",
 				type: "success",
 				confirmButtonClass: "btn-info",
 				confirmButtonText: "ตกลง",
 				closeOnConfirm: false
		}, function(isConfirm){
    			if (isConfirm) {     
       			window.location.href = "cn_data.php?sub_id=<?=$sub_id;?>";
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