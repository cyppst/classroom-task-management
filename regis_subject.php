<?php

include ("connect.php");

include ("header.php");


  $tech_id = $_SESSION['UserID'];
  $strSQL = "SELECT * FROM subject 
          inner join teacher ON subject.tech_id=teacher.tech_id  
          inner join subjected ON subject.subject_no=subjected.su_no WHERE subject.subject_no = '".$_GET["su_id"]."' and teacher.tech_id = '".$_SESSION['UserID']."'";
  $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL2 = "SELECT * FROM subject 
          inner join teacher ON subject.tech_id=teacher.tech_id  
          inner join subjected ON subject.subject_no=subjected.su_no WHERE subject.subject_no = '".$_GET["su_id"]."' and teacher.tech_id = '".$_SESSION['UserID']."'";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);

?>





        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="main_subject.php">รายวิชาที่ลงทะเบียน</a>
    </li>  
    <li class="breadcrumb-item active">วิชา<?=$objResult2["su_name"];?></li>
</ol>
      
                        <h4 class="card-title">Section</h4>
                            <hr>
              </div>
 
  
                  
                  <div class="card-body">


                    
                           
                              <table class="table table-hover" id="data-table">
                                        <thead>
                                        <th>ลำดับ</th>
                                            <th>รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                <th>section</th>
                                 <th>เทอม/ปีการศึกษา</th>
                                <th>จัดการข้อมูล</th>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $i=1;
                      while($objResult = mysqli_fetch_assoc($objQuery))
                      {
                    ?>

                  <tr>
                  <td><?=$i;?></td>
                            <td><?=$objResult["subject_no"];?></td>
                            <td><?=$objResult["su_name"];?></td>
                            <td><?=$objResult["section"];?></td>
                <td><?=$objResult["sub_sem"];?>&nbsp;/&nbsp;<?=$objResult["sub_year"];?></td>
            
                    <td> 
                    <A HREF="stu_view.php?sub_id=<?=$objResult["sub_id"]?>" title="จัดการคะแนน" class="btn btn-success btn-fill " ><i class=" fa fa-share-alt"></i></a>&nbsp;&nbsp;
                
                   

                         
                </tr>  
                        </tbody>
                <?php
                 $i++; }
                ?>
                
                                </table>
                        </div>
                    </div>
                </div>
            </div>



<?php

include ("footer.php");

?>

 
        <script type="text/javascript">
            //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
            $(function(){
                //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
                $('#example').dataTable();
            });
        </script>