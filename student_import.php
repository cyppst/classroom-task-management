<?php
require_once '../../../init.php';
$template->session('administrator');
$template->open();

	function Data_dump($mysqli, $file)
	{

        $tmpfname = "DataExcel/" . $file;
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();

        $list_prename_check = ['นาย', 'นาง', 'นางสาว'];
        $list_prename = [
        	"นาย" => '1',
        	"นาง" => '2',
        	"นางสาว" => '3'
        ];

        for($row = 2; $row <= $lastRow; $row++)
        {
            $username = $worksheet->getCell('A'.$row)->getValue();
            $prename = $worksheet->getCell('B'.$row)->getValue();
            $name = $worksheet->getCell('C'.$row)->getValue();
            $lastname = $worksheet->getCell('D'.$row)->getValue();
            $group = $worksheet->getCell('E'.$row)->getValue();

            if(in_array($prename, $list_prename_check))
            {
            	$prename = $list_prename[$prename];
            }

            if(!empty($username) && !empty($prename) && !empty($name) && !empty($lastname) && !empty($group))
            {
            	$sql = "insert into student (std_username, std_password, std_pre, std_name, std_lname, std_group) values ('$username', '$username', '$prename', '$name', '$lastname', '$group')";
            	$mysqli->query($sql);
            }
        }
	}
?>

<div class="col-md-9 body-content-right">
    <ol class="breadcrumb">
        <li><a href="<?= $template->link('home'); ?>"><span class="glyphicon glyphicon-home"></span> เมนูหลัก</a></li>
        <li><a href="../../configure_account.php?tab3">จัดการผู้ใช้งานระบบ</a></li>
        <li class="active">เพิ่มข้อมูลนักศึกษา (Import Excel)</li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-body">
        	<div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                	<?php
			            if(isset($_FILES['file_dump'])){
			                $errors = null;
			                $file_name = 'Data_dump';
			                $file_size = $_FILES['file_dump']['size'];
			                $file_tmp = $_FILES['file_dump']['tmp_name'];
			                $file_type = $_FILES['file_dump']['type'];
			                $file_ext = explode('.', $_FILES['file_dump']['name']);
			                $file_ext = strtolower(end($file_ext));

			                $expensions= array("xls","xlsx");

			                if(in_array($file_ext, $expensions) === false)
			                {
			                    $errors = "กรุณาใช้ไฟล์ที่มีนามสกุล xls หรือ xlsx เท่านั้น";
			                }

			                if($file_size > 100000)
			                {
			                    $errors = 'ไฟล์มีขนาดเกินกว่า 100 KB';
			                }

			                if(empty($errors) == true)
			                {
			                    $file = $file_name . '.' . $file_ext;

			                    move_uploaded_file($file_tmp, "DataExcel/" . $file);

			                    Data_dump($mysqli, $file);

			                    $libs->show_message_link('เสร็จสมบูรณ์', 'เพิ่มข้อมูลเรียบร้อยแล้ว!', $template->link('home/administrator/configure_account.php?tab3'));
			                }
			                else
			                {
			                    $libs->show_message($errors);
			                }
			            }
			        ?>
                	<br>
                	<form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend><strong><span class="glyphicon glyphicon-import"></span> Import Excel file</strong></legend>
                            <div class="form-group" id="file_validation">
	                            <label for="file_dump" class="col-md-3 control-label">Excel File:</label>
	                            <div class="col-md-9">
	                                <input type="file" name="file_dump" id="file_dump" class="input-large form-control">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 control-label"></label>
	                            <div class="col-md-9">
	                                <button type="submit" class="btn btn-success btn-flat pull-right button-loading" data-loading-text="Loading...">Upload</button>
	                            </div>
	                        </div>
                        </fieldset>
                    </form>
                    <br>
                    <p class="alert alert-danger" role="alert">ตัวอย่างการนำเข้าข้อมูลนักศึกษาในรูปแบบไฟล์ Excel (xls, xlsx)</p>
		            <p class="text-center">
		                <img src="<?= $template->link('images/icon/exsample/excel.png') ?>">
		            </p>
		            <br>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>

<?php
$template->close();
?>