     <!-- POST -->
      <?php
      include ("connect.php");
      if(isset($_POST['std_id'])){
      $std_id = $_POST['std_id'];
      $work_id = $_POST['work_id'];
      $regis_section = $_POST['regis_section'];
      $strSQL = "INSERT INTO work_score ";
      $strSQL .="(work_id,std_id,regis_section,score) ";
      $strSQL .="VALUES ";
      $strSQL .="('".$work_id."','".$std_id."', ";
      $strSQL .="'".$regis_section."','0') ";
      $objQuery = mysqli_query($con,$strSQL);
      header("Location: {$_SERVER['HTTP_REFERER']}");
      exit;
      }
      ?>
      
      <!-- POST -->