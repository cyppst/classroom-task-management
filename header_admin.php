<?php
session_start();
if(isset($_SESSION["UserID"])){
$sql_select = "SELECT * from support where col_id=1";
$query_select = mysqli_query($con,$sql_select);
$row_select = mysqli_fetch_assoc($query_select);
$num_select = mysqli_num_rows($query_select);
if($_SESSION["typeuser"]==1){
$typeuser = "อาจารย์";
} if($_SESSION["typeuser"]==2){
$typeuser = "ผู้ดูแลระบบ";
}else{$typeuser="นักศึกษา";}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" text="text/css" href="dist/sweetalert.css">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Teaching Management System </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
               <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/css/demo.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="../vendor/clocktime/compiled/flipclock.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <style type="text/css" media="screen">
    table thead tr th {
    color: #6d6f70 !important;
    font-size: 15px !important;
    
    }
    .sidebar:after,
    .sidebar:before,
    body>.navbar-collapse:after,
    body>.navbar-collapse:before {
    display: block;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 2;
    }
    .navbar .navbar-nav .nav-item .nav-link:hover {
    color: #ffffff;
}
.navbar .navbar-nav .nav-item .nav-link {
    color: #ffffff;
    padding: 10px 15px;
    position: relative;
    display: inline-flex;
    line-height: 1.2;
}
    .navbar {
    border: 0;
    font-size: 16px;
    border-radius: 0;
    min-height: 50px;
    background-color: rgb(156, 169, 167);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 5px 15px;
    }
    .footer .copyright {
    color: #f7f3f3;
    padding: 10px 15px;
    margin: 10px 3px;
    line-height: 20px;
    font-size: 14px;
}
.footer {
    background-color: #9ca9a7;
}
.navbar .navbar-brand {
    font-weight: 400;
    margin: 5px 0px;
    font-size: 20px;
    color: #fffbfb;
}
    .sidebar:after,
    body>.navbar-collapse:after {
    background: <?php echo  $row_select["col_code"]; ?>;
    background: -moz-linear-gradient(top,<?php echo  $row_select["col_code"]; ?> 0%, #ff0000 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php echo  $row_select["col_code"]; ?>), color-stop(100%, #ff0000));
    background: -webkit-linear-gradient(top, <?php echo  $row_select["col_code"]; ?> 0%, #ff0000 100%);
    background: -o-linear-gradient(top, <?php echo  $row_select["col_code"]; ?> 0%, #ff0000 100%);
    background: -ms-linear-gradient(top, <?php echo  $row_select["col_code"]; ?> 0%, #ff0000 100%);
    background: linear-gradient(to bottom, <?php echo  $row_select["col_code"]; ?> 0%, #ff0000 100%);
    background-size: 150% 150%;
    z-index: 3;
    opacity: 0.5;
    }
    .sidebar .sidebar-background, body>.navbar-collapse .sidebar-background {
    position: absolute;
    z-index: 1;
    height: 100%;
    width: 100%;
    display: block;
    top: 0;
    left: 0;
    background-size: cover;
    background-position: center center;
    }
    </style>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="dist/sweetalert.js"></script>
        <div class="wrapper">
            <div class="sidebar" data-image="../assets/img/sidebar-3.jpg">
                <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
                Tip 2: you can also add an image using data-image tag
                -->
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Menu
                        </a>
                    </div>
                    <ul class="nav">
                        <li class="nav-item <?php if($page == "home_admin"){ echo "active"; }?>">
                            <a class="nav-link" href="home_admin.php">
                                <i class=" fa fa-home"></i>
                                <p>หน้าหลัก</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page == "main_admin"){ echo "active"; }?>">
                            <a class="nav-link" href="./main_admin.php">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>จัดการข้อมูลส่วนตัว</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page == "tech_admin"){ echo "active"; }?>">
                            <a class="nav-link" href="./tech_admin.php">
                                <i class="nc-icon nc-badge"></i>
                                <p>จัดการข้อมูลอาจารย์</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page == "subject_admin"){ echo "active"; }?>">
                            <a class="nav-link" href="./subject_admin.php">
                                <i class="nc-icon nc-bullet-list-67"></i>
                                <p>จัดการข้อมูลรายวิชา</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page == "semester_admin"){ echo "active"; }?>">
                            <a class="nav-link" href="./semester_admin.php">
                                <i class="nc-icon nc-layers-3"></i>
                                <p>จัดการข้อมูลปีการศึกษา</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                    <div class=" container-fluid  ">
                        <a class="navbar-brand" href="#">ระบบบริหารจัดการการเรียนการสอน Teaching Management System </a>
                        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-toggle="dropdown">
                                        <!-- <i class="nc-icon nc-palette"></i> -->
                                        <span class="d-lg-none">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="nc-icon nc-single-02"></i>&nbsp;
                                        <span class="no-icon">[ <font color="#327eaf"><?=$typeuser?></font> ]: <?php echo $_SESSION["User"];?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" OnClick="chkConfirm()">
                                        <i class="nc-icon nc-button-power"></i>&nbsp;
                                        <span class="no-icon">ออกจากระบบ</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <?php }else{header("location:login.php");}?>
                <!-- End Navbar -->
                
                <script language="JavaScript">
                function chkConfirm()
                {
                if(confirm('คุณต้องการออกจากระบบหรือไม่')==true)
                {
                alert('ออกจากระบบแล้ว');
                window.location = 'logout.php';
                }
                else
                {
                alert('ยกเลิกการออกจากระบบ');
                }
                }
                </script>