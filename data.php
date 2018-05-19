
<?php
       //ตรวจสอบว่ามีการส่งค่าตัวแปร $_POST['value'] หรือไม่
    if(!isset($_POST['value'])){
        exit();
    }
    //ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $database_host             = 'localhost';
    $database_username         = 'root';
    $database_password         = '123456789';
    $database_name             = 'management';
 
    $mysqli = new mysqli($database_host, $database_username, $database_password, $database_name);
//กำหนด charset ให้เป็น utf8 เพื่อรองรับภาษาไทย
    $mysqli->set_charset("utf8");
 
//กรณีมี Error เกิดขึ้น
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    
    //MySqli Select Query
    $value = '%'.$_POST['value'].'%';
    $results = $mysqli->prepare("SELECT id,name FROM user WHERE name LIKE ? ");
    $results->bind_param("s",$value);
    $results->execute();
    $results->bind_result($id,$name);
    
    while($results->fetch()){
        echo"<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td";
        echo"</tr>";
    }
?>