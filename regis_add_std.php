<?php

//error_reporting(0);
include ("connect.php");
include ("header.php");

//include();




  //$sql = "SELECT * FROM student ";
//$qr = mysqli_query($con,$sql) or die ("Error Query [".$sql."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
 $objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_assoc($objQuery2);
  $sub_id=$_GET["sub_id"];
?>

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
* {
  box-sizing: border-box;
}

#txtKeyword {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

<?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {
    $strKeyword = $_POST["txtKeyword"];
  }
?>
</style>
    
                
        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="subject.php">รายการลงทะเบียน</a>
                              </li>  
                              <li class="breadcrumb-item active">วิชา<?=$objResult2["sub_name"];?></li>
                              <li class="breadcrumb-item active">Section:<?=$objResult2["section"];?></li>
                          </ol>
    
        <div class="header text-center">
          <h3 class="title">รายชื่อนักศึกษาที่ต้องการลงทะเบียน</h3>
         </div>
                        <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

 <div class="card-body">   

<script language=JavaScript type=text/javascript>
<!-- 
function CheckAll() {
for (var i = 0; i < document.frmMain.elements.length; i++) {
if(document.frmMain.elements[i].type == 'checkbox'){
document.frmMain.elements[i].checked = !(document.frmMain.elements[i].checked);
}
}
}
//-->
</script>
<script type='text/javascript'>
function checkAll(id)
{
  elm=document.getElementsByTagName('input');
  for(i=0; i<elm.length ;i++){
     if(elm[i].id==id){
        elm[i].checked = true ;
      }
     }
   
}

function uncheckAll(id)
{
  elm=document.getElementsByTagName('input');
  for(i=0; i<elm.length ;i++){
     if(elm[i].id==id){
        elm[i].checked = false ;
      }
     }
}
</script>

      
        </div>
        <div class="modal-body">
          <?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["txtKeyword"]))
  {
    $strKeyword = $_POST["txtKeyword"];
  }
?>
   <?php
     $sql = "SELECT * FROM student WHERE std_number LIKE '%".$strKeyword."%' or std_group LIKE '%".$strKeyword."%' or std_name LIKE '%".$strKeyword."%' ";

   $qr = mysqli_query($con,$sql);
   ?>      

<center >
    <form name="frmSearch" method="post" action ="" >
              <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>"  placeholder="ค้นหา.. " title="Type in a name" style="width: 300px;height: 35px;">
                                 
      <input type="hidden" value="Search"  onClick="this.form.action='<?php echo $_SERVER['SCRIPT_NAME'];?>?sub_id=<?php echo $sub_id; ?>'; submit()" >
</form>
</center>

     <form action="regis_add_st2.php?sub_id=<?=$objResult2["sub_id"]?>" method="post" name="frmMain">

        <div class="card-body" >
            <table class="table table-bordered" id="example" >
              <thead>
                <tr>

                  
                <th>

                  <a class="btn btn-light" onclick="checkAll('chkbox')"><i class="glyphicon glyphicon-check"></i>เลือกทั้งหมด</a></th>
                   <th>ลำดับ</th>
                  <th>รหัสนักศึกษา</th>
                  <th>กลุ่มเรียน</th>
                  <th>ชื่อ-นามสกุล</th>
                <th></th>
                </tr>
              </thead>
              <tbody>


             <?php
             $i=1;
while($objQuery1 = mysqli_fetch_array($qr)) 
{
?>
             
                <tr>
                

                  <td><input type="checkbox" name="std_name[]" id='chkbox' value="<?php echo($objQuery1["std_id"]);?>">
                  </td>
               
                  <td><?php echo $i;?></td>
                  <td><?php echo($objQuery1["std_number"]);?></td>
                  <td><?php echo($objQuery1["std_group"]);?></td>

     


                  <td > 
 <?php echo($objQuery1["std_name"])." ";?> <?php echo($objQuery1["std_lname"]);?>

                  </td>
         <td></td>
       


                 
 
                </tr>
                 <?php
                 $i++;
    }
      ?>
      
              </tbody>
        
            </table>
          <center>
            <a href="subject.php"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
            <button type="submit" class="btn btn-primary">บันทึก</button>
          </center>
</form>
            </div>
                    </div>
                </div>
            </div>

<?php
     function thaidate($tDate) //แปลงวันที่เป็นวันที่ไทย
  {
    $y = substr($tDate, 0, 4) + 543;
    $m = substr($tDate, 5, 2);
    $d = substr($tDate, 8, 9);
    if ($tDate == "")
    {
      return "";
    } else
    {
      return $d . "/" . $m . "/" . $y;
    }
  }
?>


        <script>
function myFunction() {
    var checkBox = document.getElementById("chkbox");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}
</script>
<script>
window.onload = function() {
  document.getElementById("").focus();
};
</script>