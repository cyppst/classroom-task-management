<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
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
	$w=array(20,45,45,45,35);
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
	$sql="SELECT ex_list_score as score_exa FROM examination_list WHERE std_id = '".$eachResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."' and exa_id = '".$_GET["exa_id"]."'";
		
$objQuery1 = mysqli_query($conn,$sql) or die ("Error Query [".$strSQL."]");
$result1 = mysqli_fetch_array($objQuery1);

$sql2="SELECT sum(score) as score_work FROM work_score WHERE std_id = '".$eachResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."'";
		
$objQuery2 = mysqli_query($conn,$sql2) or die ("Error Query [".$strSQL."]");
$result2 = mysqli_fetch_array($objQuery2);
		$this->Cell(45,6,$eachResult["std_number"],1);
		$this->Cell(45,6, iconv('UTF-8', 'TIS-620',$eachResult["std_name"]),1);
		$this->Cell(45,6, iconv('UTF-8', 'TIS-620',$eachResult["std_lname"]),1);
		$this->Cell(35,6,$result1["score_exa"],1,0,'C');


		$this->Ln();
$x++;	}
}

//Better table


//Colored table

}

$pdf=new PDF();

//Column titles
$header=array('ลำดับ','รหัสนักศึกษา','ชื่อ','นามสุกล','คะแนน');
//Data loading
	$serverName = "localhost";
	$userName = "farah_teach";
	$userPassword = "123456";
	$dbName = "farah_teach";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_query($conn,"SET NAMES UTF8");




	
$strSQL ="SELECT * FROM criteria Left join student ON (criteria.std_id=student.std_id) WHERE criteria.regis_section = '".$_GET["sub_id"]."'";
$objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");

$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
	




}
//************************//
$strSQL6 ="SELECT * FROM subject inner join  subjected on (subject.subject_no=subjected.su_no) WHERE sub_id = '".$_GET["sub_id"]."'";
$objQuery6 = mysqli_query($conn,$strSQL6) or die ("Error Query [".$strSQL6."]");
$result6 = mysqli_fetch_array($objQuery6);

$strSQL16 ="SELECT count(std_id) as std FROM examination_list WHERE regis_section = '".$_GET["sub_id"]."'  and exa_id = '".$_GET["exa_id"]."' and ex_list_score = '0' ";
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

$pdf->SetY(20);
	$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','รายงานคะแนนการสอบ'),0,0,"R");

$pdf->SetY(36);
$pdf->SetX(30);
$pdf->Cell(0,0,iconv('UTF-8','TIS-620','สาขาวิทยาการคอมพิวเตอร์'),0,0,"L");

$pdf->SetY(23);
	$pdf->SetX(30);
	$pdf->Cell(150,10,iconv('UTF-8','TIS-620','รหัสวิชา'),0,0,"R");
	$pdf->Cell(0,10,iconv('UTF-8','TIS-620',$result6["subject_no"]),0,0,"R"); //เขียน pdf


$pdf->SetY(35);
	$pdf->SetX(30);
	
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620',$result6["su_name"]),0,0,"R");
	$pdf->SetY(40);
	$pdf->SetX(30);
	$pdf->Cell(160,5,iconv('UTF-8','TIS-620','SECTION'),0,0,"R");
	$pdf->Cell(0,5,iconv('UTF-8','TIS-620',$result6["section"]),0,0,"R");
$pdf->SetY(50);
	$pdf->SetX(30);
	$pdf->Cell(160,0,iconv('UTF-8','TIS-620','จำนานผู้ขาดสอบ'),0,0,"R");
	$pdf->Cell(4,0,iconv('UTF-8','TIS-620',$result16["std"]),0,0,"R"); //เขียน pdf
	$pdf->Cell(7,0,iconv('UTF-8','TIS-620',' คน'),0,0,"R");

$pdf->Ln(10);
$pdf->BasicTable($header,$resultData);

//*** Table 2 ***//


//*** Table 3 ***//


$pdf->Output();


?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>