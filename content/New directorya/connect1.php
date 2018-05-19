<?php
// ฟังก์ชันสำหรับเชื่อมต่อกับฐานข้อมูล
function connect()
{
  // เริ่มต้นส่วนกำหนดการเชิ่อมต่อฐานข้อมูล //  
	 $db_config=array(
		//"host"=>"127.0.0.1",  // กำหนด host
		//"user"=>"u259763121", // กำหนดชื่อ user
		//"pass"=>"u259763121_12345",   // กำหนดรหัสผ่าน
		//"dbname"=>"u259763121_edoc",  // กำหนดชื่อฐานข้อมูล
		//"charset"=>"utf8"  // กำหนด charset
		
		"host"=>"localhost",  // กำหนด host
		"user"=>"root", // กำหนดชื่อ user
		"pass"=>"123456789",   // กำหนดรหัสผ่าน
		"dbname"=>"management",  // กำหนดชื่อฐานข้อมูล
		"charset"=>"utf8"
	);
   // สิ้นสุุดส่วนกำหนดการเชิ่อมต่อฐานข้อมูล // 
  
    global $mysqli;
	
	//  Global ตัวแปร ระดับโกลบอล เมื่อมีการประกาศแล้วสามารถทำการเรียกใช้ค่าตัวแปรนั้น ๆ 
    //  ได้จากชื่อตัวแปรโดยตรงและยังถูกจำเข้าสู่หน่อยความจำ 
    //  คือตัวแปรโกลบอลสามารถเรียกใช้งานได้ทั้งภายนอกและภายใน function และสามารถเรียกใช้งานได้ทั้งโปรเจค	
	$mysqli = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
	if(mysqli_connect_error()) {
		die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		exit;
	}
	if(!$mysqli->set_charset($db_config["charset"])) { // เปลี่ยน charset เป้น utf8 พร้อมตรวจสอบการเปลี่ยน
	//    printf("Error loading character set utf8: %sn", $mysqli->error);  // ถ้าเปลี่ยนไม่ได้
	}else{
	//    printf("Current character set: %sn", $mysqli->character_set_name()); // ถ้าเปลี่ยนได้
	}
	return $mysqli;
	//echo $mysqli->character_set_name();  // แสดง charset เอา comment ออก
	//echo 'Success... ' . $mysqli->host_info . "n";
	//$mysqli->close(); 
	//$title = "Working Formula Online";
	//$version = "?version=1"; 
}
//	  ฟังก์ชันสำหรับคิวรี่คำสั่ง sql
function query($sql)
{
	global $mysqli;
	if($mysqli->query($sql)) { return true; } 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชัน select ข้อมูลในฐานข้อมูลมาแสดง

	function num_record($table,$condition)
							{
						
									global $mysqli;
	$sql = "select count(*) AS numroww from $table $condition";	
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	$result= $res->fetch_assoc();
		
	return $result;	
							}
							

function select($table,$condition)
{
	global $mysqli;
	$sql = "select * from $table $condition";	
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	$result= $res->fetch_assoc();
		
	return $result;	
}

function selectss($sql)
{
	global $mysqli;
	//$sql = "select * from $table $condition";	
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	$result= $res->fetch_assoc();
		
	return $result;	
}
//    ฟังก์ชัน select หลายข้อมูลในฐานข้อมูลมาแสดง
function selects($table,$condition)
{
	global $mysqli;
	$sql = "select * from $table $condition";	
	$result=array();
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	while($data= $res->fetch_assoc()) {
		$result[]=$data;
	}
	return $result;	
}

//    ฟังก์ชันสำหรับการ insert ข้อมูล
	function insert($table,$field,$value)
							{
								global $mysqli;	
									$sql = "INSERT INTO $table ($field) VaLUES ($value)";
									//echo $sql;
								if($mysqli->query($sql)) { return true; } 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
							}
//    ฟังก์ชันสำหรับการ update ข้อมูล
function update($table,$data,$where)
{
	global $mysqli;			

	$sql = ("UPDATE $table SET $data WHERE $where");
	if($mysqli->query($sql)) {
		 return true; } 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชันสำหรับการ delete ข้อมูล
function delete($table, $where)
{
	global $mysqli;			
	$sql = "DELETE FROM $table WHERE $where";
	if($mysqli->query($sql)) { return true; } 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชันสำหรับแสดงรายการฟิลด์ในตาราง
function listfield($table)
{
	global $mysqli;			
	$sql="SELECT * FROM $table LIMIT 1 ";
	$row_title="\$data=array(<br/>";
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	$i=1;
	while($data= $res->fetch_field()) {
		$var=$data->name;
		$row_title.="\"$var\"=>\"value$i\",<br/>";
		$i++;
	}	
	$row_title.=");<br/>";
	echo $row_title;
}
function chk_login(){
	if($_SESSION['logon'] != 1){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
		echo("<script>alert('ผิดพลาด! คุณไม่ได้รับอนุญาติให้เข้าใช้งานระบบ'); window.location='./';</script>");
		exit();
		}
}
function Modal($mid,$type,$title,$text){
	if($type=='error'){
		$color="color:#cc0000;font-size:16px;";
	}
	if($type=='success'){
		$color="color:#009900;font-size:16px;";
	}
	echo "<div id='$mid' class='modal hide fade in'>
	<div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal'>×</button>
		<h3 style='$color'>$title</h3>
	</div>
	<div class='modal-body'>
		<p>$text</p>
	</div>
	</div>";
}


$month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

?>
