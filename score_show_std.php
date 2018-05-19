<?php

//error_reporting(0);
include ("connect.php");
include ("header_student.php");

//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


$strSQL ="SELECT * FROM criteria Left join student ON (criteria.std_id=student.std_id) WHERE criteria.regis_section = '".$_GET["sub_id"]."' AND  student.std_id = '".$_SESSION['UserID']."' ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);


$strSQL3 = "SELECT * FROM criteria WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);


?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>ผลการเรียน&nbsp;/&nbsp;คะแนนรวม&ตัดเกรด<?php 

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
                            <hr>

                            <p><a href="score_total.php?sub_id=<?=$objResult2["sub_id"]?>"> ผลการเรียน</a><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></span><span class="glyphicon glyphicon-chevron-right"></span><font color="red" >คะแนนทั้งหมด</font></p>
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
<input type="hidden" name="std_id[]" value="<?php
  
  echo($objResult["std_id"])
  
    
    ?>">
<?php

  echo ($objResult["std_name"]); 

  ?>&nbsp;&nbsp;<?php

  echo ($objResult["std_lname"]); 

  ?></div>
  </td>
 <td><div align="center">
  <?php 

  echo ($objResult["cn_score"]); 

  ?>
  </div></td>
  <td align=center><?php

   $score12 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(score) FROM work_score WHERE std_id = '".$objResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."' "));
 echo $score12[0]; 

  ?>
    


  </td>
  <td align=center><?php

   $score11 = mysqli_fetch_array(mysqli_query($con,"SELECT sum(ex_list_score) FROM examination_list WHERE std_id = '".$objResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."' "));
 echo $score11[0]; 

  ?>
    


  </td>
  <td align=center>
    <?php

  $socre=$objResult["cn_score"]; 
  $socre2=$objResult["total"]; 
  $total=$socre+$socre2;
  echo $total;
  ?>

  </td>
  <?php
if($total >=80) { 
  ?>
 <td align=center>A</td>

 
  <?php
}
  else if (($total>=75)&&($total<=79)) { 
   ?>
   <td align=center>B+</td>
<?php
  }  else if (($total>=70)&&($total<=74)) { 
  ?>
<td align=center>B</td>

  <?php
}else if (($total>=65)&&($total<=69)) { 
  ?>
  <td align=center>C+</td>
  <?php
  }else if (($total>=60)&&($total<=64)) { 
    ?>
    <td align=center>C</td>
    <?php
     }else if (($total>=55)&&($total<=59)) { 
      ?>
 <td align=center>D+</td>
      <?php
      }else if (($total>=50)&&($total<=54)) { 
?>
<td align=center>D</td>
<?php
 } else  { 
?>
<td align=center>E</td>
<?php
  }
  ?>
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
<?php
include ("footer.php"); 
?>