<?php
var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="th">
<?php
include("connect.php");
include("header.php");
//include "connect.php";
?>

<head>
    <meta charset="utf-8">

    <title>ระบบบริหารจัดการเรียนการสอน สาขาวิทยาการคอมพิวเตอร์</title>


</head>


<div class="content-wrapper">
    <div class="container-fluid">
        <?php
        $strSQL2 = "SELECT * FROM subject WHERE sub_id = '" . $_GET["sub_id"] . "' ";//23-26
        $objQuery2 = mysqli_query($con, $strSQL2) or die ("Error Query [" . $strSQL2 . "]");
        $objResult2 = mysqli_fetch_assoc($objQuery2);
        $sub = $objResult2["sub_id"];
        $id = "";
        for ($i = 1; $i <= $_POST["hdnLine"]; $i++) {
            if ($_POST["txtName$i"] != "") {
                $strSQL = "INSERT INTO checkname ";
                $strSQL .= "(cn_date,regis_section) ";
                $strSQL .= "VALUES ";
                $strSQL .= "('" . $_POST["txtName$i"] . "', ";
                $strSQL .= "'" . $_GET["sub_id"] . "') ";
                $objQuery = mysqli_query($con, $strSQL);


            }
        }


        if ($objQuery) {


            ?>
            <script>
                swal({
                    title: "",
                    text: "บันทึกข้อมูลคาบเรียนเรียบร้อยแล้ว",
                    type: "success",
                    confirmButtonClass: "btn-info",
                    confirmButtonText: "ตกลง",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = "cn_frm_show.php?sub_id=<?=$sub;?>";
                    }
                });
            </script>

            <?php


        } else {
            echo "Error Save [" . $strSQL . "]";
        }

        ?>
    </div>
</div>
<div class="card-footer small text-muted"></div>
</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
   
