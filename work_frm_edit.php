<?php

error_reporting(0);
include ("connect.php");
include ("header.php");
$work_id=$_GET["work_id"];
$sub_id=$_GET["sub_id"];
//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


$strSQL ="SELECT * FROM work Left join work_score ON (work.work_id=work_score.work_id) Left join student ON (work_score.std_id=student.std_id) WHERE work_score.work_id = '".$_GET["work_id"]."'";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);


$strSQL3 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$strSQL5 = "SELECT * FROM work WHERE work_id = '".$_GET["work_id"]."' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL3."]");
$objResult5 = mysqli_fetch_array($objQuery5);
?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลการส่งงาน&nbsp;/&nbsp;แก้ไขคะแนนและสถานะหัวข้อ"<?php 

  echo ($objResult5["work_name"]); ?>"</h4></li>
  
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
                        <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript">
$(document).ready(function(){
  var body = $("#example tr td:nth-child(4)"),
  title_full = <?php echo $objResult3["work_score"]; ?>;   
  $("input:text",body).keyup(function(){
    if(!$(this).val().match("^([\+\-]?[0-9]*[\.]?[0-9]?[0-9]?)$")){
      $(this).val('');    
    }
    if($(this).val() > title_full ){ alert('คะแนน '+$(this).val()+' เกินค่ะ'); $(this).focus(); }         
  });
});
</script>
                        <div class="card-body">   
   <form name="frmMain" method="post" action="work_frm_update.php?work_id=<?=$work_id?>&sub_id=<?=$sub_id?>" onSubmit="JavaScript:return fncSubmit();" >
<table class="table table-bordered" id="example">
 

  <thead>
                    <tr>
                     <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
  <th > <div align="center">คะแนนที่ได้ (  <?php 

  echo ($objResult3["work_score"]); 

  ?>)</div></th>

                     <th></th>
                    </tr>
                </thead>
  
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
<input type="hidden" name="work_id[]" value="<?php
  
  echo($objResult["work_id"]);
  
    
    ?>">
<input type="hidden" name="ws_id[]" value="<?php
  
  echo($objResult["ws_id"]);
  
    
    ?>">
<input type="hidden" name="std_id[]" value="<?php
  
  echo($objResult["std_id"]);
  
    
    ?>">
<?php

  echo ($objResult["std_name"]); 

  ?>&nbsp;&nbsp;<?php

  echo ($objResult["std_lname"]); 

  ?></div>
  </td><td align=center>


<input rel="txt<?php echo $i; ?>"  type="radio" name="std_num[]_<?php echo $i;?>" id="std_num<?php echo $i;?>" value="1" <?php if(trim($objResult["cn"]) == "1") echo "checked";?>>ส่ง
 <input rel="txt<?php echo $i; ?>" type="radio" name="std_num[]_<?php echo $i;?>" id="std_num<?php echo $i;?>" value="0" <?php if(trim($objResult["cn"]) == "0") echo "checked";?>>ไม่ส่ง

    <input type="text" name="std_name[]" id="txt<?php echo $i; ?>"  value="<?php
  
  echo($objResult["score"]); 
  
    
    ?>" onkeypress="check_key_number();" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required>
  

  </td>

<td></td>
  </tr>
<?php
$i++;
}


?>
 
</table>
  <center>
    <a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
    <button type="submit" class="btn btn-primary">บันทึก</button>
  </center>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- นำเข้า  CSS จาก Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- นำเข้า  CSS จาก dataTables -->
        <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
         
        <!-- นำเข้า  Javascript จาก  Jquery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- นำเข้า  Javascript  จาก   dataTables -->
        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
  <script>
$(document).ready(function(){
   $("input:text").attr("readonly","readonly");
});
$("input[type='radio']").change(function(){
  var relate = $(this).attr("rel");
  if($(this).is(":checked")) 
     $("input#"+relate).removeAttr("readonly");
  else
     $("input#"+relate).attr("readonly","readonly");
});
</script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#example').dataTable( {
      "oLanguage": {
        "sProcessing":   "กำลังดำเนินการ...",
        "sLengthMenu":   "แสดง MENU แถว",
        "sZeroRecords":  "ไม่พบข้อมูล",
        "sInfo":         "แสดง START ถึง END จาก TOTAL แถว",
        "sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered": "(กรองข้อมูล MAX ทุกแถว)",
        "sInfoPostFix":  "",
        "sSearch":       "ค้นหา: ",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "หน้าแรก",
          "sPrevious": "ก่อนหน้า",
          "sNext":     "ถัดไป",
          "sLast":     "หน้าสุดท้าย"
        }
      }
    } );
  } );
</script>