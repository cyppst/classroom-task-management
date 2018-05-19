<?php

//error_reporting(0);
include ("connect.php");
include ("header_student.php");

//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


//$strSQL ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.exa_id = '".$_GET["exa_id"]."'";
//$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
$strSQL ="SELECT * FROM work Left join work_score ON (work.work_id=work_score.work_id) Left join student ON (work_score.std_id=student.std_id) WHERE work_score.regis_section = '".$_GET["sub_id"]."' GROUP BY work_score.work_id";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);


$strSQL3 = "SELECT SUM(work_score) as score3 FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$strSQL1 ="SELECT DISTINCTROW student.std_number,student.std_name,student.std_lname FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination.regis_section = '".$_GET["sub_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");
$objResult1 = mysqli_fetch_array($objQuery1);

//$strSQL10 ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination.exa_id = '".$_GET["exa_id"]."'";
//$objQuery10 = mysqli_query($con,$strSQL10) or die ("Error Query [".$strSQL10."]");
$strSQL7 ="SELECT * FROM work_score Left join student ON (work_score.std_id=student.std_id)  WHERE work_score.regis_section = '".$_GET["sub_id"]."' GROUP BY student.std_id";
$objQuery7 = mysqli_query($con,$strSQL7) or die ("Error Query [".$strSQL7."]");

$strSQL6 ="SELECT student.std_id,student.std_number,student.std_name,student.std_lname,SUM(score) as score FROM work_score Left join student ON (work_score.std_id=student.std_id)  WHERE work_score.regis_section = '".$_GET["sub_id"]."' GROUP BY student.std_id ";
$objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");
//$objResult6 = mysqli_fetch_array($objQuery6);

$strSQL13 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery13 = mysqli_query($con,$strSQL13) or die ("Error Query [".$strSQL13."]");



$strSQL5 = "SELECT * FROM examination WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_assoc($objQuery5);

?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="dist/chart/chart.js/dist/Chart.bundle.js"></script>

<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลการส่งงาน&nbsp;/&nbsp;คะแนนการส่งงานทั้งหมด</h4></li>
  
</ol>
 <hr>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                      <div class="card-body">
                          <div style="width: 75%">
                            <canvas id="canvas"></canvas>
                        </div>
                      </div>
                </div>
            </div>
        </div>
<?php
include ("footer.php"); 
?>


<script>
   
  <?php 
    $a = 40;
    $b= 60;

    $a1 = 50;
    $b1= 56;


   ?>
     var barChartData = {
        labels: ["วิชาภาษไทย", "วิชาสังคม"],
        datasets: [{
            label: 'ก่อนเรียน',
            backgroundColor: "rgba(0,220,220,1)",
            yAxisID: "y-axis-1",
            data: [<?php echo $a; ?>,<?php echo $a1; ?>,'']
        },{
            label: 'หลังเรียน',
            backgroundColor: "rgba(0,220,120,1)",
            yAxisID: "y-axis-1",
            data: [<?php echo $b; ?>,<?php echo $b1; ?>,'']
        },]
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = Chart.Bar(ctx, {
            data: barChartData, 
            options: {
                responsive: true,
                hoverMode: 'label',
                hoverAnimationDuration: 400,
                stacked: true,
                title:{
                    display:true,
                    text:"คะแนนประจำปี 2560"
                },
                scales: {
                    yAxes: [{
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "left",
                        id: "y-axis-1",
                    }, {
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "right",
                        id: "y-axis-2",
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }],
                }
            }
        });
    };

  
    </script>
