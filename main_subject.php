<?php

include "connect.php";
$page = "regis";
include("header.php");


$tech_id = $_SESSION['UserID'];
$strSQL = "SELECT *
FROM subject
INNER JOIN teacher ON subject.tech_id=teacher.tech_id
INNER JOIN subjected ON subject.subject_no=subjected.su_no
WHERE teacher.tech_id = '" . $_SESSION['UserID'] . "'";

$objQuery = mysqli_query($con, $strSQL) or die ("Error Query [" . $strSQL . "]");

?>


<div class="content">

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">รายการลงทะเบียน</li>

                </ol>
                <hr>

                <div class="card-body">


                    <table class="table table-hover" id="data-table">
                        <thead>
                        <th>ลำดับ</th>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>

                        <th>เปิด</th>
                        </thead>
                        <tbody>

                        <?php
                        $i = 1;
                        while ($objResult = mysqli_fetch_assoc($objQuery))
                        {
                        ?>

                        <tr>
                            <td> <?php

                                echo $i;

                                ?></td>
                            <td><?= $objResult["subject_no"]; ?></td>
                            <td><?= $objResult["su_name"]; ?></td>


                            <td><A HREF="regis_subject.php?su_id=<?= $objResult["subject_no"] ?>" title="เรียกดู"
                                   class="btn btn-info btn-fill pull"><i class="fa fa-folder-open-o"></i></a></td>


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


<script>
    $(function () {
        $("#data-table").dataTable();
    });
</script>