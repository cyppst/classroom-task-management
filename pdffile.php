<?php


include ("connect.php");
$page = "pdffile";
include ("header.php");


   

?>
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
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active">กรุณาเลือกรายวิชาออกรายงาน</li>
  
</ol>
 <hr>
    <?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {

  $strKeyword = $_POST["txtKeyword"];
  }
   $tech_id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM subject inner join subjected ON subject.subject_no=subjected.su_no  WHERE tech_id = '".$_SESSION['UserID']."' and subject.sub_year LIKE '%".$strKeyword."%' ";
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
                           
                       <div class="card-body">
         


                           <table class="table table-hover" id="" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>ลำดับ</th>
                                  <th>รหัสวิชา</th>
                                  
                                  <th>ชื่อวิชา</th>
                                  <th>SECTION</th>
                                  <th>ภาคเรียน/ปีการศึกษา</th>
                                  <th>เรียกดู</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php
  $i=1;
   while($objResult = mysqli_fetch_array($objQuery))
{
   ?>
              
                                <tr> 
                                  <td> <?php 

                                       echo $i;

                                           ?></td>

                                 
                                <td><?=$objResult["subject_no"];?></td>
                                <td><?=$objResult["su_name"];?></td>
                                <td>
                                  
                                <font color="red" ><?=$objResult["section"];?></font>
                                   <td><?=$objResult["sub_sem"];?>/<?=$objResult["sub_year"];?></td>
                                </td>
                                <td> <a href="pdf_stu.php?sub_id=<?=$objResult["sub_id"]?>" title="เรียกดู" class="btn btn-success btn-fill"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                
                                </tbody>
                                  <?php
                 $i++; }
                ?>
                                </table>

                        </div>
                    </div>
                </div>
            </div>


<?php

include ("footer.php");

?>
