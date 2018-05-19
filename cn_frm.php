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

  $strSQL3 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
?>

<?php

  $sql = "SELECT * FROM `subject`";
  $q = mysqli_query($con,$sql);
  $qr = mysqli_fetch_assoc($q);

    $strSQL4 = "SELECT * FROM checkscore WHERE regis_section = '".$_GET["sub_id"]."' ";
  $objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");
  $objResult4 = mysqli_fetch_assoc($objQuery4);

?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลคาบเรียน&nbsp;/&nbsp;เพิ่มคาบเรียน</h4></li>

</ol>
                            <hr>
              </div>

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

                          <a href="cn_data.php?sub_id=<?=$objResult2["sub_id"]?>" class="btn btn-success" ><p class="glyphicon glyphicon-wrench">จัดการข้อมูลคาบเรียน</p></a> 
                         
<?php
$id=$objResult2['regis_section'];
$id2=$objResult4['regis_section'];
if($id==$id2){
?>

                          <a href="cn_data_score.php?sub_id=<?=$objResult2["sub_id"]?>" class="btn btn-info" ><p class="glyphicon glyphicon-plus">จัดการคะแนนเช็คชื่อ</p></a> 
<?php 
}else if($id!=$id2){

?>

                          <a href="cn_data_score_edit.php?sub_id=<?=$objResult2["sub_id"]?>" class="btn btn-warning" ><p class="glyphicon glyphicon-wrench">แก้ไขคะแนนเช็คชื่อ</p></a> 
<?php
}
?>

<center><form action="cn_frm_save.php?sub_id=<?=$objResult2["sub_id"]?>" name="frmAdd" method="post">
จำนานคาบเรียน : 
<select name="menu1" onChange="MM_jumpMenu('parent',this,0)"> 
<?php
for($i=1;$i<=10;$i++)
{
  if($_GET["Line"] == $i)
  {
    $sel = "selected";
  }
  else
  {
    $sel = "";
  }
?>
  <option value="<?php echo $_SERVER["PHP_SELF"];?>?sub_id=<?=$objResult2["sub_id"]?>&Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
<?php
}
?>
</select> คาบ
<br>
<br>
<table width="200" class="table table-bordered" border="1">
  <tr>
    <th width="91" > <div align="center">คาบที่ </div></th>
    <th width="160"> <div align="center">วันที่ </div></th>
    <th width="1"></th>
  </tr>
  <?php
  $line = $_GET["Line"];
  if($line == 0){$line=1;}
  for($i=1;$i<=$line;$i++)
  {
  ?>
  <tr>
    <td><div align="center"><?php 
    echo "$i";
    ?></div>
    </td>
    <td><div align="center"><input type="date" name="txtName<?php echo $i;?>" required></div></td>
     <td></td>
  </tr>
<?php
  }
  ?>
 
  
  </table>
   <center>
    <a href="stu_view.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
    <button type="submit" class="btn btn-primary">บันทึก</button>
  </center>
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  </form></center>

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