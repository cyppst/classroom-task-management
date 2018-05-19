<?php


include ("connect.php");
$page = "main_admin";
include ("header_admin.php");


    $ad_id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM admin where ad_id='$ad_id'";
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
                                      <th>คำนำหน้า</th>
                                      <th>ชื่อ นามสกุล</th>
                                      <th>เบอร์โทร</th>
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
                            <td><?=$objResult["no"];?></td>
                            <td><?=$objResult["name"];?></td>
                            <td><?=$objResult["admin_phone"];?></td>
                            
                             
                            <td><a> <A HREF="edit_admin.php?ad_id=<?=$objResult["ad_id"]?>" title="แก้ไข" class="btn btn-info btn-fill pull"  onclick="return confirm('คุณต้องการแก้ไขหรือไม่ Y/N');"><i class="fa fa-edit" ></i></a></td>


                  
                           
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