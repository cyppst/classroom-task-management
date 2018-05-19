<?php


include ("connect.php");


//include();




$strSQL ="SELECT * FROM work Left join work_score ON (work.work_id=work_score.work_id) Left join student ON (work_score.std_id=student.std_id)  WHERE work_score.regis_section = '".$_GET["sub_id"]."' GROUP BY work_score.std_id ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_assoc($objQuery2);


$strSQL3 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);


$strSQL4 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");

$strSQL5 = "SELECT COUNT(regis_section) as countnum FROM work WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);
$time=$objResult3["cn_date"];


function renderScore($txt){
  switch ($txt) {
    case 0: return 
     
  "<font color=\"red\">ไม่ส่ง</font>";
    break;
    case 1: return 
 "<font color=\"green\">ส่ง</font>";
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
    <th >รหัสนักศึกษา </th>
    <th > ชื่อ-นามสกุล </th>
';
 ?>
    <?php 
$x=1;
    while($objResult4 = mysqli_fetch_array($objQuery4))
    {

      ?>
<?php 


  $output .= ' 
<th>งานชิ้นที่'.$x.'</th>

  ';



  ?>
  <?php $x++; } 
 $output .= ' 
</tr>
  ';
  ?>

  
 <?php
 $i=1;

   while($objResult = mysqli_fetch_array($objQuery))
{
  $output .= '
  <tr>
  <td>'.$i.'</td>
  <td>'.$objResult["std_number"].'</td>
 <td>'.$objResult["std_name"].'  '.$objResult["std_lname"].'</td>
';
?>
 <?php 
 $strSQL4 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");
    while ($p1 = mysqli_fetch_array($objQuery4)) {
  ?>
  
    <?php
      $score1 = mysqli_fetch_array(mysqli_query($con,"SELECT cn FROM work_score WHERE std_id = '".$objResult["std_id"]."' AND work_id = '".$p1["work_id"]."' "));
      $output .= '
      <td>'.renderScore($score1[0]).'</td>
      ';
    ?>
  
  <?php
    }
  ?>
<?php  $output .= '
 </tr> ';
$i++;
 }
$output .= '</table>';

?>
 
  
<?php



}


 header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=การส่งงาน.xls');
  echo $output;
?>
