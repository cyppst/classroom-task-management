<?php


include ("connect.php");
include ("header_admin.php");


	if(isset($_GET['id']))
	{
		$id = $_GET['tech_id'];
		$sql_show = "select * from teacher where tech_id = ".$tech_id." ";
		$result_show = mysqli_query($con,$sql_show) or die(mysql_error());
		$data = mysqli_fetch_assoc($result_show);										
	}

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE teacher SET ";
$strSQL .="tech_user = '".$_POST["tech_user"]."' ";
$strSQL .=",tech_pass = '".$_POST["tech_pass"]."' ";
$strSQL .=",no = '".$_POST["no"]."' ";
$strSQL .=",tech_name = '".$_POST["tech_name"]."' ";
$strSQL .=",tech_lname = '".$_POST["tech_lname"]."' ";
$strSQL .=",tech_phone = '".$_POST["tech_phone"]."' ";
$strSQL .="WHERE tech_id = '".$_GET["tech_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{

 ?>
 <script> 
      swal({
        title:"",
        text: "แก้ไขข้อมูลอาจารย์เรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "tech_admin.php";
      } 
});
        </script>
<?php

}
else
{
    echo "Error Save [".$strSQL."]";
}


}


?>






<?php if($chsave==1){ ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModal').modal('show');
       
    });
</script>
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





<?php }?>

<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="tech_admin.php">อาจารย์</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมูลส่วนตัวอาจารย์</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลส่วนตัวอาจารย์</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="?tech_id=<?php echo $_GET["tech_id"];?>" name="frmEdit" method="post">
										
										<?php
											$strSQL = "SELECT * FROM teacher WHERE tech_id = '".$_GET["tech_id"]."' ";
											$objQuery = mysqli_query($con,$strSQL);
											$objResult = mysqli_fetch_assoc($objQuery);
											if(!$objResult)
											{
											  echo "Not found ID=".$_GET["tech_id"];
											}
											else
											{
										?>

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>รหัสผู้ใช้งาน</label>
	                                            <input type="text" class="form-control" name="tech_user" value="<?php echo $objResult["tech_user"];?>" placeholder="กรอกรหัสผู้ใช้งาน">
                                       		</div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>รหัสผ่าน</label>
                                                <input type="text" class="form-control" name="tech_pass"  value="<?php echo $objResult["tech_pass"];?>" placeholder="กรอกรหัสผ่าน" maxlength="13" required>
                                            </div>
                                        </div>
                                        </div>

										<div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>คำนำหน้า</label>
                                                <input type="text" class="form-control" name="no" value="<?php echo $objResult["no"];?>" placeholder="กรอกชื่อ" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" class="form-control" name="tech_name" value="<?php echo $objResult["tech_name"];?>" placeholder="กรอกนามสกุล" maxlength="50" required>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>สกุล</label>
                                                <input type="text" class="form-control" name="tech_lname" value="<?php echo $objResult["tech_lname"];?>" placeholder="กรอกเบอร์โทร" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>เบอร์โทร</label>
                                                <input type="text" class="form-control" name="tech_phone" value="<?php echo $objResult["tech_phone"];?>" placeholder="กรอก ID Line" maxlength="20" required>
                                            </div>
                                        </div>
                                        </div>

										<hr>
                                    
 <center>
<a href="tech_admin.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
  <input type="submit" name="submit" value="อัพเดต" class="btn btn-info btn-fill pull">   
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