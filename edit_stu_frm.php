<?php


include ("connect.php");
include ("header.php");


if(isset($_GET['id']))
    {
        $id = $_GET['tech_id'];
        $sql_show = "select * from student where std_id = ".$std_id." ";
        $result_show = mysqli_query($con,$sql_show) or die(mysql_error());
        $data = mysqli_fetch_assoc($result_show);                                       
    }

$chsave = 0;
if(isset($_POST["submit"])){

$strSQL = "UPDATE student SET ";
$strSQL .="std_number = '".$_POST["std_number"]."' ";
$strSQL .=",std_group = '".$_POST["std_group"]."' ";
$strSQL .=",std_name = '".$_POST["std_name"]."' ";
$strSQL .=",std_lname = '".$_POST["std_lname"]."' ";
$strSQL .=",std_phone = '".$_POST["std_phone"]."' ";
$strSQL .=",std_line = '".$_POST["std_line"]."' ";
$strSQL .=",std_pass = '".$_POST["std_pass"]."' ";
$strSQL .="WHERE std_id = '".$_GET["std_id"]."' ";
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{

?>
 <script> 
      swal({
        title:"",
        text: "แก้ไขข้อมูลนักศึกษาเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "main_stu.php";
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
        <a href="main_stu.php">นักศึกษา</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมูลส่วนตัวนักศึกษา</li>
</ol>


			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">แก้ไขข้อมูลนักศึกษา</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="?std_id=<?php echo $_GET["std_id"];?>" name="frmEdit" method="post" >
										  
                                        <?php
                                            $strSQL = "SELECT * FROM student WHERE std_id = '".$_GET["std_id"]."' ";
                                            $objQuery = mysqli_query($con,$strSQL);
                                            $objResult = mysqli_fetch_assoc($objQuery);
                                          
                                        ?>
										

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>รหัสนักศึกษา</label>
	                                            <input type="text" class="form-control" name="std_number" value="<?php echo $objResult["std_number"];?>" >
                                               
                                       		</div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>กลุ่มเรียน</label>
                                             
                                                 <input type="text" class="form-control" name="std_group" value="<?php echo $objResult["std_group"];?>" >
                                            </div>
                                        </div>
                                        </div>

										<div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" class="form-control" name="std_name" value="<?php echo $objResult["std_name"];?>" >
                                             
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>นามสกุล</label>
                                                 <input type="text" class="form-control" name="std_lname" value="<?php echo $objResult["std_lname"];?>" >
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>เบอร์โทร</label>
                                                <input type="text" class="form-control" name="std_phone" value="<?php echo $objResult["std_phone"];?>" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>line</label>
                                                 <input type="text" class="form-control" name="std_line" value="<?php echo $objResult["std_line"];?>" >
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                 <label> Username</label>
                                                <input type="text" class="form-control" name="std_number" value="<?php echo $objResult["std_number"];?>" >
                                          
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Password</label>
                                                 <input type="text" class="form-control" name="std_pass" value="<?php echo $objResult["std_pass"];?>" >
                                            
                                            </div>
                                        </div>
                                        </div>


										<hr>
                                       <center>
                                        <a href="main_stu.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
                                            <input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill pull">   
                                        </center>  
                                     

                               

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

