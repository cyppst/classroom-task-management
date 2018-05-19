<!DOCTYPE html>
<html>
<title>Teaching Management System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>




<style type="text/css" media="screen">

  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

    .btn{
      width: 200pt;
      height: 40pt;
            box-shadow:20px 20px 50px 0px #cccccc;
        }
       .btn:hover{
          color: #cc0000;
          cursor: pointer;
        }

      
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content " style="max-width:100%;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
 
    <!-- Right Column -->
    <div class="w3-twothird" style="width: 100%">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <center>   
        <div class="w3-container">
            <img src="../img/Page3.jpg" alt="" width="100%" height="630" >
        </div>
        <br>
        
       
        <div class="w3-container">
          <a href="login.php" class="btn btn-warning" style="font-size: 24px"><i class="fa fa-expeditedssl"></i>เข้าสู่ระบบ</a>
        </div>
        
        </center>
        <br>

      </div>

    <!-- End Right Column -->
    </div>
    
      
<!-- ป๊อปอัพ -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><i class="fa fa-bullhorn" style="font-size:48px;color:red";></i></i>&nbsp;&nbsp;&nbsp;</i><font color="#0000ff" size="2"><h4 class="modal-title">รายละเอียดการใช้งาน</h4></font>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
         <font color="red"><h5><i class="fa fa-graduation-cap" style="font-size:24px;color:#00ff00"></i>นักศึกษา</h5></font>
          <p>- สามารถแก้ไขข้อมูลส่วนตัวได้</p>
          <p>- สามารถเรียกดูการเข้าเรียนของตนเองได้</p>
          <p>- สามารถเรียกดูข้อมูลการส่งของตนเองได้</p>
          <p>- สามารถเรียกดูคะแนนแบบฝึกหัดและคะแนนสอบของตนเองได้</p>
          <p>- สามารถเรียกดูข้อมูลการผลการเรียนของตนเองได้</p>
      
          <font color="red"><h5><i class="fa fa-vcard-o" style="font-size:24px;color:#00ff00"></i>อาจารย์</h5></font>
          <p>- สามารถแก้ไขข้อมูลส่วนตัวได้</p>
          <p>- สามารถเพิ่ม ลบ แก้ไข และค้นหาข้อมูลนักศึกษาได้</p>
          <p>- สามารถเพิ่ม ลบ แก้ไข และค้นหาข้อมูลรายวิชาได้</p>
          <p>- สามารถนำเข้าข้อมูลนักศึกษาได้จากไฟล์ excel ในการลงทะเบียนได้</p>
          <p>- สามารถเพิ่ม ลบ และแก้ไขประเภทและสัดส่วนการให้คะแนน</p>
          <p>- สามารถแก้ไข และบันทึกข้อมูลการเข้าเรียนของนักศึกษาได้</p>
          <p>- สามารถแก้ไข และบันทึกข้อมูลการส่งแบบฝึกหัดของนักศึกษาได้</p>
          <p>- สามารถเรียกดูและจัดพิมพ์รายงานการเข้าเรียนได้</p>
          <p>- สามารถเรียกดูและจัดพิมพ์รายงานการส่งงานได้</p>
          <p>- สามารถเรียกดูและจัดพิมพ์รายงานคะแนนได้</p>
          <p>- สามารถเรียกดูและจัดพิมพ์รายงานผลการเรียนทั้งหมดได้</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">รับทราบ</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>


</body>


</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#myModal').modal('show');
  });
</script>