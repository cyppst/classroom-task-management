<?php

error_reporting(0);
include ("connect.php");
include ("header.php");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);
$sub=$_GET["sub_id"];
	if(isset($_GET['id']))
	{
		$id = $_GET['exa_id'];
		$sql_show = "select * from examination where exa_id = ".$exa_id." ";
		$result_show = mysqli_query($con,$sql_show) or die(mysql_error());
		$data = mysqli_fetch_assoc($result_show);										
	}

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE examination SET ";
$strSQL .="exa_name = '".$_POST["exa_name"]."' ";
$strSQL .=",exa_score = '".$_POST["exa_score"]."' ";
$strSQL .="WHERE exa_id = '".$_POST["cn_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{

  ?>

<script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลสำเร็จ",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "exam_data.php?sub_id=<?php echo $sub; ?>";
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