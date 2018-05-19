<?php

//error_reporting(0);
include ("connect.php");

//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


//$strSQL ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.exa_id = '".$_GET["exa_id"]."'";
//$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
$strSQL1 ="SELECT * FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id) WHERE checkname_score.regis_section = '".$_GET["sub_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");
$objResult1 = mysqli_fetch_array($objQuery1);
 $strSQL ="SELECT * FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id)  WHERE checkname_score.regis_section = '".$_GET["sub_id"]."' GROUP BY checkname_score.std_id ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);

$strSQL12 ="SELECT * FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id) WHERE checkname_score.regis_section = '".$_GET["sub_id"]."' ";
$objQuery12 = mysqli_query($con,$strSQL12) or die ("Error Query [".$strSQL12."]");
$objResult12 = mysqli_fetch_array($objQuery12);

$strSQL3 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$strSQL1 ="SELECT DISTINCTROW student.std_number,student.std_name,student.std_lname,checkname_score.score FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id) WHERE checkname.regis_section = '".$_GET["sub_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");


//$strSQL10 ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination.exa_id = '".$_GET["exa_id"]."'";
//$objQuery10 = mysqli_query($con,$strSQL10) or die ("Error Query [".$strSQL10."]");



$strSQL5 = "SELECT COUNT(DISTINCT checkname_score.cn_id) as countnum FROM checkname_score WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$strSQL6 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");

$strSQL5 = "SELECT COUNT(DISTINCT checkname_score.cn_id) as countnum FROM checkname_score WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);


function renderScore($txt){
  switch ($txt) {
    case 1: return  
  
     "<font color=\"green\">มา</font>";
    break;
    case 2: return 
  "<font color=\"red\">สาย</font>";
    break;
    case 3: return 
      "<font color=\"red\">ลา</font>";
    break;
    case 4: return 

  "<font color=\"red\">ขาด</font>";
    break;
  
  }
}
$output = '';
if(isset($_POST["export"]))
{
  $output .= '


                        
<table class="table table-bordered" border="1">
  <tr>
     <th > ลำดับ </th>
    <th > รหัสนักศึกษา </th>
    <th >ชื่อ-นามสกุล </th>
   ';
 ?>
    <?php 
 $x=1;
    while($objResult6 = mysqli_fetch_array($objQuery6))
    {
  $output .= ' 
<th>คาบที่'.$x.'</th>
  ';
   ?>
  <?php 
    $x++;
}
 $output .= '

<th > <div align="center">มา/ครั้ง </div></th>
  <th > <div align="center">สาย/ครั้ง </div></th>
  <th > <div align="center">ลา/ครั้ง </div></th>
    <th > <div align="center">ขาด/ครั้ง </div></th>


  </tr>
';
 ?>
   <?php
  $j=1;
  
 while ($objResult = mysqli_fetch_array($objQuery))
  
{

$strSQL160 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
  $objQuery160 = mysqli_query($con,$strSQL160) or die ("Error Query [".$strSQL160."]");
  $p3 = mysqli_fetch_array($objQuery160);
  $strSQL161 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='1' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery161 = mysqli_query($con,$strSQL161) or die ("Error Query [".$strSQL161."]");
  $p13 = mysqli_fetch_array($objQuery161);

  $strSQL162 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='2' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery190 = mysqli_query($con,$strSQL162) or die ("Error Query [".$strSQL162."]");
  $p14 = mysqli_fetch_array($objQuery190);

  $strSQL163 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='3' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery191 = mysqli_query($con,$strSQL163) or die ("Error Query [".$strSQL163."]");
  $p15 = mysqli_fetch_array($objQuery191);
$strSQL164 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='4' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery192 = mysqli_query($con,$strSQL164) or die ("Error Query [".$strSQL164."]");
  $p16 = mysqli_fetch_array($objQuery192);
   ?>
   <?php $output .= '
  <tr>
  <td>'.$j.'</td>
   <td>'.$objResult["std_number"].'</td>

<td>'.$objResult["std_name"].'  '.$objResult["std_lname"].'</td>
';
?>

  <?php 
  $strSQL6 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
  $objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");
    while ($p2 = mysqli_fetch_array($objQuery6)) {
  ?>
 
    <?php
      $score = mysqli_fetch_array(mysqli_query($con,"SELECT score FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' AND cn_id = '".$p2["cn_id"]."' "));
$output .= '
       <td>'.renderScore($score[0]).'</td>
       ';
    ?>
  
  <?php
    }
  ?>
  <?php 

  $output .= '

   <td>'.$p13["score2"].'</td>
   <td>'.$p14["score2"].'</td>
   <td>'.$p15["score2"].'</td>
   <td>'.$p16["score2"].'</td>


  </tr> ';
$j++;
 }
$output .= '</table>';

?>
 
  
<?php



}


 header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=การเข้าเรียน.xls');
  echo $output;
?>