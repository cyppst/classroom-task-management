<?php

include ("connect.php");
include ("header_admin.php");

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
             <font color="green">บันทึกข้อมูลสำเร็จ</font>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>






<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="subject_admin.php">เพิ่มปีการศึกษา</a>
    </li>  
    <li class="breadcrumb-item active">รายละเอียดที่ต้องกรอก</li>
</ol>



			<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลปีการศึกษา</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form action="admin_save_semester.php" name="form1" method="post" onSubmit="JavaScript:return fncSubmit();">

               
                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>ภาคเรียน</label>
                                                <input type="text" class="form-control" name="semester_name"  placeholder="กรอกภาคเรียน" maxlength="13" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ปีการศึกษา</label>
                                                <input type="text" class="form-control" name="semester_year"  placeholder="กรอกีการศึกษา" maxlength="20" required>
                                            </div>
                                        </div>
                                        </div>

										<hr>
    

<center>
<a href="semester_admin.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
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
<script language="javascript">
function fncSubmit()
{
    if(document.form1.semester_name.value == "")
    {
        alert('กรุณากรอกปีการศึกษา');
        document.form1.semester_name.focus();       
        return false;
    } 
  

    document.form1.submit();
}
</script>


      
