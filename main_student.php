<?php


include ("connect.php");
$page = "main_student";
include ("header_student.php");


    $std_id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM student where std_id='$std_id'";
    $objQuery = mysqli_query($con,$strSQL);


?>

           <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ข้อมูลส่วนตัว</h4>
                            <hr>
                        </div>

                        <div class="card-body">
                           
                            <table class="table table-hover" id="" width="100%" cellspacing="0">
                                
                              <thead>
                                    <tr style="font-weight: bold;">
                                      <th>Username</th>
                                      <th>ชื่อ</th>
                                      <th>นามสกุล</th>
                                      <th>เบอร์โทร</th>
                                      <th>LINE</th>
                                      <th>จัดการข้อมูล</th>
                                    </tr>
                              </thead>


                              <tbody>
                                <?php
                                if (mysqli_num_rows($objQuery) > 0) {
                                    while($objResult = mysqli_fetch_assoc($objQuery))
                                    {
                                ?>
             
                            <tr style="font-size: 15px;">
                              <td><?=$objResult["std_number"];?></td>
                            <td><?=$objResult["std_name"];?></td>
                            <td><?=$objResult["std_lname"];?></td>
                            <td><?=$objResult["std_phone"];?></td>
                            <td><?=$objResult["std_line"];?></td>
                             
                            <td><A HREF="edit_student.php?std_id=<?=$objResult["std_id"]?>" title="แก้ไข" class="btn btn-info btn-fill pull"  onclick="return confirm('คุณต้องการแก้ไขหรือไม่ Y/N');"><i class="fa fa-edit" ></i></a></td>


                  
                           
                            </tr>
                            </tbody>
                              <?php
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
