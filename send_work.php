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

$strSQL3 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");


?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลส่งงาน&nbsp;/&nbsp;เพิ่มชิ้นงาน</h4></li>
  
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

<a href="work_data.php?sub_id=<?=$objResult2["sub_id"]?>" class="btn btn-success" ><p class="glyphicon glyphicon-plus-sign">จัดการข้อมูลการส่งงาน</p></a> 
  


  <center><form action="send_work_save.php?sub_id=<?=$objResult2["sub_id"]?>" name="frmAdd" method="post" onSubmit="JavaScript:return fncSubmit();">
จำนวนบทที่ : 
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
</select> บท
<br>
<br>
<table width="200" class="table table-bordered" border="1">
  <tr>
    <th width="30"> <div align="center">ลำดับ</div></th>
    <th width="160"> <div align="center">บทที่(เรื่อง) </div></th>
     <th width="160"> <div align="center">คะแนนเต็ม </div></th>
     
     <th width="1"> </th>
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
    <td><div align="center"><input type="text" name="txtName<?php echo $i;?>" size="30" required></div></td>

 <td><div align="center"><input type="text" name="txtName2<?php echo $i;?>" size="30" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required></div></td>
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

  </form>
  


            </div>
                    </div>
                </div>
            </div>

    <?php
include ("footer.php"); 
?>