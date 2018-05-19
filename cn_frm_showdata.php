<?php
error_reporting(E_ALL);

include ("connect.php");
include ("header.php");
$cn_id=$_GET["cn_id"];
//include();

$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
  $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

  $strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);


$strSQL3 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_assoc($objQuery3);
$time=$objResult3["cn_date"];

$strSQL5 ="SELECT * FROM checkname WHERE cn_id = '".$_GET["cn_id"]."'";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL."]");
$objResult5 = mysqli_fetch_array($objQuery5);

?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลคาบเรียน&nbsp;/&nbsp;จัดการคาบวันที่<?php 

 echo thaidate($objResult5["cn_date"]);?> </h4></li>
  
</ol>
 <hr>

        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
                            <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
                             <p class="card-title">Section : <?php echo $objResult2["section"];?></p>
                  
                        </div>

                        <div class="card-body">
                           
                <div class="container">
                <div class="btn-group">

                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">นักศึกษา<span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                      <li><a href="regis_stu.php?sub_id=<?=$objResult2["sub_id"]?>">ตรวจสอบนักศึกษา</a></li>
                    </ul>

                 <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การเข้าเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cn_frm.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="cn_frm_score.php?sub_id=<?=$objResult2["sub_id"]?>">สรุปการเข้าเรียน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การส่งงาน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                     <li><a href="send_work.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                    <li><a href="work_line.php?sub_id=<?=$objResult2["sub_id"]?>">เช็คงาน</a></li>
                      <li><a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="work_score.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การสอบ <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="exam.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="exam_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    ผลการเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="score_total.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="score_show.php?sub_id=<?=$objResult2["sub_id"]?>">คะแนนทั้งหมด</a></li>
                    </ul>
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


  


<form name="frmMain" method="post" action="cn_frm_insert.php?cn_id=<?=$cn_id?>&sub_id=<?=$objResult2["sub_id"]?>">
<table class="table table-bordered" border="1">
  <tr>
  <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
  <th > <div align="center">มา </div></th>
    <th > <div align="center">สาย </div></th>
  <th > <div align="center">ลา </div></th>
<th > <div align="center">ขาด </div></th>
<th ></th>
  </tr>
 <?php
 $i=1;
   while($objResult = mysqli_fetch_array($objQuery))
{
   ?>
  <tr>
     <td><div align="center">
  <?php

  echo $i; 

  ?>
  </div></td>
    <td><div align="center">
  <?php

  echo ($objResult["std_number"]); 

  ?>
  </div></td>


   

<td>
<input type="hidden" name= "sub_id[]" value="<?php echo($objResult2["sub_id"]);?>">
<input type="hidden" name="std_id[]" value="<?php echo($objResult["std_id"]);?>">
<?php 

  echo ($objResult["std_name"]); 

  ?>&nbsp;&nbsp;<?php 

  echo ($objResult["std_lname"]); 

  ?></div>
  </td>

  <td align=center><input type="radio" name="std_name[]_<?php echo $i;?>" id="std_name<?php echo $i;?>" value="1" required></td>
 <td align=center><input type="radio" name="std_name[]_<?php echo $i;?>" id="std_name<?php echo $i;?>" value="2" required></td>
     <td align=center><input type="radio" name="std_name[]_<?php echo $i;?>" id="std_name<?php echo $i;?>" value="3" required></td>           
    <td align=center><input type="radio" name="std_name[]_<?php echo $i;?>" id="std_name<?php echo $i;?>" value="4" required></td>
<td align=center></td>
  </tr>

<?php
$i++;

}


?>




</table>
  <center>

<a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
<a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="submit" class="btn btn-primary">บันทึก</button></a>
  </center>
</form>

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