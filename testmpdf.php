
<?php 
require "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=management','root','123456789');
mysql_query($db,"SET NAMES UTF8");
class myPDF extends FPDF{
function conv($string) {
return iconv('UTF-8', 'TIS-620', $string);
   }

    function header(){
        $this->image('logo.png',10,6);
$this->SetFont('angsa','',24);
         $this->Cell(276,5,iconv("UTF-8","TIS-620",'มหาวิทยาลัยราชภัชสุราษฏร์ธานี'),0,0,'C');
        $this->Ln();
        $this->Ln();
        $this->SetFont('angsa','',20);
        $this->Cell(276,5,iconv("UTF-8","TIS-620",'สาขาวิทยาการคอมพิวเตอร์'),0,0,'C');
         $this->Ln(20);

       
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('angsa','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){

        $this->SetFont('angsa','',12);
        $this->Cell(20,10,iconv("UTF-8","TIS-620",'ลำดับ'),1,0,'C');
        $this->Cell(40,10,iconv("UTF-8","TIS-620",'รหัสนักศึกษา'),1,0,'C');
        $this->Cell(40,10,iconv("UTF-8","TIS-620",'ชื่อ-นามสกุล'),1,0,'C');
        $this->Cell(40,10,iconv("UTF-8","TIS-620",'กลุ่มเรียน'),1,0,'C');
        $this->Cell(20,10,iconv("UTF-8","TIS-620",'เบอร์โทร'),1,0,'C');
        $this->Cell(30,10,iconv("UTF-8","TIS-620",'Line'),1,0,'C');
        
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('angsa','',12);
        $stmt = $db->query('select * from student');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(20,10,$data->std_id,1,0,'C');

            $this->Cell(40,10,$data->std_number,1,0,'L');
            $this->Cell(40,10,$data->std_group,1,0,'L');
            $this->Cell(40,10,$this->conv($data->std_lname),1,0,'L');
            
            $this->Ln();


        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',16);
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();

?>
<table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" align="laft"><img src="logo.png" alt="" width="70" height="85"></td>
    <td width="50" align="laft"><h4 class="style2">มหาวิทยาลัยราชภัชสุราษฏร์ธานี</h4>
      <br><span class="style2">สาขาวิทยาการคอมพิวเตอร์</span></td>
    <td align="right"><span class="style2">รายงานผลคะแนนสอบก่อนเรียนหลังเรียนของนักศึกษา</span>
      <br><br><span class="style2">วิชา :</span></td>
  </tr>
</table>

 <hr>
 <html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>
<?php
    require('fpdf.php');

    define('FPDF_FONTPATH','font/');

    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->AddFont('angsa','','angsa.php');
    $pdf->SetFont('angsa','',36);
    $pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','สวัสดี ชาวไทยครีเอท'),0,1,"C");
    $pdf->Output("MyPDF/MyPDF.pdf","F");
?>
    PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>