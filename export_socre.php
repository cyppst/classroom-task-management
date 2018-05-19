<?php

//error_reporting(0);
include ("connect.php");


//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


$strSQL ="SELECT * FROM criteria Left join student ON (criteria.std_id=student.std_id) WHERE criteria.regis_section = '".$_GET["sub_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);


$strSQL3 = "SELECT * FROM criteria WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$output = '';
if(isset($_POST["export"]))
{
?>



                      

                          <?php
$output .= '
                          
                          
<table class="table table-bordered" id="example" border="1">
  <tr>
    <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
    <th > <div align="center">คะแนนเช็คชื่อ </div></th>
    <th > <div align="center">คะแนนส่งงาน </div></th>
    <th > <div align="center">คะแนนสอบ </div></th>
  <th > <div align="center">คะแนนรวม </div></th>
   <th > <div align="center">เกรด </div></th>
  

  </tr>

';
?>

  <?php
  $i=1;
   while($objResult = mysqli_fetch_array($objQuery))
{
 $score12 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(score) FROM work_score WHERE std_id = '".$objResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."' "));
$score11 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(ex_list_score) FROM examination_list WHERE std_id = '".$objResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."' "));
 $socre=$objResult["cn_score"]; 
  $socre2=$objResult["total"]; 
  $total=$socre+$socre2;
  ?> 
<?php
$num='';
if(round($total) >=80) { 
  $num='A';
  ?>
 

 
  <?php
}
  else if ((round($total)>=75)&&(round($total)<=79)) { 
      $num='B+';
   ?>
<?php
  }  else if ((round($total)>=70)&&(round($total)<=74)) { 
    $num='B';
  ?>


  <?php
}else if ((round($total)>=65)&&(round($total)<=69)) { 
  $num='C+';
  ?>
 
  <?php
  }else if ((round($total)>=60)&&(round($total)<=64)) { 
     $num='C';
    ?>
    
    <?php
     }else if ((round($total)>=55)&&(round($total)<=59)) { 
      $num='D+';
      ?>

      <?php
      }else if ((round($total)>=50)&&(round($total)<=54)) { 
         $num='D';
?>

<?php
 } else  { 
   $num='E';
 }
?>



  
  <?php
 $output .= '
   
  <tr>
        <td>'.$i.'</td>
    <td>'.$objResult["std_number"].'</td>
<td>'.$objResult["std_name"].' '.$objResult["std_lname"].'</td>
 <td>'.$objResult["cn_score"].'</td> 
    <td>'.$score12[0].'</td>
<td>'.$score11[0].'</td>
 <td>'.$total.'</td>
<td>'.$num.'</td>
 </tr>';
 $i++; }
$output .= '</table>';

  ?>



<?php



}


 header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=คะแนนรวมทั้งหมด.xls');
  echo $output;
?>
