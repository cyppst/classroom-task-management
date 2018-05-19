<?php


include ("connect.php");
include ("header.php");

//include();

	$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
	$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

	$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
	$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysqli_fetch_assoc($objQuery2);
?>

<?php

	$sql = "SELECT * FROM `subject`";
	$q = mysqli_query($con,$sql);
	$qr = mysqli_fetch_assoc($q);

?>

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript">
	function smi(){
         document.f1.submit();
	}

</script>
     <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">

<ol class="breadcrumb">  
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลคะแนน</h4></li>
</ol>
  
                  </div>
  
         


<?php

$excc=0;

if(isset($_FILES["excf"]["name"])){

$target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["excf"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_FILES["excf"]["name"])) {
    if (move_uploaded_file($_FILES["excf"]["tmp_name"], $target_file)) {
      $excc=1;
      $icheet = $_POST["icheet"];
    }
}

}


?>








<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form method="post" name='f1' enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">นำเข้า Excel:</label>
            <input type="file" class="" name="excf" id="excf">

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">เลขหน้า Sheet:</label>
              <select name="icheet">
                <option value="0">หน้าแรก Sheet:(1)</option>
                 <?php
                    for($j=1;$j<=10;$j++){	?>
                        <option value="<?=$j?>">หน้า Sheet:(<?=$j?>)</option>
                    <?php } ?>
              </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
        <button type="button" name="xx" value="xx" onclick="smi()" class="btn btn-primary">แสดงผล</button>
      </div>
    </div>
  </div>
</div> -->


  			<div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                        
         <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
         <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
                            <?php 
                            $section=$objResult2["section"];
                            if($section == ""){
                            ?>
                            <p class="card-title">Section : <input type="text" value="" style="border-radius: 5px;"></p>
                            <?php
                          }else if($section != "")
                          {
                            ?>
                            <p class="card-title">Section : <?php echo $objResult2["section"];?></p>
                            <?php

                          }
                            ?>


               

            
                        

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
                        <div class="card-body">		
</div>
  </div>
</div>
            </div>
						</div>
                    </div>
                </div>
            </div>
<?php
include ("footer.php"); 
?>