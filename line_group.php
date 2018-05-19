<!DOCTYPE html>
<html lang="en">
<head>
  <?php
include ("connect.php");
include ("header.php");
$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
 $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);
$strSQL ="SELECT * FROM  work Left join work_score ON (work.work_id=work_score.work_id) Left join student ON (work_score.std_id=student.std_id)  WHERE work.work_id = '".$_GET["work_id"]."' AND student.std_id  = '".$_GET["std_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
  $objResult = mysqli_fetch_assoc($objQuery);
  ?>
</head>
<body>
<div class="container-fluid">
  <div class="row content">
  <form class="form-horizontal" method="post">
  <fieldset>
    <legend>ระบบบริหารจัดการการเรียนการสอน Teaching Management System </legend>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >ข้อความ</label>

      <div class="col-lg-10">
        <input class="form-control" rows="3" id="textArea"  type="textarea" name="textArea" value="<?php 

  echo ($objResult["std_number"]);  

  ?>&nbsp;:&nbsp;<?php 

  echo ($objResult["std_name"]);  

  ?>&nbsp;ยังไม่ได้ส่งงานเรื่อง 
&nbsp;:&nbsp;<?php 
 echo ($objResult["work_name"]);

  ?>"
   ReadOnly>
        
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
     <button type="reset" class="btn btn-default" >   <A HREF="work_frm.php?sub_id=<?=$objResult2["sub_id"]?>&work_id=<?=$objResult["work_id"]?>" title="แจ้งไลน์" >ยกเลิก</A></button>
        <button type="submit" class="btn btn-primary" name="submit">ตกลง</button>
      </div>
    </div>
  </fieldset>
</form>
<?php 
if ($_POST) { 

//Setting
$lineapi = "8mQz6yGCpMIUnmoqIYIs9mxd07nKF7Zjz9MXsy8HteM";
//WZCuovV3GoFsFlcVMsvyNJnX2xkR86CkVBBcVQ6fP7G
//238q4OiH2k1A9qCA2Pq2V2FxOEpT2K9xt04D6vjrF61


$mms =  trim($_POST['textArea']);
   
   
   
date_default_timezone_set("Asia/Bangkok");
//line Send

$chOne = curl_init(); 
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
// SSL USE 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
//POST 
curl_setopt( $chOne, CURLOPT_POST, 1); 
// Message 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms"); 
//ถ้าต้องการใส่รุป ให้ใส่ 2 parameter imageThumbnail และimageFullsize
//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms&imageThumbnail=http://plusquotes.com/images/quotes-img/surprise-happy-birthday-gifts-5.jpg&imageFullsize=http://plusquotes.com/images/quotes-img/surprise-happy-birthday-gifts-5.jpg&stickerPackageId=1&stickerId=100"); 
// follow redirects 
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1); 
//ADD header array 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', ); 
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
//RETURN 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 
//Check error 
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); } 
else { $result_ = json_decode($result, true); 
echo "status : ".$result_['status']; echo "message : ". $result_['message']; } 
//Close connect 
curl_close( $chOne );      
}
?>
</div>
</div>
</body>
</html>
<?php
include ("footer.php"); 
?>