<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<?php  
include ("connect.php");
include ("header.php");
 $query = "SELECT * FROM student";  

 $result = mysqli_query($con, $query); 
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
          
               <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="main_tech.php">นักศึกษา</a>
    </li>  
    <li class="breadcrumb-item active">แก้ไขข้อมูลส่วนตัวนักศึกษา</li>
</ol>
                <form id="upload_csv" method="post" enctype="multipart/form-data">  
                     <div class="col-md-3">  
                          <br />  
                          <label>Upload File..</label>  
                     </div>  
                   
                     </div>  
                     <div style="clear:both"></div>  
                </form>  
                
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ลำดับ</th>  
                               <th width="25%">รหัส</th>  
                               <th width="35%">กลุ่ม</th>  
                               <th width="10%">ชื่อ</th>  
                               <th width="20%">นามสกุล</th>  
                               <th width="5%">password</th>  
                          </tr>  
                          <?php  
                          $i = 1;
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $i; ?></td>  
                               <td><?php echo $row["std_number"]; ?></td>  
                               <td><?php echo $row["std_group"]; ?></td>  
                               <td><?php echo $row["std_name"]; ?></td>  
                               <td><?php echo $row["std_lname"]; ?></td>  
                               <td><?php echo $row["std_number"]; ?></td>  
                          </tr>  
                          <?php 
                          $i++; 
                          }  
                          ?>  
                     </table>  
                </div>  
           
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $('#upload_csv').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"test_excel2.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else  
                          {  
                               $('#employee_table').html(data);  
                          }  
                     }  
                })  
           });  
      });  
 </script>  