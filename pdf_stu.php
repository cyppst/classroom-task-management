<?php


include ("connect.php");
include ("header.php");

//include();

	$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
	$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

	$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
	$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysqli_fetch_assoc($objQuery2);
?>

<?php

	$sql = "SELECT * FROM `subject`";
	$q = mysqli_query($con,$sql);
	$qr = mysqli_fetch_assoc($q);

?>

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--css ปุ่ม--> 
<style type="text/css" media="screen">

  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

    .btn{
      width: 250pt;
      height:50pt; 

            box-shadow:20px 20px 50px 0px #cccccc;
        }
       .btn:hover{
          color: #cc0000;
          cursor: pointer;
        }

      
</style> 
<!----> 
<script type="text/javascript">
	function smi(){
         document.f1.submit();
	}

</script>
<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>ออกรายงาน</h4></li>
  
</ol>
 <hr>

<?php

$excc=0;

if(isset($_FILES["excf"]["name"])){

$target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["excf"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_FILES["excf"]["name"])) {
    if (move_uploaded_file($_FILES["excf"]["tmp_name"], $target_file)) {
      $excc=1;
      $icheet = $_POST["icheet"];
    }
}

}


?>








<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
      
        <button type="button" name="xx" value="xx" onclick="smi()" class="btn btn-primary">แสดงผล</button>
      </div>
    </div>
  </div>
</div>
<?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {
    $strKeyword = $_POST["txtKeyword"];

  }

  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {

  $strKeyword = $_POST["txtKeyword"];
  }
   $tech_id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM subject WHERE tech_id = '".$_SESSION['UserID']."' and subject.sub_year LIKE '%".$strKeyword."%' ";
    $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
?>
       
  			<div class="content">
                <div class="container-fluid">
                    <div class="card">
                    	<div class="card-body">

                    		<br>  <br>  <br>  <br>  <br>  <br>
                        <center>
<a href="pdf_cn.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;รายงานคะแนนการเข้าเรียน</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="pdf_report_work.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp; รายงานคะแนนการส่งงาน</button></a>
</center>
<br><br>
<center>
<a href="pdf_report_exa.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"> <i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;รายงานคะแนนการสอบ</button></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="testdf.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"> <i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;รายงานคะแนนผลการเรียน</button></a>
</center>

               
                        </div>
                        <div class="card-body">		


  <br>  <br>  <br>  <br>  <br>  <br>
<input type="hidden" value="<?=$maxid?>" name="maxid">
<div style="padding:10px;">
</div>
						</div>
                    </div>
                </div>

            </div>
            
            
<?php
include ("footer.php"); 
?>