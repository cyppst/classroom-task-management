<?php
ob_start();
session_start();
include "connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);

require('fpdf.php'); //ไฟล์ฟังก์ชัน
	
	define('FPDF_FONTPATH','font/');
	
	$pdf=new FPDF();	
	
	$pdf->SetAutoPageBreak(false);	
	$pdf->AddPage(); //สร้าง pdf
	$pdf->SetMargins(6,5,5); //ตั้งค่ากระดาฐ
	$pdf->AddFont('THSarabun','','THSarabun.php'); //กำหนด font
	$pdf->AddFont('THSarabun','B','THSarabun Bold.php');
		

	
	$strSQL = "SELECT *, setting.eq_zone_detail as set_zone FROM setting 
		inner join equipment on equipment.eq_id = setting.eq_id
		where setting.set_id = '$_GET[set_id]'";
	$stmt  = mysqli_query($conn, $strSQL);
	$row = mysqli_fetch_array($stmt);
	
	$strSQL_faculty = "SELECT * FROM faculty where faculty_id = '$row[faculty_id]'  ";
	$stmt_faculty  = mysqli_query($conn, $strSQL_faculty);
	$row_faculty = mysqli_fetch_array($stmt_faculty);
	
	$strSQL_eq = "SELECT * FROM equipment where eq_id = '$row[eq_id]' ";
	$stmt_eq  = mysqli_query($conn, $strSQL_eq);
	$row_eq = mysqli_fetch_array($stmt_eq);
	
	if($row[eq_type] == 1){
		$eq_type= 'งานไม้และอลูมิเนียมเหล็ก';
	}else if($row[eq_type] == 2){
		$eq_type= 'งานประปาและสุขภัณฑ์';
	}else if($row[eq_type] == 3){
		$eq_type= 'งานไฟฟ้า';
	}else if($row[eq_type] == 4){
		$eq_type= 'งานอิเล็กทรอนิกส์';
	}

	$mm=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
			
	$pdf->SetFont('THSarabun','B',20); //ตั้งค่าฟอน
	$pdf->Image('img/form.jpg',0,0,210,300); //เรียกใช้รูป
	
	$pdf->SetFont('THSarabun','',16);
	
	$pdf->SetY(50); //กำหนดระยะจากขอบบนกระดาษ
	$pdf->SetX(100); //กำหนดระยะจากขอบซ้าย
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','วันที่'),0,0,"L"); //เขียน pdf
	$pdf->SetX(110);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620',date('d', strtotime($row[set_date]))),0,0,"L");
	$pdf->SetX(118);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620',$mm[date('m', strtotime($row[set_date]))-1]),0,0,"L");
	$pdf->SetX(135);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620',date('Y', strtotime($row[set_date]))+543),0,0,"L");
	
	$pdf->SetY(60);
	$pdf->SetX(35);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','แจ้งซ่อม'.$eq_type),0,0,"L");
	
	$pdf->SetY(67);
	$pdf->SetX(35);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','ผู้อำนวนการสำนักงานอธิการบดี'),0,0,"L");
	
	$pdf->SetY(88);
	$pdf->SetX(21);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','ผู้แจ้ง '.$row[user_name]),0,0,"L");
	$pdf->SetX(90);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','คณะ '.$row_faculty[faculty_name]),0,0,"L");
	$pdf->SetX(150);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','เวลาที่แจ้ง '.date('H:i', strtotime($row[set_date])).' นาฬิกา'),0,0,"L");
	
	$pdf->SetY(97);
	$pdf->SetX(21);
	$pdf->SetFont('THSarabun','B',16);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','รายละเอียดการแจ้งซ่อม'),0,0,"L");
	
	$pdf->SetY(105);
	$pdf->SetX(21);
	$pdf->SetFont('THSarabun','',16);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','ชื่อครุภัณฑ์ '.$row_eq[eq_name]),0,0,"L");
	$pdf->SetX(90);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','จำนวน '.$row[eq_amout]),0,0,"L");
	$pdf->SetX(120);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','สถานที่ '.$row[eq_zone].' '.$row[eq_zone_detail]),0,0,"L");
	
	$pdf->SetY(112);
	$pdf->SetX(21);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','อาการ '.$row[set_detail]),0,0,"L");

	
	// footer
	$pdf->SetFont('THSarabun','',10);
	$pdf->SetY('207');
	
	///////////////////////////////	
	$pdf->Output(); //คำสั่งให้เปิดไฟล์ pdf ที่สร้าง
?> 