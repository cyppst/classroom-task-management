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
	$w=array(15,40,35,35,30,30,30,30,30);
	//Header
	$x=1;
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,iconv('UTF-8', 'TIS-620', $header[$i]),1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 

	{
$this->Cell(15,6,$x,1,0,'C');
$serverName = "localhost";
	$userName = "farah_teach";
	$userPassword = "123456";
	$dbName = "farah_teach";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_query($conn,"SET NAMES UTF8");
	$sql="SELECT sum(ex_list_score) as score_exa FROM examination_list WHERE std_id = '".$eachResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."'";
		
$objQuery1 = mysqli_query($conn,$sql) or die ("Error Query [".$strSQL."]");
$result1 = mysqli_fetch_array($objQuery1);

$sql2="SELECT sum(score) as score_work FROM work_score WHERE std_id = '".$eachResult["std_id"]."' and regis_section = '".$_GET["sub_id"]."'";
		
$objQuery2 = mysqli_query($conn,$sql2) or die ("Error Query [".$strSQL."]");
$result2 = mysqli_fetch_array($objQuery2);
		$this->Cell(40,6,$eachResult["std_number"],1);
		$this->Cell(35,6, iconv('UTF-8', 'TIS-620',$eachResult["std_name"]),1);
		$this->Cell(35,6, iconv('UTF-8', 'TIS-620',$eachResult["std_lname"]),1);

		$this->Cell(30,6,$eachResult["cn_score"],1,0,'C');

		$this->Cell(30,6,$result2["score_work"],1,0,'C');


		
		$this->Cell(30,6,$result1["score_exa"],1,0,'C');
	$total=$eachResult["total"]+$eachResult["cn_score"];	
		$this->Cell(30,6,$total,1,0,'C');

$score="";

if(round($total) >=80) { $score= "A" ; }
	else if ((round($total)>=75)&&(round($total)<=79)) { $score= "B+" ; }
	else if ((round($total)>=70)&&(round($total)<=74)) { $score= "B" ; }
	else if ((round($total)>=65)&&(round($total)<=69)) { $score= "C+" ; }
	else if ((round($total)>=60)&&(round($total)<=64)) { $score= "C" ; }
	else if ((round($total)>=55)&&(round($total)<=59)) { $score= "D+" ; }
	else if ((round($total)>=50)&&(round($total)<=54)) { $score= "D" ; }
	else  { $score= "E" ; }

		$this->Cell(30,6,$score,1,0,'C');
		$this->Ln();
$x++;	}
}

//Better table


//Colored table

}

$pdf=new PDF( 'L' , 'mm' , 'A4' );

//Column titles
$header=array('ลำดับ','รหัสนักศึกษา','ชื่อ','นามสุกล','คะแนนเช็คชื่อ','คะแนนส่งงาน','คะแนนสอบ
','คะแนนรวม','เกรด');
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

$strSQL16 ="SELECT count(DISTINCT registration.std_id) as std FROM student inner join  registration on (student.std_id=registration.std_id) WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery16 = mysqli_query($conn,$strSQL16) or die ("Error Query [".$strSQL16."]");
$result16 = mysqli_fetch_array($objQuery16);
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',16);

//*** Table 1 ***//
$pdf->AddPage();
$pdf->Image('logo.png',10,24);

$pdf->SetY(28);
$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','มหาวิทยาลัยราชภัฏสุราษฎร์ธานี'),0,0,"L");

$pdf->SetY(35);
$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','คณะวิทยาศาสตร์และเทคโนโลยี'),0,0,"L");

$pdf->SetY(42);
$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','สาขาวิทยาการคอมพิวเตอร์'),0,0,"L");

$pdf->SetY(20);
	$pdf->SetX(30);
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620','รายงานผลการรเรียน'),0,0,"R");
$pdf->SetY(23);
	$pdf->SetX(30);
	$pdf->Cell(240,10,iconv('UTF-8','TIS-620','รหัสวิชา'),0,0,"R");
	$pdf->Cell(0,10,iconv('UTF-8','TIS-620',$result6["subject_no"]),0,0,"R"); //เขียน pdf


$pdf->SetY(35);
	$pdf->SetX(30);
	
	$pdf->Cell(0,0,iconv('UTF-8','TIS-620',$result6["su_name"]),0,0,"R");
	$pdf->SetY(40);
	$pdf->SetX(30);
	$pdf->Cell(245,5,iconv('UTF-8','TIS-620','SECTION'),0,0,"R");
	$pdf->Cell(0,5,iconv('UTF-8','TIS-620',$result6["section"]),0,0,"R");
	$pdf->SetY(50);
	$pdf->SetX(30);
	$pdf->Cell(240,0,iconv('UTF-8','TIS-620','จำนวนนักศึกษา'),0,0,"R");
	$pdf->Cell(5,0,iconv('UTF-8','TIS-620',$result16["std"]),0,0,"R"); 
	$pdf->Cell(10,0,iconv('UTF-8','TIS-620','คน'),0,0,"R");//เขียน pdf
$pdf->Ln(10);
$pdf->BasicTable($header,$resultData);

//*** Table 2 ***//


//*** Table 3 ***//


$pdf->Output();


?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>