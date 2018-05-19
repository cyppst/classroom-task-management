<?php

//error_reporting(0);
include("connect.php");
include("header.php");

//include();


$strSQL = "SELECT * FROM registration INNER JOIN student ON registration.std_id = student.std_id WHERE regis_section = '" . $_GET["sub_id"] . "'";
$objQuery = mysqli_query($con, $strSQL) or die ("Error Query [" . $strSQL . "]");

$strSQL2 = "SELECT * FROM subject WHERE sub_id = '" . $_GET["sub_id"] . "' ";
$objQuery2 = mysqli_query($con, $strSQL2) or die ("Error Query [" . $strSQL2 . "]");
$objResult2 = mysqli_fetch_assoc($objQuery2);


?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><h4>ตรวจสอบรายชื่อนักศึกษา</h4></li>
                    </ol>

                </div>


                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"]; ?></p>
                                <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"]; ?></p>
                                <p class="card-title">Section : <?php echo $objResult2["section"]; ?></p>
                            </div>

                            <div class="card-body">

                                <div class="container">
                                    <div class="btn-group">

                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">นักศึกษา<span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">

                                            <li><a href="regis_stu.php?sub_id=<?= $objResult2["sub_id"] ?>">ตรวจสอบนักศึกษา</a>
                                            </li>
                                        </ul>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                การเข้าเรียน <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="cn_frm.php?sub_id=<?= $objResult2["sub_id"] ?>">เกณฑ์การให้คะแนน</a>
                                                </li>
                                                <li><a href="cn_frm_show.php?sub_id=<?= $objResult2["sub_id"] ?>">จัดการคะแนน</a>
                                                </li>
                                                <li><a href="cn_frm_score.php?sub_id=<?= $objResult2["sub_id"] ?>">สรุปการเข้าเรียน</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                การส่งงาน <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="send_work.php?sub_id=<?= $objResult2["sub_id"] ?>">เกณฑ์การให้คะแนน</a>
                                                </li>
                                                <li>
                                                    <a href="work_line.php?sub_id=<?= $objResult2["sub_id"] ?>">เช็คงาน</a>
                                                </li>
                                                <li><a href="work_show.php?sub_id=<?= $objResult2["sub_id"] ?>">จัดการคะแนน</a>
                                                </li>
                                                <li><a href="work_score.php?sub_id=<?= $objResult2["sub_id"] ?>">รวมคะแนน</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                การสอบ <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="exam.php?sub_id=<?= $objResult2["sub_id"] ?>">เกณฑ์การให้คะแนน</a>
                                                </li>
                                                <li><a href="exam_show.php?sub_id=<?= $objResult2["sub_id"] ?>">จัดการคะแนน</a>
                                                </li>
                                                <li><a href="exam_score.php?sub_id=<?= $objResult2["sub_id"] ?>">รวมคะแนน</a>
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                ผลการเรียน <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="score_total.php?sub_id=<?= $objResult2["sub_id"] ?>">จัดการคะแนน</a>
                                                </li>
                                                <li><a href="score_show.php?sub_id=<?= $objResult2["sub_id"] ?>">คะแนนทั้งหมด</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script language="JavaScript" type="text/JavaScript">
                                <!--
                                function MM_jumpMenu(targ, selObj, restore) { //v3.0
                                    eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
                                    if (restore) selObj.selectedIndex = 0;
                                }

                                //-->
                            </script>
                            <div class="card-body">
                                <a href="pdf_std.php?sub_id=<?= $objResult2["sub_id"] ?>" class="btn btn-success"><p
                                            class="glyphicon glyphicon-print">พิมพ์รายชื่อ</p></a>

                                <br> </br>
                                </th>
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div align="center">ลำดับ
                                        </th>
                                        <th>
                                            <div align="center">รหัสนักศึกษา
                                        </th>
                                        <th>
                                            <div align="center">ชื่อ นามสกุล
                                        </th>
                                        <th>
                                            <div align="center">กลุ่มเรียน
                                        </th>
                                        <th>
                                            <div align="center">Line
                                        </th>
                                        <th>
                                            <div align="center">จัดการ
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    while ($objResult = mysqli_fetch_array($objQuery)) {
                                        ?>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <center><?php echo $i; ?></center>
                                            </td>

                                            <td><?php echo($objResult["std_number"]); ?></td>
                                            <td><?php echo($objResult["std_name"]); ?>
                                                &nbsp;<?php echo($objResult["std_lname"]); ?></td>
                                            <td><?php echo($objResult["std_group"]); ?></td>

                                            <td>


                                                <?php echo($objResult["std_line"]); ?>

                                            </td>

                                            <td>
                                                <center>


                                                    <A HREF="stu_view_del.php?regis_id=<?= $objResult["regis_id"] ?>"
                                                       title="ลบ" class="btn btn-danger"
                                                       onclick="return confirm('ผลการเรียนนักศึกษาสูญหายคุณต้องการลบหรือไม่ Y/N');"><i
                                                                class="fa fa-close"></i></a>


                                                </center>

                                            </td>

                                            <td></td>
                                        </tr>

                                        </tbody>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include("footer.php");
            ?>
<?php
function thaidate($tDate) //แปลงวันที่เป็นวันที่ไทย
{
    $y = substr($tDate, 0, 4) + 543;
    $m = substr($tDate, 5, 2);
    $d = substr($tDate, 8, 9);
    if ($tDate == "") {
        return "";
    } else {
        return $d . "/" . $m . "/" . $y;
    }
}

?>