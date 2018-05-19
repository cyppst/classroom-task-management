<?php

error_reporting(0);
include ("connect.php");
include ("header.php");


	if(isset($_GET['id']))
	{
		$id = $_GET['su_id'];
		$sql_show = "select * from subjected where su_id = ".$su_id." ";
		$result_show = mysqli_query($con,$sql_show) or die(mysql_error());
		$data = mysqli_fetch_assoc($result_show);										
	}

$chsave = 0;
if(isset($_POST["submit"])){
$strSQL = "UPDATE subjected SET ";
$strSQL .="su_no = '".$_POST["su_no"]."' ";
$strSQL .=",su_name = '".$_POST["su_name"]."' ";
$strSQL .="WHERE su_id = '".$_GET["su_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{

   ?>
 <script> 
      swal({
        title:"",
        text: "แก้ไขข้อมูลรายวิชาเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "subject_tech.php";
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
        <a href="subject_tech.php">วิชา</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมูลรายวิชา</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลรายวิชา</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="?su_id=<?php echo $_GET["su_id"];?>" name="frmEdit" method="post">
										
										<?php
											$strSQL = "SELECT * FROM subjected WHERE su_id = '".$_GET["su_id"]."' ";
											$objQuery = mysqli_query($con,$strSQL);
											$objResult = mysqli_fetch_assoc($objQuery);
											if(!$objResult)
											{
											  echo "Not found ID=".$_GET["su_id"];
											}
											else
											{
										?>

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>รหัสวิชา</label>
	                                            <input type="text" class="form-control" name="su_no" value="<?php echo $objResult["su_no"];?>" placeholder="กรอกรหัสวิชา">
                                       		</div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ชื่อวิชา</label>
                                                <input type="text" class="form-control" name="su_name"  value="<?php echo $objResult["su_name"];?>" placeholder="กรอกชื่อวิชา" maxlength="250" required>
                                            </div>
                                        </div>
                                        </div>

								
                                     

										<hr>
                                        
                                          
                                         <center> <a href="subject_tech.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
                                            <input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill pull">   </center>
                                      
                                      
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