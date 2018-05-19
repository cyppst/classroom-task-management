<?php

include ("connect.php");
include ("header.php");


if(isset($_POST["submit"])){
    $maxid =mysqli_query($con,"Select Max(substr(sub_id,-4))+1 as MaxID from  subject");
    $dataMax = mysqli_fetch_assoc($maxid);//เลือกเอาค่า id ที่มากที่สุดในฐานข้อมูลและบวก 1 เข้าไปด้วยเลย
            if($dataMax["MaxID"]==''){ // ถ้าได้เป็นค่าว่าง หรือ null ก็แสดงว่ายังไม่มีข้อมูลในฐานข้อมูล
                $sub_id="N0001";
            }else{
                $sub_id="N".sprintf("%04d",$dataMax["MaxID"]);//ถ้าไม่ใช่ค่าว่าง
            }

$id="";
$strSQL = "INSERT INTO subject ";
$strSQL .="(sub_id,subject_no,sub_name,sub_year,sub_sem,tech_id,section) ";
$strSQL .="VALUES ";
$strSQL .="('".$sub_id."','".$_POST["subject_no"]."','".$_POST["sub_name"]."' ";
$strSQL .=",'".$_POST["sub_year"]."','".$_POST["sub_sem"]."','".$_SESSION["UserID"]."','".$_POST["section"]."') ";
//echo $strSQL;
$objQuery = mysqli_query($con,$strSQL);
if($objQuery)
{
 ?>
 <script> 
      swal({
        title:"",
        text: "บันทึกข้อมูลการลงทะเบียนเรียบร้อยแล้ว",
        type: "success",
        confirmButtonClass: "btn-info",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
    }, function(isConfirm){
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
    function ch_idno(){
        var idn = document.getElementById("subject_s").value;
        var text = getSelectedText('subject_s');
         text = text.substring(7,text.length);

   if(idn!=0){
        document.getElementById("idno").value = idn;
        document.getElementById("txtsub").value = text;
       }else{
        document.getElementById("idno").value = "";
        document.getElementById("txtsub").value = "";

       }
    }

   
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;

    return   elt.options[elt.selectedIndex].text;
}

</script>
<script type="text/javascript">
    function ch_idno2(){
        var idn1 = document.getElementById("subject_s1").value;
        var text = getSelectedText('subject_s1');
         text = text.substring(3,text.length);

   if(idn1!=0){
        document.getElementById("idno1").value = idn1;
        document.getElementById("txtyear").value = text;
       }else{
        document.getElementById("idno1").value = "";
        document.getElementById("txtyear").value = "";

       }
    }
   
function getSelectedText(elementId1) {
    var elt1 = document.getElementById(elementId1);

    if (elt1.selectedIndex == -1)
        return null;

    return   elt1.options[elt1.selectedIndex].text;
}

</script>


<br>


<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="subject.php">รายการลงทะเบียน</a>
    </li>  
    <li class="breadcrumb-item active">ข้อมูลการลงทะเบียน</li>
</ol>

<div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-11 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">ข้อมูลการลงทะเบียน</h4>
                                            <hr>
                                        </div>

                               		 	<div class="card-body">      

                                         <form  name="frmMain" method="post">
									<input type="hidden" id="idno" name="subject_no" value="">
                                    <input type="hidden" id="txtsub" name="sub_name" value="">
                                    <input type="hidden" id="idno1" name="sub_sem" value="">
                                    <input type="hidden" id="txtyear" name="sub_year" value="">

                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>รายวิชา</label>
                                                <select name="subject_s" id="subject_s" class="form-control" onchange="ch_idno()">
                                                    <option value="0">เลือกรหัสวิชา</option>
                                                    <?php
                                                        $q="select * from subjected ";
                                                        $qr=mysqli_query($con,$q);
                                                        while($rs=mysqli_fetch_assoc($qr)){
                                                    ?>

                                                    <option value="<?php echo $rs['su_no'];?>"><?=$rs['su_no']." : ".$rs['su_name']?></option>

                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>ปีการศึกษา</label>
                                                   <select name="subject_s1" id="subject_s1" class="form-control" onchange="ch_idno2()">
                                                    <option value="0">เลือกปีการศึกษา</option>

                                                    <?php
                                                        $q1="SELECT * FROM semester ";
                                                        $qr1=mysqli_query($con,$q1);
                                                        while($rs1=mysqli_fetch_assoc($qr1)){
                                                    ?>

                                                      <option value="<?=$rs1['semester_name']?>">
<?=$rs1['semester_name']." / ".$rs1['semester_year']?></option>                             
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
                                                <input type="text" class="form-control" name="section" placeholder="กรอกsection" maxlength="50" required>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    
                                        
                                      </div>

                                    
                                                   
                                        

                                       

										<hr>
							         <center>  
                                      <a href="subject.php"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>
                                              	<input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill ">
                                         
										</center>  
									
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

include ("footer.php");

?>