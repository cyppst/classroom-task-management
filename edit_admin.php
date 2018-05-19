<?php


include ("connect.php");
include ("header_admin.php");


	if(isset($_GET['id']))
	{
		$id = $_GET['ad_id'];
		$sql_show = "select * from admin where ad_id = ".$ad_id." ";
		$result_show = mysqli_query($con,$sql_show) or die(mysql_error());
		$data = mysqli_fetch_assoc($result_show);										
	}

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE admin SET ";
$strSQL .="no = '".$_POST["no"]."' ";
$strSQL .=",name = '".$_POST["name"]."' ";
$strSQL .=",admin_phone = '".$_POST["admin_phone"]."' ";
$strSQL .=",admin_id = '".$_POST["admin_id"]."' ";
$strSQL .=",admin_pass = '".$_POST["admin_pass"]."' ";
$strSQL .="WHERE ad_id = '".$_GET["ad_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{
 ?>
 <script> 
      swal({
        title:"",
        text: "แก้ไขข้อมูลส่วนตัวเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "main_admin.php";
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
        <a href="main_admin.php">ผู้ดูแลระบบ</a>
    </li>  
    <li class="breadcrumb-item active">ข้อมูลส่วนตัวผู้ดูแลระบบ</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลส่วนตัวผู้ดูแลระบบ</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="?ad_id=<?php echo $_GET["ad_id"];?>" name="frmEdit" method="post">
										
										<?php
											$strSQL = "SELECT * FROM admin WHERE ad_id = '".$_GET["ad_id"]."' ";
											$objQuery = mysqli_query($con,$strSQL);
											$objResult = mysqli_fetch_assoc($objQuery);
											if(!$objResult)
											{
											  echo "Not found ID=".$_GET["ad_id"];
											}
											else
											{
										?>

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>คำนำหน้า</label>
	                                            <input type="text" class="form-control" name="no" value="<?php echo $objResult["no"];?>" >
                                       		</div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ชื่อ-นามสกุล</label>
                      <input type="text" class="form-control" name="name"  value="<?php echo $objResult["name"];?>" placeholder="กรอกรหัสผ่าน" maxlength="50" required>
                                            </div>
                                        </div>
                                        </div>

										<div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>เบอร์โทร</label>
                                                <input type="text" class="form-control" name="admin_phone" value="<?php echo $objResult["admin_phone"];?>"  onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" placeholder="กรอกชื่อ" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="admin_id" value="<?php echo $objResult["admin_id"];?>" placeholder="กรอกนามสกุล" maxlength="50" required>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="admin_pass" value="<?php echo $objResult["admin_pass"];?>" placeholder="กรอกเบอร์โทร" maxlength="10" required>
                                            </div>
                                        </div>
                                        
                                        </div>

										<hr>

                                         <center>
<a href="main_admin.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
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