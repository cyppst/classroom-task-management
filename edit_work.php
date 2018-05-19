<?php


include ("connect.php");
include ("header.php");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);



?>



<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="work_data.php?sub_id=<?=$objResult2["sub_id"]?>">ข้อมูลการส่งงาน</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมมูลการส่งงาน</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">แก้ไขข้อมมูลการส่งงาน</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="edit_work_update.php?sub_id=<?=$objResult2["sub_id"]?>" name="frmEdit" method="post">
										
										<?php
											$strSQL = "SELECT * FROM work WHERE work_id = '".$_GET["work_id"]."' ";
											$objQuery = mysqli_query($con,$strSQL);
											$objResult = mysqli_fetch_assoc($objQuery);
											if(!$objResult)
											{
											  echo "Not found ID=".$_GET["work_id"];
											}
											else
											{
										?>

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>เรื่อง</label>
                                                <input type="hidden" name="cn_id" value="<?php
  
  echo($objResult["work_id"])
  
    
    ?>">
	                                            <input type="text-center" class="form-control" name="work_name" value="<?php echo $objResult["work_name"];?>" required>
                                       		</div>
                                        </div>
                                         <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                         <label>คะแนน</label>
                                              
    
                                              <input type="text-center" class="form-control" name="work_score" value="<?php echo $objResult["work_score"];?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" required>
                                          </div>
                                        </div>
                                   
 </div>
										<hr></hr>
                                         
<center>
  <a href="work_data.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
<input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill pull"> </center>
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