

<?php


include ("connect.php");
include ("header.php");
$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
 $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);

  $strSQL3 = "SELECT * FROM checkscore WHERE regis_section = '".$_GET["sub_id"]."' ";
 $objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL2."]");
  $objResult3 = mysqli_fetch_assoc($objQuery3);
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><u>ผลการทำงาน</u></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <font color="green">บันทึกข้อมูลการแก้ไขได้สำเร็จ</font>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>







<br>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="cn_frm.php?sub_id=<?=$objResult2["sub_id"]?>">ข้อมูลคาบเรียน</a>
    </li>  
    <li class="breadcrumb-item active">คะแนนเข้าชั้นเรียน</li>
</ol>

            <div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <h4 class="title">คะแนนเข้าชั้นเรียน</h4>
                                            <hr>
                                        </div>

                                        <div class="card-body">      

                                         <form action="cn_data_score_update.php?sub_id=<?=$objResult2["sub_id"]?>" name="form1" method="post" onSubmit="JavaScript:return fncSubmit();">
                                        
                                        

                                        <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>คะแนนเข้าชั้นเรียน</label>
                                                <input type="hidden" name="cs_id" value="<?php 
                                                echo $objResult3['cs_id'];
                                                ?>"  class="form-control" placeholder="กรอกคะแนน" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>


                                                <input type="text" name="text_score" value="<?php 
                                                echo $objResult3['score'];
                                                ?>"  class="form-control" placeholder="กรอกคะแนน" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>
                                            </div>
                                        </div>
                                       
</div>
                                        <hr>
                                  
                                       
                                            <center>
                                            <a href="cn_frm.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill"> ย้อนกลับ</button></a>

                                            <input type="submit" name="submit" value="บันทึก" class="btn btn-info btn-fill pull"></center>   
                                    
                                     

                                  

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

<script language="javascript">
function fncSubmit()
{
    if(document.form1.text_plain.value == "")
    {
        alert('กรุณากรอกรหัสนักศึกษา');
        document.form1.text_plain.focus();
        return false;
    } 
    if(document.form1.tech_pass.value == "")
    {
        alert('กรุณากรอกรหัสกลุ่มเรียน');
        document.form1.tech_pass.focus();       
        return false;
    } 
    if(document.form1.name.value == "")
    {
        alert('กรุณากรอกชื่อ');
        document.form1.name.focus();
        return false;
    } 
    if(document.form1.lname.value == "")
    {
        alert('กรุณากรอกนามสกุล');
        document.form1.lname.focus();       
        return false;
    } 


    document.form1.submit();
}
</script>