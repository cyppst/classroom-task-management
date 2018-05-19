<?php

session_start();
include ("connect.php");

  if(isset($_POST['LOGIN']))
  {

  echo $user=$_POST["user"];
  $pass=$_POST["pass"];
               
$sql = "SELECT * FROM teacher where tech_user='$user' and tech_pass='$pass'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  if(!$row)
  {  
            

$sql = "SELECT * FROM admin where admin_id='$user' and admin_pass='$pass'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  if(!$row)
  {  
           $sql = "SELECT * FROM student where std_number='$user' and std_pass='$pass'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
                    
                    

if(!$row){

    echo "<script type='text/javascript'>alert('ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง')</script>";
}
                  else
                  {
          

$_SESSION["UserID"] = $row["std_id"];
            $_SESSION["User"] = $row["std_name"]." ".$row["std_lname"];
           $_SESSION["typeuser"]=3;
                     Header("Location:home_student.php");

                  }
                }
                  else
                  {
            $_SESSION["UserID"] = $row["ad_id"];
            $_SESSION["User"] = $row["name"];
           $_SESSION["typeuser"]=2;
          
                     Header("Location:home_admin.php");
}
                  }
                  else
                  {
                      $_SESSION["UserID"] = $row["tech_id"];
            $_SESSION["User"] = $row["tech_name"]." ".$row["tech_lname"];
          $_SESSION["typeuser"]=1;
                     Header("Location:home.php");

                  }
  }
       

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Pure CSS3 Login Form</title>
  
  
  
      <link rel="stylesheet" href="/css/login.css">

  
</head>

<body>

  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active">   Teaching Management System </h2>


    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form  data-toggle="validator"  method="post">
        <div class="form-group">
      <input type="text" id="name" class="fadeIn second txtstr" name="user" placeholder="username" required>
    </div>
    <div class="form-group">
      <input type="password" id="pass" class="fadeIn third txtstr" name="pass" placeholder="password" required>
    </div>
      <input type="submit" class="fadeIn fourth" name="LOGIN" value="LOGIN">

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
          <div>
       <?php
              if(isset($_GET["err"]) && $_GET["err"]==1){
        ?> 
        <font color="red">Username หรือ Password ผิดพลาด !</font>
       <?php } ?>
        </div>
    </div>

  </div>
</div>
  
  

</body>

</html>
