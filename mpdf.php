<?php
ob_start();

$html = ob_get_clean();

$html = utf8_encode($html);

$html .='<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-us36{border-color:inherit;vertical-align:top}
.tg .tg-ydyv{background-color:#D2E4FC;border-color:inherit;text-align:right;vertical-align:top}
.tg .tg-ov9q{background-color:#D2E4FC;border-color:inherit;vertical-align:top}
.tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-c3ow" colspan="6">การเข้าเรียนนักศึกษา</th>
  </tr>
  <tr>
    <td class="tg-ov9q">รหัสนักศึกษา</td>
    <td class="tg-ov9q">ชื่อ-นามสกุล</td>
    <td class="tg-ov9q">มา</td>
    <td class="tg-ov9q">สาย</td>
    <td class="tg-ov9q">ขาด</td>
    <td class="tg-ov9q">ลา</td>
  </tr>
  <tr>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-dvpl"></td>
    <td class="tg-dvpl"></td>
    <td class="tg-dvpl"></td>
    <td class="tg-dvpl"></td>
  </tr>
</table>';

include("MPDF60/mpdf.php");
$mpdf = new mPDF();

$mpdf->allow_charset_conversion = true;

$mpdf->charset_in = 'UTF-8';

$mpdf->WriteHTML($html);

$mpdf->Output("MyPDF/MyPDF.pdf","F");

exit();


?>

PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download