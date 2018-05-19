<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
<meta charset="utf-8" />
</head>
<body>

<?php

define('FPDF_FONTPATH','font/');
require('fpdf.php');
ob_start();
class PDF extends FPDF
{
//Load data
	function conv($string) {
return iconv('UTF-8', 'TIS-620', $string);
}
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	$w=array(20,40,45,40,40);
	//Header
	$x=1;
	for($i=0;$i<count($header);$i++)
	$this->Cell($w[$i],7,iconv('UTF-8', 'TIS-620', $header[$i]),1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 

	{
$this->Cell(20,6,$x,1,0,'C');
$serverName = "localhost";
	$userName = "farah_teach";
	$userPassword = "123456";
	$dbName = "farah_teach";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_query($conn,"SET NAMES UTF8");
	

		$this->Cell(40,6,$eachResult["std_number"],1,0,'C');
		$this->Cell(45,6, iconv('UTF-8', 'TIS-620',$eachResult["std_name"]),1);
		$this->Cell(40,6, iconv('UTF-8', 'TIS-620',$eachResult["std_lname"]),1);
$this->Cell(40,6, iconv('UTF-8', 'TIS-620',$eachResult["std_group"]),1,0,'C');
		$this->Ln();
$x++;	}
}

//Better table


//Colored table

}

$pdf=new PDF();

//Column titles
$header=array('ลำดับ','รหัสนักศึกษา','ชื่อ','นามสุกล','กลุ่มเรียน');
//Data loading
	$serverName = "localhost";
	$userName = "farah_teach";
	$userPassword = "123456";
	$dbName = "farah_teach";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_query($conn,"SET NAMES UTF8");




	
$strSQL ="SELECT * FROM student inner join registration ON (student.std_id=registration.std_id) WHERE regis_section = '".$_GET["sub_id"]."' Group by student.std_id";
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");

$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
	


}
//************************//

$strSQL7 ="SELECT * FROM subject inner join  subjected on (subject.subject_no=subjected.su_no) WHERE sub_id = '".$_GET["sub_id"]."'";
$objQuery7 = mysqli_query($conn,$strSQL7) or die ("Error Query [".$strSQL7."]");
$result7 = mysqli_fetch_array($objQuery7);
$strSQL6 ="SELECT count(registration.std_id) as std FROM student inner join  registration on (student.std_id=registration.std_id) WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$result6 = mysqli_fetch_array($objQuery6);
$strSQL16 ="SELECT count(DISTINCT registration.std_id) as std FROM student inner join  registration on (student.std_id=registration.std_id) WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery16 = mysqli_query($conn,$strSQL16) or die ("Error Query [".$strSQL16."]");
$result16 = mysqli_fetch_array($objQuery16);
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',16);

//*** Table 1 ***//
$pdf->AddPage();
$pdf->Image('logo.png',10,18);
$pdf->SetY(20);
$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','มหาวิทยาลัยราชภัฏสุราษฎร์ธานี'),0,0,"L");

$pdf->SetY(28);
$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','คณะวิทยาศาสตร์และเทคโนโลยี'),0,0,"L");


$pdf->SetY(36);
$pdf->SetX(30);
$pdf->Cell(0,0,iconv('UTF-8','TIS-620','สาขาวิทยาการคอมพิวเตอร์'),0,0,"L");

$pdf->SetY(20);
	$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','รายงานการเข้าห้องเรียน'),0,0,"R");



	$pdf->SetY(23);
	$pdf->SetX(30);
	$pdf->Cell(150,10,iconv('UTF-8','TIS-620','รหัสวิชา'),0,0,"R");
	$pdf->Cell(0,10,iconv('UTF-8','TIS-620',$result7["subject_no"]),0,0,"R"); //เขียน pdf


$pdf->SetY(35);
	$pdf->SetX(30);
	
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620',$result7["su_name"]),0,0,"R");

	$pdf->SetY(40);
	$pdf->SetX(30);
	$pdf->Cell(160,5,iconv('UTF-8','TIS-620','Sec'),0,0,"R");
	$pdf->Cell(0,5,iconv('UTF-8','TIS-620',$result7["section"]),0,0,"R");
$pdf->SetY(50);
	$pdf->SetX(30);
	$pdf->Cell(155,0,iconv('UTF-8','TIS-620','จำนวนนักศึกษา'),0,0,"R");
	$pdf->Cell(5,0,iconv('UTF-8','TIS-620',$result16["std"]),0,0,"R"); 
	$pdf->Cell(10,0,iconv('UTF-8','TIS-620','คน'),0,0,"R");//เขียน pdf
//	$pdf->SetY(50);
//	$pdf->SetX(30);
//	$pdf->Cell(160,0,iconv('UTF-8','TIS-620','จำนานผู้ไม่ส่งงาน'),0,0,"R");
//	$pdf->Cell(4,0,iconv('UTF-8','TIS-620',$result16["std"]),0,0,"R"); เ
//$pdf->Cell(7,0,iconv('UTF-8','TIS-620',' คน'),0,0,"R");
//เขียน pdf
$pdf->Ln(10);
$pdf->BasicTable($header,$resultData);

//*** Table 2 ***//

//*** Table 3 ***//


$pdf->Output();


?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>