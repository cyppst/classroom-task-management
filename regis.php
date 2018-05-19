<?php


include ("connect.php");
$page = "regis";
include ("header.php");


    $tech_id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM subject inner join subjected ON subject.subject_no=subjected.su_no  WHERE tech_id = '".$_SESSION['UserID']."' ";
    $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

?>

           <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">การลงทะเบียน</h4>
                            <hr>
                        </div>

                        <div class="card-body">
                           
                           <table class="table table-hover" id="" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>รหัสวิชา</th>
                                  
                                  <th>ชื่อวิชา</th>
                                  <th>SECTION</th>
                                  <th>จัดการ</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php
                                    while($objResult = mysqli_fetch_assoc($objQuery))
                                    {
                                ?>
              
                                <tr> 
                                <td><?=$objResult["subject_no"];?></td>
                                <td><?=$objResult["su_name"];?></td>
                                <td>
                                  
                                <font color="red" > ยังไม่กำหนด </font>

                                </td>
                                <td> <a href="stu_view.php?sub_id=<?=$objResult["sub_id"]?>">&nbsp;&nbsp;<img src="../icon/registration.png" width="30" height="30"></a></td>
                                </tr>
                                
                                </tbody>
                                  <?php
                                    }
                                ?>
                                </table>

                        </div>
                    </div>
                </div>
            </div>


<?php

include ("footer.php");

?>