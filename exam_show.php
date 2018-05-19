
<?php

error_reporting(0);
include ("connect.php");
include ("header.php");

//include();


  $strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
 $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);


$strSQL3 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");

$strSQL5 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_assoc($objQuery5);

$strSQL1 ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.exa_id = '".$_GET["exa_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");

$time=$objResult3["cn_date"];


?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลการสอบ&nbsp;/&nbsp;หัวข้อการสอบ</h4></li>
  
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

                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">นักศึกษา<span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                      <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">ตรวจสอบนักศึกษา</a></li>
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
                        <li class="active"><a href="send_work.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
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
                      <li><a href="exam_score.php?sub_id=<?=$objResult2["sub_id"]?>&exa_id=<?=$objResult5["exa_id"]?>">รวมคะแนน</a></li>
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

<table class="table table-bordered" border="1">
  <tr>
  <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">เรื่อง </div></th>
        <th > <div align="center">คะแนนเต็ม </div></th>
    <th > <div align="center">จัดการ </div></th>
  
  


  </tr>
 <?php
 $i=1;
   while($objResult3 = mysqli_fetch_array($objQuery3))
{
   ?>
  <tr>
  <td><div align="center">
    <?php

  echo $i; 
$i++;
  ?>
</div>
  </td>
    <td><div align="center">
  <?php 

  echo $objResult3["exa_name"]; 

  ?>
  </div></td>
    <td><div align="center">
  <?php 

  echo $objResult3["exa_score"]; 

  ?>
  </div></td>
   
<?php
$id =$objResult3['exa_id'];


$strSQL4 = "SELECT * FROM examination_list inner join examination ON examination_list.exa_id=examination.exa_id WHERE examination_list.exa_id= '$id' ";
$objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");
$objResult4 = mysqli_fetch_array($objQuery4);

$id2 =$objResult4['exa_id'];
if ($id != $id2)
{
  ?>
<td>
<div align="center">
<A HREF="exam_showdata.php?exa_id=<?=$objResult3["exa_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="เปิด" class="btn btn-warning" ><i class="fa fa-eye"></i></a>
</div>
</td>
<td></td>
<?php
}

else if ($id == $id2)
{
  ?>
<td> 

                  
<div  align="center">

        <A HREF="exam_frm.php?exa_id=<?=$objResult3["exa_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="เปิด" class="btn btn-warning" ><i class="fa fa-eye"></i></a>  &nbsp;&nbsp;   
        <A HREF="exam_frm_edit.php?exa_id=<?=$objResult3["exa_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="แก้ไข" class="btn btn-info" onclick="return confirm('อาจจะมีผลกับคะแนนด้านในคุณต้องการแก้ไขหรือไม่ Y/N');"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
        <A HREF="exam_frm_del.php?exa_id=<?=$objResult3["exa_id"]?>" title="ลบ" class="btn btn-danger" onclick="return confirm('อาจจะมีผลกับคะแนนด้านในคุณต้องการลบหรือไม่ Y/N');"><i class="fa fa-trash-o"></i></a>  
  </div>
                  </td>
   <td> </td>
  </tr>
<?php
}
}

?>
</table>

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