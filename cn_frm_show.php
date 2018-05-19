<?php


include ("connect.php");
include ("header.php");

//include();

$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
  $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

  $strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);

$strSQL3 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");


?>

<?php

  $sql = "SELECT * FROM `subject`";
  $q = mysqli_query($con,$sql);
  $qr = mysqli_fetch_assoc($q);

?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลคาบเรียน&nbsp;/&nbsp;ตารางคาบเรียนทั้งหมด</h4></li>

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


  

<table class="table table-bordered" border="1">
  <tr>
  <th > <div align="center">คาบที่ </div></th>
    <th > <div align="center">วันที่ </div></th>
    <th > <div align="center">จัดการ </div></th>
  
  <th></th>


  </tr>
 <?php
 $j=1;

   while($objResult3 = mysqli_fetch_array($objQuery3))
{

  $time=$objResult3["cn_date"];
   ?>
  <tr>
  <td><div align="center">
    <?php

  echo $j; 
$j++;
  ?>

   </div></td>
    <td><div align="center">
  <?php 

  echo thaidate($objResult3["cn_date"]); 

  ?>

  
  </div></td>
   <?php
$id =$objResult3['cn_id'];


$strSQL4 = "SELECT * FROM checkname_score inner join checkname ON checkname_score.cn_id=checkname.cn_id WHERE checkname_score.cn_id= '$id' ";
$objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");
$objResult4 = mysqli_fetch_array($objQuery4);

$id2 =$objResult4['cn_id'];
if ($id != $id2)
{
  ?>

<td><div align="center">


<A HREF="cn_frm_showdata.php?cn_id=<?=$objResult3["cn_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="เปิด" class="btn btn-warning" ><i class="fa fa-eye"></i></a>

</div>
</td>
   
     <?php
}

else if ($id == $id2)
{
  ?>
       <td> 
<div align="center">
             <A HREF="cn_frmz.php?cn_id=<?=$objResult3["cn_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="เปิด" class="btn btn-warning" ><i class="fa fa-eye"></i></a>  &nbsp;&nbsp;   
             <A HREF="cn_frm_edit.php?cn_id=<?=$objResult3["cn_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="แก้ไข" class="btn btn-info"onclick="return confirm('คุณต้องการแก้ไขหรือไม่ Y/N');" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
             <A HREF="cn_frm_del.php?cn_id=<?=$objResult3["cn_id"]?>" title="ลบ" class="btn btn-danger" onclick="return confirm('คุณต้องการลบหรือไม่ Y/N');"><i class="fa fa-trash-o"></i></a>  
</div>
                  </td>

      <?php
}

?> 
<td></td>
  </tr>
<?php
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