<?php


		$host = "localhost";
		$user = "farah_teach";
		$pwd = "123456";
		$dbname = "farah_teach";

$con=mysqli_connect($host,$user,$pwd);
if (mysqli_connect_errno())
  {
  echo "ต่อฐานข้อมูบ่อได้เด้อ: " . mysqli_connect_error();
  }
mysqli_set_charset( $con, 'utf8' );
mysqli_select_db($con,$dbname);

mysqli_query($con,"SET NAMES UTF8");
mysqli_query($con,"SET character_set_client=utf8");
mysqli_query($con,"SET character_set_connection=utf8");
?>