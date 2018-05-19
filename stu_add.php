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

                                         <form action="save_student.php" name="form1" method="post" onSubmit="JavaScript:return fncSubmit();">
										
										

               							<div class="row">
                                        <div class="col-md-6 pr-1">
                                        	<div class="form-group">
	                                            <label>รหัสนักศึกษา</label>
	                                            
                                                <input type="text" name="text_plain"  class="form-control" placeholder="กรอกรหัสผู้ใช้งาน" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>
                                       		</div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>กลุ่มเรียน</label>
                                                <input type="text" class="form-control" name="tech_pass"  placeholder="กรอกกลุ่มเรียน" maxlength="13" required>
                                            </div>
                                        </div>
                                        </div>

										<div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>ชื่อ</label>
                                                <input type="text" class="form-control" name="name" placeholder="กรอกชื่อ" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>นามสกุล</label>
                                                <input type="text" class="form-control" name="lname" placeholder="กรอกนามสกุล" maxlength="50" required>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>เบอร์โทร</label>
                                                <input type="text" class="form-control" name="tech_lname"  placeholder="กรอกเบอร์โทร" maxlength="10" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>line</label>
                                                <input type="text" class="form-control" name="tech_phone"  placeholder="กรอก ID Line" maxlength="20" >
                                            </div>
                                        </div>
                                        </div>

										<hr>
                                  
                                       
                                            <center>
                                            <a href="main_stu.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
                                            <input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill pull"></center>   
                                    
                                     

                                  

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

<script language="javascript">
function fncSubmit()
{
    if(document.form1.text_plain.value == "")
    {
        alert('กรุณากรอกรหัสนักศึกษา');
        document.form1.text_plain.focus();
        return false;
    } 
    if(document.form1.tech_pass.value == "")
    {
        alert('กรุณากรอกรหัสกลุ่มเรียน');
        document.form1.tech_pass.focus();       
        return false;
    } 
    if(document.form1.name.value == "")
    {
        alert('กรุณากรอกชื่อ');
        document.form1.name.focus();
        return false;
    } 
    if(document.form1.lname.value == "")
    {
        alert('กรุณากรอกนามสกุล');
        document.form1.lname.focus();       
        return false;
    } 


    document.form1.submit();
}
</script>