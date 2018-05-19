<?php
include ("connect.php");
include ("header.php");
$work_id=$_GET["work_id"];
$sub_id=$_GET["sub_id"];
//include();
$strSQL = "SELECT * FROM registration INNER join student ON registration.std_id=student.std_id  JOIN work_score ON registration.regis_section=work_score.regis_section WHERE registration.regis_section = '".$sub_id."' GROUP BY student.std_id";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$sub_id."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_assoc($objQuery2);
$strSQL3 = "SELECT * FROM checkname WHERE regis_section = '".$sub_id."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);
$strSQL4 = "SELECT * FROM work WHERE regis_section = '".$sub_id."' ";
$objQuery4 = mysqli_query($con,$strSQL4) or die ("Error Query [".$strSQL4."]");
$objResult4 = mysqli_fetch_array($objQuery4);
$time=$objResult3["cn_date"];
$strSQL5 = "SELECT * FROM work WHERE work_id = '".$work_id."' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL3."]");
$objResult5 = mysqli_fetch_array($objQuery5);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<input name="title_full" type="hidden" id="title_full" value="<?=$objResult5["work_score"];?>"/>
<link rel="stylesheet" text="text/css" href="dist/sweetalert.css">
<script src="dist/sweetalert.js"></script>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
        <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
        
        <hr>
        <p><a href="send_work.php?sub_id=<?=$objResult2["sub_id"]?>"> จัดการข้อมูลส่งงาน</a><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span>จัดการบทเรียน</span><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span> <font color="red" >ให้คะแนนบทเรียน<?php
        echo ($objResult5["work_name"]);
      ?></font></p>
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
              <li><a href="exam_score.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a>
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
    <script language="JavaScript">
document.onkeydown = chkEvent 
function chkEvent(e) {
  var keycode;
  if (window.event) keycode = window.event.keyCode; //*** for IE ***//
  else if (e) keycode = e.which; //*** for Firefox ***//
  if(keycode==13)
  {
    return false;
  }
}
</script>
    <script language="JavaScript" type="text/JavaScript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
    eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
    }
    //-->
    </script>
    <div class="card-body">
      <form action="work_scanbarcode.php" method="POST" role="form">
        <div class="form-group">
          <input type="text" name="std_id" onmouseover="this.focus();"  class="form-control" placeholder="สแกน Barcode" autofocus autocomplete="off">
          <input name="button3" type = "reset" value="ล้างข้อมูล" />
          <input type="hidden" name="work_id" value="<?=$work_id; ?>">
          <input type="hidden" name="regis_section" value="<?=$sub_id; ?>">
        </div>
        
      </form>
      <form name="frmMain" method="post" action="work_insert.php?work_id=<?=$work_id?>&sub_id=<?=$sub_id?>">
        <table class="table table-bordered" border="1">
          <tr>
            <th > <div align="center">ลำดับ </div></th>
            <th > <div align="center">รหัสนักศึกษา </div></th>
            <th > <div align="center">ชื่อ-นามสกุล </div></th>
            <th > <div align="center">คะแนนที่ได้(<?php echo ($objResult4['work_score']);?>) </div></th>
            <th></th>
          </tr>
          <?php
          $i=1;
          while($objResult = mysqli_fetch_array($objQuery))
          {
          ?>
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
          <script type="text/javascript">
          $(document).ready(function check_key_number()) {
          var body = $("#scoring tr td:nth-child(5)"),
          title_full = <?php echo $objResult5["work_score"]; ?>;
          $("input:text",body).keyup(function(){
          if(!$(this).val().match("^([\+\-]?[0-9]*[\.]?[0-9]?[0-9]?)$")){
          $(this).val('');
          }
          if($(this).val() > title_full ){ alert('คะแนน '+$(this).val()+' เกินค่ะ'); $(this).focus(); }
          });
          });
          </script>
          
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
        <td align=center>
          <?php if($objResult["std_number"]==null){
          echo "<input type='text' >";
          }else {
          echo "<input type='text' disabled>";
          }
          ?>
          
        </td>
        <td></td>
      </tr>
      <?php
      $i++;
      }
      ?>
      <td></td>

      
      
    </table>
    <center><a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
       <button type="submit" class="btn btn-primary"> ตกลง</button></center>
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
<script>
$('button.delete-account').click(function(e) {
swal({
title: "An input!",
text: "Write something interesting:",
type: "input",
showCancelButton: true,
closeOnConfirm: false,
inputPlaceholder: "Write something"
}, function (inputValue) {
if (inputValue === false) return false;
if (inputValue === "") {
swal.showInputError("You need to write something!");
return false
}
swal("Nice!", "You wrote: " + inputValue, "success");
});
});
</script>