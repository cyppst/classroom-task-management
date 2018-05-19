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
        <a href="subject_admin.php">เพิ่มวิชา</a>
    </li>  
    <li class="breadcrumb-item active">ข้อมูลวิชา</li>
</ol>


      <div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลวิชา</h4>
                                            <hr>
                                        </div>

                                    <div class="card-body">      

                                         <form action="admin_save_subject.php" name="form1" method="post" onSubmit="JavaScript:return fncSubmit();">
                    
                    

                            

                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>รหัสวิชา</label>
                                                <input type="text" class="form-control" name="name" placeholder="กรอกรหัสวิชา" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ชื่อวิชา</label>
                                                <input type="text" class="form-control" name="lname" placeholder="กรอกวิชา" maxlength="50" required>
                                            </div>
                                        </div>
                                        </div>
                                       

                    <hr>
                               

<center>
<a href="subject_admin.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
  <input type="submit" name="submit" value="อัพเดต" class="btn btn-info btn-fill pull">   
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

