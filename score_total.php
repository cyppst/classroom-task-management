<?php


include ("connect.php");
include ("header.php");
//$work_id=$_GET["work_id"];
//$sub_id=$_GET["sub_id"];
//include();


$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
 

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
 $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);


$strSQL3 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$strSQL8 = "SELECT SUM(exa_score) as score_exa FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery8 = mysqli_query($con,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);

$strSQL4 = "SELECT SUM(work_score) as score_work FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");
$objResult4 = mysqli_fetch_array($objQuery4);

$time=$objResult3["cn_date"];

$strSQL22 = "SELECT * FROM checkscore WHERE regis_section = '".$_GET["sub_id"]."' ";
 $objQuery22 = mysqli_query($con,$strSQL22) or die ("Error Query [".$strSQL22."]");
  $objResult22 = mysqli_fetch_assoc($objQuery22);

$strSQL6 ="SELECT student.std_number,student.std_name,student.std_lname,SUM(ex_list_score) as score FROM examination_list Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.regis_section = '".$_GET["sub_id"]."' GROUP BY student.std_id ";
$objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");
$objResult6 = mysqli_fetch_array($objQuery6);

$strSQL7 ="SELECT student.std_id,student.std_number,student.std_name,student.std_lname,SUM(score) as score2 FROM work_score Left join student ON (work_score.std_id=student.std_id)  WHERE work_score.regis_section = '".$_GET["sub_id"]."' GROUP BY student.std_id ";
$objQuery7 = mysqli_query($con,$strSQL7) or die ("Error Query [".$strSQL7."]");
 


?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>ผลการเรียน&nbsp;/&nbsp;จัดการคะแนนรวม</h4></li>
  
</ol>
 <hr>
<script type="text/javascript">
$(document).ready(function(){
  var body = $("#scoring tr td:nth-child(4)"),
  title_full = <?php echo $objResult22["score"]; ?>;   
  $("input:text",body).keyup(function(){
    if(!$(this).val().match("^([\+\-]?[0-9]*[\.]?[0-9]?[0-9]?)$")){
      $(this).val('');    
    }
    if($(this).val() > title_full ){ alert('คะแนน '+$(this).val()+' เกินค่ะ'); $(this).focus();  $(this).val('0');  }         
  });
});
</script>
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
                      <li><a href="exam_score.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a></li>
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


  <a href="score_edit.php?sub_id=<?=$objResult2["sub_id"]?>" class="btn btn-info" ><p class="glyphicon glyphicon-plus-sign"> แก้ไขข้อมูลคะแนน</p></a> 
  <hr>
<form name="frmMain" method="post" action="score_insert.php?sub_id=<?=$objResult2["sub_id"]?>">
<table class="table table-bordered" id="scoring"  border="1">
  <tr>
    <th width="1"> <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
    <th > <div align="center">คะแนนเช็คชื่อ (<?php 

echo  ($objResult22["score"]);  

  ?>) </div></th>
    <th > <div align="center">คะแนนส่งงาน(<?php 

echo  ($objResult4["score_work"]); 

  ?>) </div></th>
    <th > <div align="center">คะแนนสอบ (<?php 

echo  ($objResult8["score_exa"]); 

  ?>)</div></th>
<?php
$sco=$objResult4["score_work"];
$sco2=$objResult8["score_exa"];
$sco3=$objResult22["score"];
$total1=$sco+$sco2;
$total=$total1+$sco3;
?>
  <th > <div align="center">คะแนนรวม (<?php 

echo  $total; 

  ?>)</div></th>
    <th></th>
  </tr>
 <?php

$i=1;
   while($objResult7 = mysqli_fetch_array($objQuery7))
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

  echo ($objResult7["std_number"]); 

  ?>
  </div></td>


   

<td>
<input type="hidden" name="std_id[]" value="<?php
  
  echo($objResult7["std_id"])
  
    
    ?>">
<?php

  echo ($objResult7["std_name"]); 

  ?>&nbsp;&nbsp;<?php

  echo ($objResult7["std_lname"]); 

  ?></div>
  </td>
 <?php
$strSQL14 = "SELECT * FROM criteria WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery14 = mysqli_query($con,$strSQL14) or die ("Error Query [".$strSQL14."]");
$objResult14 = mysqli_fetch_array($objQuery14);
 ?>
 <?php

 if($objResult14['regis_section']!=""){

  ?>
<td align=center>
  <?php

   $score1 = mysqli_fetch_array(mysqli_query($con,"SELECT cn_score FROM criteria WHERE std_id = '".$objResult7["std_id"]."' and regis_section = '".$_GET["sub_id"]."' "));
 echo $score1[0]; 

  ?>
</td>

  <?php
} else if($objResult14['regis_section']==""){
 ?>
  <td align=center><input type="text" name="std_name[]" value="" size="2" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></td>

  <?php
}
  ?>
<?php
$id_std = $objResult7["std_number"];
$id_std2 = $objResult6["std_number"];



  ?>


<td align=center>


  <?php

  

  echo ($objResult7["score2"]); 


  ?>
   

  </td>
  

 <?php 



  ?>

<td align=center><?php

   $score = mysqli_fetch_array(mysqli_query($con,"SELECT sum(ex_list_score) FROM examination_list WHERE std_id = '".$objResult7["std_id"]."' and regis_section = '".$_GET["sub_id"]."' "));
 echo $score[0]; 

  ?>
    


  </td>
 <?php
    
  ?>
  <td align=center>
    
<?php

  $score1=$score[0];
  $score2=$objResult7["score2"];
  $total=$score1+$score2;
 
echo $total;
  ?>
<input type="hidden" name="total[]" value="<?php
  
  echo $total;
  
    
    ?>">
  </td>


  <td></td>
  </tr>
<?php


$i++;
}

?>


 
</table>
  <center>
 <a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
 <?php
$strSQL14 = "SELECT * FROM criteria WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery14 = mysqli_query($con,$strSQL14) or die ("Error Query [".$strSQL14."]");
$objResult14 = mysqli_fetch_array($objQuery14);
 ?>
 <?php

 if($objResult14['regis_section']==""){

  ?>
 <button type="submit" class="btn btn-primary" > บันทึก</button>

 <?php
} else if($objResult14['regis_section']!=""){
 ?>
 <button type="submit" class="btn btn-primary" disabled> บันทึก</button>
 <?php
}
 ?>
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