<?php

include ("connect.php");
$page = "main_student";
include ("header_student.php");

	$std_id = $_SESSION['UserID'];
	//$strSQL = "SELECT * FROM subject 
					//inner join student ON subject.std_id=student.std_id  
					//inner join subjected ON subject.subject_no=subjected.su_no WHERE student.std_id = '".$_SESSION['UserID']."' GROUP BY subjected.su_id ";

  $strSQL = " SELECT * FROM subject a LEFT JOIN subjected b ON (a.subject_no = b.su_no) WHERE sub_id IN (SELECT DISTINCT(regis_section) FROM registration WHERE std_id = '".$_SESSION['UserID']."' ) ";
	$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {
    $strKeyword = $_POST["txtKeyword"];
  }
?>



        <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="card-body"> 
            <ol class="breadcrumb">
    <li class="breadcrumb-item active">ข้อมูลรายวิชา</li>
  
</ol>

 <?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {

  $strKeyword = $_POST["txtKeyword"];
  }
   $tech_id = $_SESSION['UserID'];
    $strSQL = " SELECT * FROM subject a LEFT JOIN subjected b ON (a.subject_no = b.su_no) WHERE sub_id IN (SELECT DISTINCT(regis_section) FROM registration WHERE std_id = '".$_SESSION['UserID']."' and a.sub_year LIKE '%".$strKeyword."%' ) ";
    $objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
?>
                   
                          <div align="center">         
                          <div class="col-md-6 pr-1">
                              <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                    <input type="hidden" id="idno1" name="sub_sem" value="">
                                    <input type="hidden" id="txtyear" name="sub_year" value=""> 
                                   
                                     <form name="frmSearch" method="post" action ="" >
                                            
            <select name="txtKeyword" id="txtKeyword" class="form-control" onchange="ch_idno()">
                                         <option >เลือกปีการศึกษา</option>
                                           <?php
                                          $q1="SELECT * FROM semester ";
                                          $qr1=mysqli_query($con,$q1);
                                         while($rs1=mysqli_fetch_assoc($qr1)){
                                      ?>
                              <option value="<?php echo $rs1['semester_year'];?>">
                                 <?=$rs1['semester_name']." / ".$rs1['semester_year']?></option>                           
                                                    <?php 
                                                        }
                                                    ?>
                                            </select>
                                 <br>
      <input type="submit" value="ค้นหา" class="btn btn-info btn-fill" >
    </div>
      
</form>
  
                                          </div>
                                    </div>
                                </div>        
                            </div>
  
                           
                                <table class="table table-hover" id="data-table">
                                        <thead>
                                        <th>ลำดับ</th>
                                            <th>รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                <th>section</th>
                                 <th>เทอม/ปีการศึกษา</th>
                                <th>เรียกดู</th>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $i=1;
                      while($objResult = mysqli_fetch_assoc($objQuery))
                      {
                    ?>

                  <tr>
                  <td><?=$i;?></td>
                            <td><?=$objResult["subject_no"];?></td>
                            <td><?=$objResult["su_name"];?></td>
                            <td><?=$objResult["section"];?></td>
                <td><?=$objResult["sub_sem"];?>&nbsp;/&nbsp;<?=$objResult["sub_year"];?></td>
            
                    <td> 
                    <A HREF="stu_view_std.php?sub_id=<?=$objResult["sub_id"]?>" title="จัดการคะแนน" class="btn btn-warning btn-fill " ><i class=" fa fa-eye"></i></a>&nbsp;&nbsp;
                
                   

                         
                </tr>  
                        </tbody>
                <?php
                 $i++; }
                ?>
                
                                </table>
                        </div>
                    </div>
                </div>
          

<?php

include ("footer.php");

?>


 	<script>
    	$(function(){
    		$("#data-table").dataTable();
    	});
    </script>