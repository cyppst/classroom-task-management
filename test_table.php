<?php
include ("connect.php");
include ("header.php");
$strSQL3 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Data Tables</title>
 

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
  </head>
  <body>
  
<h1>Data Tables </h1>
 
        <table class="table table-bordered" id="example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เรื่อง</th>
                        <th>คะแนน</th>
                        <th>จัดการ</th>
             
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <th>ลำดับ</th>
                        <th>เรื่อง</th>
                        <th>คะแนน</th>
                        <th>จัดการ</th>
                   
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
  <A HREF="edit_cn.php?cn_id=<?=$objResult3["cn_id"]?>&sub_id=<?=$objResult2["sub_id"]?>" title="แก้ไข" class="btn btn-info" ><i class="fa fa-edit"></i></a>
 
<A HREF="cn_frm_del.php?cn_id=<?=$objResult3["cn_id"]?>" title="ลบ" class="btn btn-danger"  onclick="return confirm('คุณต้องการลบหรือไม่ Y/N');"><i class="fa fa-close" ></i></a></div>
</td>
                     
                    </tr>
                   <?php
}


?>
                </tbody>
            </table>
        
  </body>
</html>
