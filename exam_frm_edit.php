<?php

//error_reporting(0);
include ("connect.php");
include ("header.php");
$exa_id=$_GET["exa_id"];
$sub_id=$_GET["sub_id"];
//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];

$strSQL ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.exa_id = '".$_GET["exa_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);


$strSQL3 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);



$strSQL5 = "SELECT * FROM examination WHERE exa_id = '".$_GET["exa_id"]."' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL3."]");
$objResult5 = mysqli_fetch_array($objQuery5);

?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลการสอบ&nbsp;/&nbsp;แก้ไขคะแนนหัวข้อการสอบ"<?php 

 echo ($objResult5["exa_name"]); 

  ?>"</h4></li>
  
</ol>

<script type="text/javascript">
$(document).ready(function(){
  var body = $("#scoring tr td:nth-child(4)"),
  title_full = <?php echo $objResult5["exa_score"]; ?>;   
  $("input:text",body).keyup(function(){
    if(!$(this).val().match("^([\+\-]?[0-9]*[\.]?[0-9]?[0-9]?)$")){
      $(this).val('');    
    }
    if($(this).val() > title_full ){ alert('คะแนน '+$(this).val()+' เกินค่ะ'); $(this).focus(); $(this).val('');}         
  });
});
</script>
 <hr>

        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
                            <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
                         <p class="card-title">Section : <?php echo $objResult2["section"];?></p>
                            <hr>

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
                      <li><a href="exam_score.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    ผลการเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="score_total.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="score_show.php?sub_id=<?=$objResult2["sub_id"]?>">คะแนนทั้งหมด</a></li>
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
                           <form name="frmMain" method="post" action="exam_frm_update.php?exa_id=<?=$exa_id?>&sub_id=<?=$sub_id?>">
<table class="table table-bordered" id="scoring" border="1">
  <tr>
    <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
  <th > <div align="center">คะแนนที่ได้ (<?php
echo ($objResult5["exa_score"]); 
    ?>)</div></th>
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
<input type="hidden" name="exa_id[]" value="<?php
  
  echo($objResult["exa_id"]);
  
    
    ?>">
<input type="hidden" name="ex_list_id[]" value="<?php
  
  echo($objResult["ex_list_id"]);
  
    
    ?>">
<input type="hidden" name="std_id[]" value="<?php
  
  echo($objResult["std_id"]);
  
    
    ?>">
<?php

  echo ($objResult["std_name"]); 

  ?>&nbsp;&nbsp;<?php

  echo ($objResult["std_lname"]); 

  ?></div>
  </td>

  <td align=center><input type="text" name="std_name[]" value="<?php
  
  echo($objResult["ex_list_score"]); 
  
    
    ?>" maxlength="5" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" >

  </td>

<td></td>
  </tr>
<?php
$i++;
}


?>
 
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  
</table>
<center>
<a href="exam_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
  <button type="submit" class="btn btn-primary">บันทึก</button></td>
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