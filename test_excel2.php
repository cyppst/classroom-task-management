<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<?php

include 'connect.php';
include ("header.php");
$allowed_extensions = array('csv');

$upload_path = getcwd() . '/files';
if (!empty($_FILES['file'])) {

    if ($_FILES['file']['error'] == 0) {

// check extension
        $file = explode(".", $_FILES['file']['name']);
        $extension = array_pop($file);

        if (in_array($extension, $allowed_extensions)) {

            if (move_uploaded_file(utf8_encode($_FILES['file']['tmp_name']), $upload_path . '/' . $_FILES['file']['name'])) {
                // echo $upload_path . '/' . $_FILES['file']['name'], "r";
                $fh = fopen($upload_path . '/' . $_FILES['file']['name'], "r");

                while ($line = fgetcsv($fh, 1000, ",")) {
                    $std_number = iconv("tis-620", "utf-8", $line[0]);
                    $std_group = iconv("tis-620", "utf-8", $line[1]);
                    $std_name = iconv("tis-620", "utf-8", $line[2]);
                    $std_lname = iconv("tis-620", "utf-8", $line[3]);
                    $std_pass = iconv("tis-620", "utf-8", $line[0]);

                    $sql = "INSERT INTO student (std_number, std_group, std_name,std_lname,std_pass) VALUES ('" . $std_number . "','" . $std_group . "','" . $std_name . "','" . $std_lname . "','" . $std_pass . "')";
                    $con->query($sql);


                }
                $con->close();
                fclose($fh);
                ?>
  
  <script> 
      swal({
        title:"",
        text: "นำเข้าข้อมูลเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
          if (isConfirm) {     
            window.location.href = "main_stu.php";
      } 
});
        </script> 
<?php 
            }
        }
    }
}

?>