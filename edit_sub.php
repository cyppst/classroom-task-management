<?php

include("connect.php");
include("header.php");


if (isset($_POST["submit"])) {
    $strSQL = "UPDATE subject SET ";
    $strSQL .= "subject_no = '" . $_POST["subject_no"] . "' ";
    $strSQL .= ",sub_name = '" . $_POST["sub_name"] . "' ";
    $strSQL .= ",sub_year = '" . $_POST["sub_year"] . "' ";
    $strSQL .= ",sub_sem = '" . $_POST["sub_sem"] . "' ";
    $strSQL .= ",section = '" . $_POST["section"] . "' ";
    $strSQL .= "WHERE sub_id = '" . $_GET["sub_id"] . "' ";
    $objQuery = mysqli_query($con, $strSQL);
    if ($objQuery) {
        ?>
        <script>
            swal({
                title: "",
                text: "แก้ไขข้อมูลการลงทะเบียนเรียบร้อยแล้ว",
                type: "success",
                confirmButtonClass: "btn-info",
                confirmButtonText: "ตกลง",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (isConfirm) {
                    window.location.href = "subject.php";
                }
            });
        </script>
        <?php
    }
}


?>
    <script type="text/javascript">
        function ch_idno() {
            var idn = document.getElementById("subject_s").value;
            var text = getSelectedText('subject_s');
            text = text.substring(7, text.length);

            if (idn != 0) {
                document.getElementById("idno").value = idn;
                document.getElementById("txtsub").value = text;
            } else {
                document.getElementById("idno").value = "";
                document.getElementById("txtsub").value = "";

            }
        }


        function getSelectedText(elementId) {
            var elt = document.getElementById(elementId);

            if (elt.selectedIndex == -1)
                return null;

            return elt.options[elt.selectedIndex].text;
        }

    </script>
    <script type="text/javascript">
        function ch_idno2() {
            var idn1 = document.getElementById("subject_s1").value;
            var text = getSelectedText('subject_s1');
            text = text.substring(3, text.length);

            if (idn1 != 0) {
                document.getElementById("idno1").value = idn1;
                document.getElementById("txtyear").value = text;
            } else {
                document.getElementById("idno1").value = "";
                document.getElementById("txtyear").value = "";

            }
        }

        function getSelectedText(elementId1) {
            var elt1 = document.getElementById(elementId1);

            if (elt1.selectedIndex == -1)
                return null;

            return elt1.options[elt1.selectedIndex].text;
        }

    </script>


    <br>


    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="subject.php">รายการลงทะเบียน</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขข้อมมูลการลงทะเบียน</li>
    </ol>

    <div class="content">
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11 ml-auto mr-auto">
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title">แก้ไขข้อมมูลการลงทะเบียน</h4>
                                    <hr>
                                </div>

                                <div class="card-body">


                                    <form action="?sub_id=<?php echo $_GET["sub_id"]; ?>" name="frmMain" method="post">

                                        <?php
                                        $strSQL1 = "SELECT * FROM subject WHERE sub_id = '" . $_GET["sub_id"] . "' ";
                                        $objQuery1 = mysqli_query($con, $strSQL1);
                                        $objResult1 = mysqli_fetch_assoc($objQuery1);
                                        ?>
                                        <input type="hidden" id="idno" name="subject_no" value="<?=$objResult1['subject_no']?>">
                                        <input type="hidden" id="txtsub" name="sub_name" value="<?=$objResult1['sub_name']?>">
                                        <input type="hidden" id="idno1" name="sub_sem" value="<?=$objResult1['sub_sem']?>">
                                        <input type="hidden" id="txtyear" name="sub_year" value="<?=$objResult1['sub_year']?>">
                                        <?php
                                        unset($objResult1);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>รายวิชา</label>
                                                    <select name="subject_s" id="subject_s" class="form-control"
                                                            onchange="ch_idno()">
                                                        <option value="0">เลือกรหัสวิชา</option>
                                                        <?php
                                                        $a = "SELECT * FROM subject inner join subjected on (subject.subject_no=subjected.su_no) WHERE sub_id = '" . $_GET["sub_id"] . "' ";
                                                        $ar = mysqli_query($con, $a);
                                                        $ss = mysqli_fetch_assoc($ar);
                                                        $a1 = "SELECT * FROM subject inner join semester on (subject.sub_sem=semester.semester_name) WHERE sub_id = '" . $_GET["sub_id"] . "' ";
                                                        $ar1 = mysqli_query($con, $a1);
                                                        $ss1 = mysqli_fetch_assoc($ar1);

                                                        $q = "SELECT * FROM subjected ";
                                                        $qr = mysqli_query($con, $q);
                                                        while ($rs = mysqli_fetch_assoc($qr)) {
                                                            ?>

                                                            <option value="<?php echo $rs['su_no']; ?>"
                                                                <?php if ($rs['su_no'] == $ss['su_no']) { ?>
                                                                    selected="selected"
                                                                <?php } ?>>
                                                                <?= $rs['su_no'] . " : " . $rs['su_name'] ?></option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>ปีการศึกษา</label>
                                                    <select name="subject_s1" id="subject_s1" class="form-control"
                                                            onchange="ch_idno2()">
                                                        <option value="0">เลือกปีการศึกษา</option>

                                                        <?php
                                                        $q1 = "SELECT * FROM semester ";
                                                        $qr1 = mysqli_query($con, $q1);
                                                        while ($rs1 = mysqli_fetch_assoc($qr1)) {
                                                            ?>
                                                            <option value="<?php echo $rs1['semester_name']; ?>"
                                                                <?php if ($rs1['semester_name'] == $ss1['semester_name']) { ?>
                                                                    selected="selected"
                                                                <?php } ?>>
                                                                <?= $rs1['semester_name'] . " / " . $rs1['semester_year'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">

                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>กรอกSaction</label>
                                                            <input type="text" class="form-control" name="section"
                                                                   value="<?php echo $objResult1['section']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <hr>
                                        <center><a href="subject.php">
                                                <button type="button" class="btn btn-success btn-fill"> ย้อนกลับ
                                                </button>
                                            </a>
                                            <input type="submit" name="submit" value="บันทึก"
                                                   class="btn btn-info btn-fill pull"></center>
                                </div>
                            </div>


                            </form>

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