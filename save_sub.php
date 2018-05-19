<html>
<head>

</head>
<body>
<?php
include("coconnect.php");
$strSQL = "UPDATE subject SET ";
$strSQL .="subject_no = '".$_POST["subject_no"]."' ";
$strSQL .="sub_name = '".$_POST["sub_name"]."' ";
$strSQL .=",sub_year = '".$_POST["year"]."' ";
$strSQL .=",sub_sem = '".$_POST["sem"]."' ";
$strSQL .="WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
    echo "<meta http-equiv='refresh' content='1;URL=subject.php'>";
}
else
{
    echo "Error Save [".$strSQL."]";
}

?>
</body>
</html>