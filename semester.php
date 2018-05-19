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
        <a href="semester_admin.php">เพิ่มปีการศึกษา</a>
    </li>  
    <li class="breadcrumb-item active">ข้อมูลปีการศึกษา</li>
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
                                                <input type="text" class="form-control" name="name" placeholder="กรอกภาคเรียน" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ภาคเรียน</label>
                                                <input type="text" class="form-control" name="year" placeholder="กรอกปีการศึกษา" maxlength="50" required>
                                            </div>
                                        </div>
                                  </div>
                                       
                                      <hr>
                                        <div class="row">
                                          <div class="col-md-7 pr-1">    
                                            <input type="submit" name="submit" value="Save" class="btn btn-info btn-fill pull-right">   
                                          </div>
                                        </div> 

                                  

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