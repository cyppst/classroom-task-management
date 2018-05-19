<?php

//error_reporting(0);
include ("connect.php");
include ("header.php");

//include();




?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                          
                          
                            <hr>
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

<?php



    $strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";//95-102
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);
  $strSQL5 = "SELECT * FROM examination WHERE exa_id = '".$_GET["exa_id"]."' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL3."]");
$objResult5 = mysqli_fetch_array($objQuery5);
$exa_id=$_GET["exa_id"];
$sub= $objResult2["sub_id"];


$std_id=$_POST['std_id'];
$std_name=$_POST['std_name'];
$ex_list_id=$_POST["ex_list_id"];
for($j=0;$j<count($_POST['std_name']);$j++)
  {
      
    if($std_name[$j]  != "")
    {
        
$strSQL = "UPDATE examination_list SET ";
$strSQL .="ex_list_score = '".$_POST['std_name'][$j]."' ";
$strSQL .="WHERE ex_list_id = '".$_POST["ex_list_id"][$j]."' ";
$objQuery = mysqli_query($con,$strSQL);



}}




if($objQuery)
{
  ?>

<script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลสำเร็จ",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "exam_frm.php?sub_id=<?php echo $sub; ?>&exa_id=<?php echo $exa_id; ?>";
      } 
});
        </script>
<?php
}else
{
  echo "Error Save [".$strSQL."]";
}

?>
  
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  </form></center>

            </div>
                    </div>
                </div>
            </div>
<?php
include ("footer.php"); 
?>