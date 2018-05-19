<?php

//error_reporting(0);
include ("connect.php");
include ("header.php");

//include();


$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
 $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);




$time=$objResult3["cn_date"];


?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
                            <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
                          
                            <hr>
                        </div>

                         <div class="card-body">
                           
                <div class="container">
                <div class="btn-group">

                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">นักศึกษา<span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                      <li><a href="stu_view.php?sub_id=<?=$objResult2["sub_id"]?>">เพิ่มนักศึกษา</a></li>
                      <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">ตรวจสอบนักศึกษา</a></li>
                    </ul>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การเข้าเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cn_frm.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การส่งงาน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                     <li><a href="send_work.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การสอบ <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="exam.php">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="exam_show.php">จัดการคะแนน</a></li>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    ผลการเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="edit_stu.php">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="#">จัดการคะแนน</a></li>
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


       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">รายชื่อกลุ่มอาจารย์</button>

  <!-- Modal -->
  
          <h4 class="modal-title">รายชื่อกลุ่มอาจารย์</h4>
        </div>
        <div class="modal-body">
  
        <?
        $sql = "SELECT * FROM student ";
$qr = mysqli_query($con,$sql) or die ("Error Query [".$strSQL."]");

    ?>
      <form action="" method="post">
         <table class="table">
           <thead>
                                        <tr>
                                 <th width="5%">ส่ง</th>           
                       <th width="10%">ขื่อ-นามสกุล</th>
                      <th width="10%">Email</th>    
    
                  
                                        </tr>
                                    </thead>
                                    <tr>
    <?
   while($objQuery1 = mysqli_fetch_array($qr)) {
    ?>
      <td><input type="checkbox" name="std_name[]" value="<?
  
  echo($objQuery1["std_name"])
  
    
    ?>"></td>
           <td><? echo($objQuery1["std_name"])." ";?> <? echo($objQuery1["std_name"]);?></td>
                <td><? echo($objQuery1["std_name"]);?></td>
           </tr>
          <?
    }
      ?>
          
          </table>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-default"  OnClick="fncAction2();"  >ส่ง</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
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