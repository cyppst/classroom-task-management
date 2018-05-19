<?php

session_start(); 
include ("connect.php");


?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
 <?

    $new_id =mysqli_fetch_assoc(mysqli_query($con,"Select Max(substr(sub_id,-4))+1 as MaxID from  subject"));//เลือกเอาค่า id ที่มากที่สุดในฐานข้อมูลและบวก 1 เข้าไปด้วยเลย
            if($new_id==''){ // ถ้าได้เป็นค่าว่าง หรือ null ก็แสดงว่ายังไม่มีข้อมูลในฐานข้อมูล
                $sub_id="N0001";
            }else{
                $sub_id="N".sprintf("%04d",$new_id);//ถ้าไม่ใช่ค่าว่าง
            }

    $id="";
$strSQL = "INSERT INTO subject ";
$strSQL .="(sub_id,subject_no,sub_name,sub_year,sub_sem,tech_id) ";
$strSQL .="VALUES ";
$strSQL .="('".$sub_id."','".$_POST["subject_no"]."','".$_POST["sub_name"]."' ";
$strSQL .=",'".$_POST["sub_year"]."','".$_POST["sub_sem"]."','".$_SESSION["UserID"]."') ";
echo $strSQL;
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{
//echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
  //echo "<meta http-equiv='refresh' content='1;URL=subject.php'>";
}
else
{
 // echo "Error Save [".$strSQL."]";
}

?>
    

</body>
</html>