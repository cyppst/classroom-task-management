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

							   		<button type="button" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">รายชื่อนักศึกษาที่ลงทะเบียน</button>
							

							    <div class="btn-group">
							      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							      การเข้าเรียน <span class="caret"></span></button>
							      <ul class="dropdown-menu" role="menu">
							        <li><a href="cn_from.php">เกณฑ์การให้คะแนน</a></li>
							        <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
							      </ul>
							    </div>

							    <div class="btn-group">
							      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							      การส่งงาน <span class="caret"></span></button>
							      <ul class="dropdown-menu" role="menu">
							        <li><a href="send_work.php">เกณฑ์การให้คะแนน</a></li>
							        <li><a href="work_show.php">จัดการคะแนน</a></li>
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


  
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  </form></center>

						</div>
                    </div>
                </div>
            </div>
<?php
include ("footer.php"); 
?>