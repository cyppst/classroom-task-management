<!DOCTYPE html>
<html lang="th">
<?php
session_start(); 
include("coconnect.php");
//include "connect.php";
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ระบบบริหารจัดการเรียนการสอน สาขาวิทยาการคอมพิวเตอร์</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="main_tech.php"> <?php echo $_SESSION["no"];?>  <?php echo $_SESSION["tech_name"];?> &nbsp;&nbsp;<?php echo $_SESSION["tech_lname"];?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="main_tech.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">หน้าหลัก</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="subject.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">รายวิชา</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="regis.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">การลงทะเบียน</span>
          </a>
        </li>
      
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       
      
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
    
<form action="save_subject.php" name="frmMain" method="post">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>รหัสวิชา(ชื่อวิชา)</th>
                   <td><select name="name" id="name">
<?php
    $q="select * from subjected ";
    $qr=mysql_query($q);
    while($rs=mysql_fetch_array($qr)){
?>
  <option value="<?php echo $rs['su_no'];?>"><?=$rs['su_no']?>(<?=$rs['su_name']?>)</option>
<?php } ?>    
</select>

</td>
                  </tr>
                  <tr>
                  <th>ปีการศึกษา</th>
                  <td><select name="year" id="year">
<?php
    $q="select * from subjected ";
    $qr=mysql_query($q);
    while($rs=mysql_fetch_array($qr)){
?>
  <option value="<?=$rs['su_year']?>"><?=$rs['su_year']?></option>
<?php } ?>    
</select></td>
                  </tr>
                  <tr>
                  <th>เทอม</th>
                  <td><select name="sem">
<option  selected="">เทอม</option>
<option value="1">1</option>
<option value="2">2</option>
</select></center></td>
                </tr>

<tr>
                  <th> <input type="submit" name="submit" value="ตกลง"></th>
                  <td><button type="button" onclick="window.location='subject.php'">ย้อนกลับ</button></td>
                </tr>
 
              </thead>
            
              <tbody>
                <tr>
                

                  
                   

       

                 
 
                
              </tbody>
          
            </table>

    </form>


      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
         
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบ</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">คุณต้องการออกจากระบบใช่หรือไม่</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
