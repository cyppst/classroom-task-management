<?php


include ("connect.php");
$page = "subject_admin";
include ("header_admin.php");


    $tech_id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM subjected";
    $objQuery = mysqli_query($con,$strSQL);


?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
           <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ข้อมูลรายวิชา</h4>
                            <hr>
                        </div>
 
                        <div class="card-body">
                           <a href="subjected.php" class="btn btn-success" ><p class="glyphicon glyphicon-plus-sign">เพิ่มรายวิชา</p></a>
                            <table class="table table-hover" id="" width="100%" cellspacing="0">
                                
                              <thead>
                                    <tr style="font-weight: bold;">
                                    <th>ลำดับ</th>
                                      <th>รหัสวิชา</th>
                                      <th>ชื่อวิชา</th>
                                    
                                      <th>จัดการข้อมูล</th>
                                    </tr>
                              </thead>


                              <tbody>
                                <?php
                                $i=1;
                                if (mysqli_num_rows($objQuery) > 0) {
                                    while($objResult = mysqli_fetch_assoc($objQuery))
                                    {
                                ?>
             
                            <tr style="font-size: 15px;">
                            <td><?=$i;?></td>
                            <td><?=$objResult["su_no"];?></td>
                            <td><?=$objResult["su_name"];?></td>
                           
                            
 
                            
                             
                            <td>
                            <A HREF="su_admin_edit.php?su_id=<?=$objResult["su_id"]?>" title="แก้ไข" class="btn btn-info"  onclick="return confirm('คุณต้องการแก้ไขหรือไม่ Y/N');"><i class="fa fa-edit" ></i></a>
                          &nbsp;&nbsp;
                              <A HREF="su_admin_del.php?su_id=<?=$objResult["su_id"]?>" title="ลบ" class="btn btn-danger"  onclick="return confirm('คุณต้องการลบหรือไม่ Y/N');"><i class="fa fa-close" ></i></a>
                            </td>


                  
                           
                            </tr>
                            </tbody>
                              <?php
                              $i++;
                                }}
                            ?>
                            </table>


                        </div>

                    </div>
                </div>
            </div>


<?php

include ("footer.php");

?>

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- นำเข้า  CSS จาก Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- นำเข้า  CSS จาก dataTables -->
        <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
         
        <!-- นำเข้า  Javascript จาก  Jquery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- นำเข้า  Javascript  จาก   dataTables -->
        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
 
        <script type="text/javascript">
            //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
            $(function(){
                //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
                $('#example').dataTable();
            });
        </script>
 