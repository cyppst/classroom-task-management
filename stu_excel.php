<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<?php


include("connect.php");
include("header.php");
$query = "SELECT * FROM student";

$result = mysqli_query($con, $query);
?>

<!-- Modal -->


<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="main_stu.php">นักศึกษา</a>
    </li>
    <li class="breadcrumb-item active">ข้อมูลส่วนตัวนักศึกษา</li>
</ol>


<div class="content">
    <div class="container-fluid">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="card">
                            <div class="header text-center">
                                <div class="card-body">
                                    <ol class="breadcrumb">
                                        <li class="title">กรุณาเลือกไฟล์Excell</li>
                                    </ol>
                                </div>


                                <div class="card-body">
                                    <center>
                                        <form id="upload_csv" action="test_excel2.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="col-md-3">

                                                <label>Upload File..</label>
                                                <table>
                                                    <tr>
                                                        <td><input type="file" name="file"/></td>

                                                        <td><input type="submit" name="upload" id="upload"
                                                                   value="Upload" class="btn btn-success btn-fill"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </form>

                                    </center>
                                    <div align="left"><a href="main_stu.php">
                                            <button type="button" class="btn btn-primary btn-fill pull"> ย้อนกลับ
                                            </button>
                                        </a></div>
                                </div>
                            </div>
                            </body>
                            </html>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php

include("footer.php");

?>
