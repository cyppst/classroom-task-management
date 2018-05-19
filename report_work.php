<?php

error_reporting(0);
include ("connect.php");
include ("header.php");

//include();

$strSQL = "SELECT * FROM registration inner join student ON registration.std_id=student.std_id WHERE regis_section = '".$_GET["sub_id"]."'";
  $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

  $strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
  $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);

$strSQL3 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");


?>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
                            <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
                          
                            <hr>
 <p> <a href="pdf_stu.php?sub_id=<?=$objResult2["sub_id"]?>">แบบรายงาน</a><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right">ข้อมูลการส่งงาน<span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span><font color="red" >รายงานข้อมูลการส่งงาน</font></p>

                        </div>

                  
                        <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
                        <div class="card-body">   


  



  <table class="table table-bordered" id="example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เรื่อง</th>
                        <th>คะแนน</th>
                        <th>จัดการ</th>
               <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <th>ลำดับ</th>
                        <th>เรื่อง</th>
                        <th>คะแนน</th>
                        <th>จัดการ</th>
                   <th></th>
                    </tr>
                </tfoot>
                <tbody>
 
                 <?php
 $i=1;
   while($objResult3 = mysqli_fetch_array($objQuery3))
{
   ?>
  <tr>
  <td><div align="center">
    <?php

  echo $i; 
$i++;
  ?>
</div>
  </td>
    <td><div align="center">
  <?php 

  echo $objResult3["work_name"]; 

  ?>
  </div></td>
   

<td><div align="center"> <?php 

  echo $objResult3["work_score"]; 

  ?></div>
</td>
<td>
<div align="center">
  <A HREF="report_work_view.php?work_id=<?=$objResult3["work_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="แก้ไข" class="btn btn-info" ><i class="fa fa-edit"></i></a>
 </div>
</td>
   <td>  </td>                
                    </tr>
                   <?php
}


?>
                </tbody>
            </table>


            </div>
                    </div>
                </div>
            </div>

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
 
