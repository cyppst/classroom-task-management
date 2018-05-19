<?php
session_start();



// if(!isset( $_SESSION["user_id"])) {
//     header("location:login.php");
// }
include ("connect.php");
$sql = "SELECT * FROM hospital join category on hospital.id_category=category.id_category";
$query = mysql_query($sql);
?> 

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>หน้าแรก</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.min.css" />
    <script src="media/js/jquery.dataTables.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style>
  body{
    font-family: 'Prompt', sans-serif;
  }
</style>
</head>
    <body>
    	<!--Menu-->
    	<div class="navbar navbar-default navbar-fixed-top">
    		<div class="container">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>

    				<!--รูปภาพโลโก้-->
    			</div>
    			<div class="collapse navbar-collapse" id="navbar-ex-collapse">
    				<ul class="nav navbar-Left navbar-nav">
    					      <li>
                        <a href="manage.php"><i class="fa fa-bank fa-fw"></i>หน้าแรก</a>
                    </li>
                    <li>
                        <a href="manage_hospital.php"><i class="fa fa-fw k fa-plus-square"></i>สถานพยาบาล</a>
                    </li>
                    <li>
                        <a href="manage_group.php"><i class="fa fa-asterisk"></i>หมวดสถานพยาบาล</a>
                    </li>
                    <li>
                        <a href="manage_category.php"><i class="fa fa-fw k fa-tint"></i>ประเภทสถานพยาบาล</a>
                    </li>
                    <li>
                        <a href="manage_hospital_clinics.php"><i class="fa fa-medkit fa-fw"></i>ประเภทสถานพยาบาลเฉพาะทาง</a>
                    </li>
                    <li>
                        <a href="manage_proportion.php"><i class="fa fa-female"></i>สัดส่วนร่างกาย</a>
                    </li>
                    <li>
                     <a href="manage_symptom.php"><i class="fa fa-fw k fa-stethoscope"></i>อาการ</a>
                 </li>
                 <li>
                    <a href="logout.php"><i class="fa fa-fw fa-share-square"></i> Log Out</a>
                </li>
            </ul>
    				</div>
    			</div>
    		</div>
    		<!--ปิดMenu-->
    		<!--content-->
    		<div class="container select_type" id="page-select">

    			<div class="panel">
    				<div class="panel-heading">
    					<h1 class="text-center">
    						<img height="70" alt="Brand" src="img/hos.png">
    						จัดการข้อมูลสถานพยาบาล
    						<center><a href ="add_hospital.php">
    							<button type="submit" class="btn btn-success">เพิ่มข้อมูลสถานพยาบาล</button>
    						</a></center></h1>
    						<div class="panel-body">
    						</div>
    						<div class="table-responsive" align="center">
    							<table class="table table-bordered" name="data-table" id="data-table">
    								<thead>
    									<tr>
    										<th>รหัสสถานพยาบาล</th>
    										<th>ชื่อสถานพยาบาล</th>
    										<th>ประเภทสถานพยาบาล</th>
    										<th>จำนวนเตียง</th>
    										<th>ที่อยู่</th>
    										<th>หมู่</th>
    										<th>ตำบล</th>
    										<th>อำเภอ</th>
    										<th>จังหวัด</th>
    										<th>รหัสไปรษณีย์</th>
    										<th>เวลาเปิด</th>
    										<th>เวลาปิด</th>
    										<th>โทร</th>
    										<th>ละติจูด</th>
    										<th>ลองติจูด</th>
    										<th>วันที่ลงทะเบียน</th>
    										<th>แก้ไข</th>
    										<th>ลบ</th>
    									</tr>
    								</thead>
    								<tbody>
    									<?php 
                                        while ($result = mysql_fetch_array($query)) { 
                                            ?>
    									<tr>
    										<td><?php echo $result['id_hospital']; ?></td>
    										<td><?php echo $result['name']; ?></td>
    										<td><?php echo $result['name_cate']; ?></td>
    										<td><?php echo $result['number_beds']; ?></td>
    										<td><?php echo $result['address']; ?></td>
    										<td><?php echo $result['mu']; ?></td>
    										<td><?php echo $result['subdistrict']; ?></td>
    										<td><?php echo $result['district']; ?></td>
    										<td><?php echo $result['province']; ?></td>
    										<td><?php echo $result['post_office']; ?></td>
    										<td><?php echo $result['open_time']; ?></td>
    										<td><?php echo $result['closing_time']; ?></td>
    										<td><?php echo $result['call']; ?></td>
    										<td><?php echo $result['latitude']; ?></td>
    										<td><?php echo $result['longitude']; ?></td>
    										<td><?php echo $result['date_hospital']; ?></td>

    										<td><a href="edit_hospital.php?id_hospital=<?=$result['id_hospital']?>" onclick="return confirm('ต้องการแก้ไขข้อมูล <?=$result['name']; ?> หรือไม่?');">
    											<i class="fa fa-1x fa-fw fa-edit"></i>แก้ไข
    										</a>
    									</td>
    									<td><a href="del_hospital.php?submit=DEL&id_hospital=<?=$result['id_hospital']?>"onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')">
    										<i class=" glyphicon glyphicon-trash"></i>ลบ
    									</a></td>
    								</tr>
    								<?php } ?>
    							</tbody>
    						</table>
    					</div>

    				</div>
    			</div>
    		</div>
    	</div>

    </body>
    <script>
    	$(function(){
    		$("#data-table").dataTable();
    	});
    </script>
    </html>








