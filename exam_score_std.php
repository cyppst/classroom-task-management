<?php
error_reporting(0);
//error_reporting(0);
include ("connect.php");
include ("header_student.php");

//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


$strSQL ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.exa_id = '".$_GET["exa_id"]."' ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);


$strSQL3 = "SELECT SUM(exa_score) as score3 FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$strSQL1 ="SELECT DISTINCTROW student.std_number,student.std_name,student.std_lname FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination.regis_section = '".$_GET["sub_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");
$objResult1 = mysqli_fetch_array($objQuery1);

$strSQL10 ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination.exa_id = '".$_GET["exa_id"]."'";
$objQuery10 = mysqli_query($con,$strSQL10) or die ("Error Query [".$strSQL10."]");


$strSQL6 ="SELECT student.std_id,student.std_number,student.std_name,student.std_lname,SUM(ex_list_score) as score FROM examination_list Left join student ON (examination_list.std_id=student.std_id)  WHERE examination_list.regis_section = '".$_GET["sub_id"]."' AND  student.std_id = '".$_SESSION['UserID']."' GROUP BY student.std_id ";
$objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");
//$objResult6 = mysqli_fetch_array($objQuery6);


$strSQL13 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery13 = mysqli_query($con,$strSQL13) or die ("Error Query [".$strSQL13."]");



?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลสอบ&nbsp;/&nbsp;คะแนนการสอบ</h4></li>
  
</ol>
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
 <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การเข้าเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                 
                      <li><a href="cn_frm_score_std.php?sub_id=<?=$objResult2["sub_id"]?>">สรุปการเข้าเรียน</a></li>
                    </ul>

                

                  <div class="btn-group">
                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การส่งงาน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                         <li><a href="work_line_std.php?sub_id=<?=$objResult2["sub_id"]?>">เช็คงาน</a></li>
                        <li><a href="work_score_std.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การสอบ <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">

                       <li><a href="exam_score_std.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    ผลการเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="score_show_std.php?sub_id=<?=$objResult2["sub_id"]?>">คะแนนทั้งหมด</a></li>
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
                           <form name="frmMain" method="get" action="#">
<table class="table table-bordered" border="1">
  <tr>
    <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
   
     <?php 
 $x=1;
    while($objResult13 = mysqli_fetch_array($objQuery13))
    {

      ?>
    <th > <div align="center"> สอบครั้งที่ <?php 

  echo $x; 

  ?>(<?php 

echo  ($objResult13["exa_score"]); 

  ?>)</div></th>
   
  <?php 
    $x++;
}
?>
   
  <th > <div align="center">คะแนนรวม (<?php 

echo  ($objResult3["score3"]); 

  ?>)</div></th>

  
  <th ></th>

  </tr>

 
   <?php
  $i=1;
  
 while ($objResult6 = mysqli_fetch_array($objQuery6))
  
{

   ?>
  <tr>
    <td align="center"> <?php 

  echo $i; 

  ?></td>
    <td>
  <?php 

  echo ($objResult6["std_number"]); 

  ?>
  </td>


   

<td>

<?php

  echo ($objResult6["std_name"]); 

  ?>&nbsp;&nbsp;<?php

  echo ($objResult6["std_lname"]); 

  ?></div>
  </td>

 <?php 
  $strSQL60 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
  $objQuery60 = mysqli_query($con,$strSQL60) or die ("Error Query [".$strSQL60."]");
    while ($p2 = mysqli_fetch_array($objQuery60)) {
  ?>
  <td align="center">
    <?php
      $score13 = mysqli_fetch_array(mysqli_query($con,"SELECT ex_list_score FROM examination_list WHERE std_id = '".$objResult6["std_id"]."' AND exa_id = '".$p2["exa_id"]."' "));
      echo $score13[0];
    ?>
  </td>
  <?php
    }
  ?>


<td>
  <?php 
 
  echo ($objResult6["score"]); 


  ?>
   
  </td>

<td></td>
   
  </tr>

<?php
$i++;
}

?>

</table>
  <a href="exam_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
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