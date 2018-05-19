<?php

error_reporting(0);
include ("connect.php");
include ("header.php");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);



?>



<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="exam_data.php?sub_id=<?=$objResult2["sub_id"]?>">ข้อมูลการสอบ</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมมูลการสอบ</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">แก้ไขข้อมมูลการสอบ</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="edit_exam_update.php?sub_id=<?=$objResult2["sub_id"]?>" name="frmEdit" method="post">
										
										<?php
											$strSQL = "SELECT * FROM examination WHERE exa_id = '".$_GET["exa_id"]."' ";
											$objQuery = mysqli_query($con,$strSQL);
											$objResult = mysqli_fetch_assoc($objQuery);
											if(!$objResult)
											{
											  echo "Not found ID=".$_GET["exa_id"];
											}
											else
											{
										?>

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>เรื่อง</label>
                                                <input type="hidden" name="cn_id" value="<?php
  
  echo($objResult["exa_id"])
  
    
    ?>">
	                                            <input type="text-center" class="form-control" name="exa_name" value="<?php echo $objResult["exa_name"];?>" >
                                       		</div>
                                        </div>
                                         <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                         <label>คะแนน</label>
                                              
    
                                              <input type="text-center" class="form-control" name="exa_score" value="<?php echo $objResult["exa_score"];?>" >
                                          </div>
                                        </div>
                                   
 </div>
										<hr></hr>
<center>
<a href="exam_data.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
 <input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill pull">  
</center>
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