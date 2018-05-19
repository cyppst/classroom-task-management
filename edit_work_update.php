<?php


include ("connect.php");
include ("header.php");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);
  $sub= $objResult2["sub_id"];
	if(isset($_GET['id']))
	{
		$id = $_GET['work_id'];
		$sql_show = "select * from work where work_id = ".$work_id." ";
		$result_show = mysqli_query($con,$sql_show) or die(mysql_error());
		$data = mysqli_fetch_assoc($result_show);										
	}

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE work SET ";
$strSQL .="work_name = '".$_POST["work_name"]."' ";
$strSQL .=",work_score = '".$_POST["work_score"]."' ";
$strSQL .="WHERE work_id = '".$_POST["cn_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{

  ?>

<script> 
      swal({
        title:"",
        text: "แก้ไขข้อมูลสำเร็จ",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "work_show.php?sub_id=<?php echo $sub; ?>";
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