<?php


include ("connect.php");
include ("header.php");

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><u>ผลการทำงาน</u></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <font color="green">บันทึกข้อมูลการแก้ไขได้สำเร็จ</font>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>






<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="main_stu.php">นักศึกษา</a>
    </li>  
    <li class="breadcrumb-item active">ข้อมูลส่วนตัวนักศึกษา</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลนักศึกษา</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="main_stu.php" name="form1" method="post" >
										  
                                        <?php
                                            $strSQL = "SELECT * FROM student WHERE std_id = '".$_GET["std_id"]."' ";
                                            $objQuery = mysqli_query($con,$strSQL);
                                            $objResult = mysqli_fetch_assoc($objQuery);
                                            if(!$objResult)
                                            {
                                              echo "Not found ID=".$_GET["std_id"];
                                            }
                                            else
                                            {
                                        ?>
										

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>รหัสนักศึกษา</label>
	                                            <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_number"];?>" disabled>
                                               
                                       		</div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>กลุ่มเรียน</label>
                                             
                                                 <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_group"];?>" disabled>
                                            </div>
                                        </div>
                                        </div>

										<div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_name"];?>" disabled>
                                             
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>นามสกุล</label>
                                                 <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_lname"];?>" disabled>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>เบอร์โทร</label>
                                                <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_phone"];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>line</label>
                                                 <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_line"];?>" disabled>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                 <label> Username</label>
                                                <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_number"];?>" disabled>
                                          
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Password</label>
                                                 <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["std_pass"];?>" disabled>
                                            
                                            </div>
                                        </div>
                                        </div>


										<hr>
                                        <div class="row">
                                        <div class="col-md-7 pr-1">    
                                            <input type="submit" name="submit" value="ย้อนกลับ" class="btn btn-info btn-fill pull-right">   
                                        </div>
                                        </div> 

                                 <?php
                                            }
                                          
                                        ?> 

   						          	</form>

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

