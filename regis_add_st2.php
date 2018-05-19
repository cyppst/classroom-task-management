<?php

include ("connect.php");
include ("header.php");

//include();
error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
    $time = date("Y-m-d H:i:s");
$std_name = $_POST['std_name'];


?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                       
                          
                            <hr>
                        </div>

                         <div class="card-body">
                           
                <div class="container">
                <div class="btn-group">

                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">นักศึกษา<span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                      <li><a href="stu_view.php?sub_id=<?=$objResult2["sub_id"]?>">เพิ่มนักศึกษา</a></li>
                      <li><a href="regis_stu.php?sub_id=<?=$objResult2["sub_id"]?>">ตรวจสอบนักศึกษา</a></li>
                    </ul>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การเข้าเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cn_frm.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การส่งงาน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                     <li><a href="send_work.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การสอบ <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="exam.php">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="exam_show.php">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    ผลการเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="edit_stu.php">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="#">จัดการคะแนน</a></li>
                    </ul>
                  </div>
                </div>
              </div>
                        </div>
                        <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
                        <div class="card-body">   

 <?php
 $sub=$_GET["sub_id"];
    $id="";
for($j=0;$j<count($_POST['std_name']);$j++)
  {
      
    if($std_name[$j] != "")
    {
        
        
$strSQL = "INSERT INTO registration ";
$strSQL .="(regis_section,std_id,regis_date) ";
$strSQL .="VALUES ";
$strSQL .="('".$_GET["sub_id"]."','".$_POST['std_name'][$j]."','$time') ";
$objQuery = mysqli_query($con,$strSQL);
    } 

  }

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
            window.location.href = "subject.php?sub_id=<?php echo $sub; ?>";
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
            </div>
                    </div>
                </div>
            </div>
<?php
include ("footer.php"); 
?>
<?php
     function thaidate($tDate) //แปลงวันที่เป็นวันที่ไทย
  {
    $y = substr($tDate, 0, 4) + 543;
    $m = substr($tDate, 5, 2);
    $d = substr($tDate, 8, 9);
    if ($tDate == "")
    {
      return "";
    } else
    {
      return $d . "/" . $m . "/" . $y;
    }
  }
?>