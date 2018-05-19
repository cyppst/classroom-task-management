<html>
<head>

</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","123456789") or die("Error Connect to Database");
$objDB = mysql_select_db("management");
$strSQL = "UPDATE teacher SET ";
$strSQL .="tech_user = '".$_POST["tech_user"]."' ";
$strSQL .=",tech_pass = '".$_POST["tech_pass"]."' ";
$strSQL .=",no = '".$_POST["no"]."' ";
$strSQL .=",tech_name = '".$_POST["tech_name"]."' ";
$strSQL .=",tech_lname = '".$_POST["tech_lname"]."' ";
$strSQL .=",tech_phone = '".$_POST["tech_phone"]."' ";
$strSQL .="WHERE tech_id = '".$_GET["tech_id"]."' ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='1;URL=main_tech.php'>";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
?>
</body>
</html>