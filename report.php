<?php


include ("connect.php");
$page = "report";
include ("header.php");

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<style type="text/css" media="screen">

  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

    .btn{
      width: 250pt;
      height:50pt; 

            box-shadow:20px 20px 50px 0px #cccccc;
        }
       .btn:hover{
          color: #cc0000;
          cursor: pointer;
        }

      
</style>
           <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ออกรายงาน</h4>
                            <hr>
                        </div>

                        <div class="card-body">

<center>
<a href="pdf_cn.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;รายงานคะแนนการเข้าเรียน</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="main_tech.php"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp; รายงานคะแนนการส่งงาน</button></a>
</center>
<br><br>
<center>
<a href="main_tech.php"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"> <i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;รายงานคะแนนการสอบ</button></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="main_tech.php"><button type="button" class="btn btn-success btn-fill" style="font-size: 24px;"> <i class="fa fa-bar-chart"></i>&nbsp;&nbsp;&nbsp;รายงานคะแนนผลการเรียน</button></a>
</center>                          
<br><br><br>
 <tbody>
                                
                              
                                </tbody>
                             
                             </table>

                        </div>
                    </div>
                </div>
            </div>


<?php

include ("footer.php");

?>