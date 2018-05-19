<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
include("connect.php");
include("header.php");
$strSQL2 = "SELECT * FROM subject WHERE sub_id = '" . $_GET["sub_id"] . "' ";
$objQuery2 = mysqli_query($con, $strSQL2) or die ("Error Query [" . $strSQL2 . "]");
$objResult2 = mysqli_fetch_assoc($objQuery2);

$sub = $objResult2["sub_id"];
$id = "";
for ($i = 1; $i <= $_POST["hdnLine"]; $i++) {
    if ($_POST["txtName$i"] != "") {
        $strSQL = "INSERT INTO work ";
        $strSQL .= "(regis_section,work_name,work_score) ";
        $strSQL .= "VALUES ";
        $strSQL .= "('" . $_GET["sub_id"] . "','" . $_POST["txtName$i"] . "', ";
        $strSQL .= "'" . $_POST["txtName2$i"] . "') ";
        $objQuery = mysqli_query($con, $strSQL);
    }
}


if ($objQuery) {
    ?>

    <script>
        swal({
            title: "",
            text: "บันทึกข้อมูลสำเร็จ",
            type: "success",
            confirmButtonClass: "btn-info",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                window.location.href = "work_show.php?sub_id=<?php echo $sub; ?>";
            }
        });
    </script>
    <?php
} else {
    echo "Error Save [" . $strSQL . "]";
}


?>
</body>
</html>