<?php
include ("connect.php");




if(!empty($_GET["sub_id"]))
  {
    $_SESSION["subID"] = $_GET["sub_id"];
  }
if(!empty($_GET["group_id"]))
{
  $_SESSION["groupID"] = $_GET["group_id"];
    
}
if($_GET["sub_id"] || $_GET["group_id"]) 
{

  $sql_show = "SELECT * FROM `map_group` n 
                  inner join `subjects` s on n.sub_id=s.sub_id
                  inner join `group` g on n.group_id=g.group_id
                  WHERE n.sub_id = '".$_SESSION["subID"]."' ";
  $result_show = mysqli_query($mysqli,$sql_show);
  $r_sub = mysqli_fetch_array($result_show,MYSQLI_ASSOC);  
   
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title></title>
  <meta charset="utf-8" />
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<style type="text/css">
<!--
@page rotated { size: landscape; }
.style1 {
  font-family: "TH SarabunPSK";
  font-size: 18pt;
  font-weight: bold;
}
.style2 {
  font-family: "TH SarabunPSK";
  font-size: 16pt;
  font-weight: bold;
}
.style3 {
  font-family: "TH SarabunPSK";
  font-size: 16pt;
  
}
.style5 {cursor: hand; font-weight: normal; color: #000000;}
.style9 {font-family: Tahoma; font-size: 12px; }
.style11 {font-size: 12px}
.style13 {font-size: 9}
.style16 {font-size: 9; font-weight: bold; }
.style17 {font-size: 12px; font-weight: bold; }
-->
</style>
</head>

<body>
<?php
                                                     
require_once('../mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ

?>
<div class=Section2>
<table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" align="laft"><img src="../images/sru.png" alt="" width="70" height="85"></td>
    <td width="50" align="laft"><h4 class="style2">มหาวิทยาลัยราชภัชสุราษฏร์ธานี</h4>
      <br><span class="style2">สาขาวิทยาการคอมพิวเตอร์</span></td>
    <td align="right"><span class="style2">รายงานผลคะแนนสอบก่อนเรียนหลังเรียนของนักศึกษา</span>
      <br><br><span class="style2">วิชา : <?php echo $r_sub["sub_name"];?><br><br>กลุ่มเรียน : <?php echo $r_sub["group_ids"];?></span></td>

  </tr>
</table>

 <hr>
 <table width="200" border="0" align="center">
  <tbody>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
  
<table bordercolor="#424242" width="1141" height="80" border="1"  align="center" cellpadding="0" cellspacing="0" class="style3">
  <tr align="center">
    <td width="44" height="23" align="center" bgcolor="#D5D5D5"><strong>ลำดับ</strong></td>
    <td width="178" align="center" bgcolor="#D5D5D5"><strong>ชื่อ-สกุล</strong></td>
    <td width="123" align="center" bgcolor="#D5D5D5"><strong>รหัสนักศึกษา</strong></td>
    <td width="139" align="center" bgcolor="#D5D5D5"><strong>ชุดข้อสอบ</strong></td>
    <td width="114" align="center" bgcolor="#D5D5D5"><strong>คะแนน</strong></td>
  </tr>
   
    
<?php
    
    if($_GET["sub_id"] || $_GET["group_id"]) 
    {
    $sql = "SELECT * from `result` m 
              join `user` s on m.user_id=s.user_id
              join `set` se on m.set_id=se.set_id
              WHERE s.group_id = '".$_SESSION["groupID"]."'";
    $qg = mysqli_query($mysqli,$sql);
    $rowg = mysqli_num_rows($qg);
    $i = 1;
    while ($show = mysqli_fetch_array($qg,MYSQLI_ASSOC))
    {       
  ?>
    <tr>
    <td height="22" align="center"><?php echo $i;?></td>
    <td class="style3">&nbsp;<?php if($show["prefix"] ==1){ echo "นาย";}?>
                                      <?php if($show["prefix"] ==2){ echo "นางสาว";}?>
                                      <?php echo $show["user_name"];?>  
                                      <?php echo $show["user_lname"];?>           
    </td>
    <td class="style3" align="center"><?php echo $show["user_ids"];?></td>
    <td class="style3" align="center"><?php if($show["set_name"] ==1){ echo "ก่อนเรียน";}?><?php if($show["set_name"] ==2){ echo "หลังเรียน";}?></td>
    <td class="style3" align="center"><?php echo $show["score"];?></td>
    </tr>
    
    <?php

        $i++;
        }
      }
    ?>
   
</table>
</div>
</body>
</html>

<?php

$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("../MyPDF/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด

?>
<a href="../MyPDF/MyPDF.pdf" id="download">คลิกที่นี้</a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    

    

    $("#download").click(function(event) {
      
      var href = $(this).attr("href");
      //alert(href);
      console.log("link : "+href);
      window.location.href=href;
      //window.open(href, '_blank');

    });


    $("#download").trigger('click');

  });


</script>
