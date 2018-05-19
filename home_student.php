<?php

include ("connect.php");
$page = "home_student";
include ("header_student.php");

?>

<style type="text/css" media="screen">
#calendar_css {
    background-color:#F0F0F0;
    border-style:solid;
    border-width:0px;
    border-right-width:0px;
    border-bottom-width:0px;
    border-color:#cccccc;
}
#calendar_css td{
    text-align:center;
    font:11px tahoma;
    width:2%;
    height:18px;
}
#calendar_css thead{
    text-align:center;
    font:11px tahoma;
    width:2%;
    height:18px;
    background-color:#333333;
    color:#FFFFFF;
}
#calendar_css .current{
    text-align:center;
    font:11px tahoma;
    width:2%;
    height:18px;
    background-color:#FF0000;
    color:#FFFFFF;
}
col.holidayCol{
    background-color:#FDDFE4;
    color:#FF0000;
}
td.monthTitle{
    background-color:#666666;
    text-align:center;
    font:11px bold tahoma;  
}   
.your-clock{
zoom: 0.5;
-moz-transform: scale(0.5)
}
</style>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-body ">

                                    <div id="demo" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                      </ul>
                                      
                                      <?php
                                       /* $sql_pw = "SELECT * FROM `pic_web`";
                                        $q_pw = mysqli_query($mysqli,$sql_pw);
                                        $row_pw = mysqli_fetch_array($q_pw,MYSQLI_ASSOC);
*/
                                        ?>
                                      <!-- The slideshow -->
                                    <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <img src="../img/page.jpg" width="100%" height="400">
                                            <div class="carousel-caption">
                                            </div> 
                                            </div>
                                        
                                            <div class="carousel-item">
                                            <img src="../img/Page1.jpg" width="100%" height="400">
                                            <div class="carousel-caption">
                                            </div>
                                            </div>
                                        
                                            <div class="carousel-item">
                                            <img src="../img/Page2.jpg" width="100%" height="400">
                                            <div class="carousel-caption">
                                            </div>
                                            </div>
                                    </div>
                                      
                                      <!-- Left and right controls -->
                                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                      </a>
                                      <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                      </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                            <div class="card  card-tasks">
                                <div class="card-body">

                                <div class="clock your-clock" style="margin:2em; font-size: 10px;" ></div>


                                <?php   
                                    $day_now=array("Sun"=>"1","Mon"=>"2","Tue"=>"3","Wed"=>"4","Thu"=>"5",
                                        "Fri"=>"6","Sat"=>"7");   
                                    $first_day=date("D",mktime(0,0,1,intval(date("m")),1,date("Y")));   
                                    $start_td=$day_now[$first_day]-1;      
                                    $num_day=date("t");   
                                    $num_day2=($num_day+$start_td);   
                                    $num_day3=(7*ceil($num_day2/7));   
                                ?>   
                                <table id="calendar_css" width="100%" height="190" border="0" cellspacing="0" 
                                cellpadding="0">   
                                <colgroup>   
                                    <col class="holidayCol" />   
                                    <col span="5" />   
                                    <col class="holidayCol" />   
                                </colgroup>   
                                <thead>   
                                <tr>
                                    <td colspan="7" class="monthTitle">
                                        <?=date("M-Y")?>
                                    </td>
                                </tr>
                                <tr>   
                                    <td>อา </td>   
                                    <td>จ </td>   
                                    <td>อ </td>   
                                    <td>พ </td>   
                                    <td>พฤ </td>   
                                    <td>ศ </td>   
                                    <td>ส </td>   
                                </tr>   
                                </thead>   
                                    <?php for($i=1;$i <=$num_day3;$i++) { ?>   
                                    <?php if($i%7==1) { ?>

                                <tr>   
                                    <?php } ?>   
                                    
                                    <td <?=(date("j")==$i-$start_td)?"class=\"current\"":""?>> <?=($i-$start_td>=1 && $i-$start_td <=$num_day)?$i-$start_td:" "?> 
                                    </td>   

                                    <?php if($i%7==0){ ?>   
                                </tr>  

                                    <?php } ?>   
                                    <?php } ?>  

                                </table>  
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card ">
                         <div class="card-body ">
                                <div class="modal-body">
         <font color="red"><h5><i class="fa fa-graduation-cap" style="font-size:24px;color:#00ff00"></i>วัตุถุประสงค์</h5></font>
         <hr>
      <font color="#0000ff"><p>1. เพื่อศึกษาระบบบริหารจัดการการเรียนการสอน สาขาวิชาวิทยาการคอมพิวเตอร์</p></font>
      <font color="#0000ff"><p>2. เพื่อวิเคราะห์และออกแบบระบบบริหารจัดการการเรียนการสอน สาขาวิชาวิทยาการคอมพิวเตอร์</p></font>
      <font color="#0000ff"><p>3. เพื่อพัฒนาระบบบริหารจัดการการเรียนการสอน สาขาวิชาวิทยาการคอมพิวเตอร์</p> </font>  
       <font color="#0000ff"><p>4. เพื่อประเมินประสิทธิภาพและความพึงพอใจของผู้ใช้งานในระบบบริหารจัดการการเรียนการสอน สาขาวิชาวิทยาการคอมพิวเตอร์</p></font>
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


        <script type="text/javascript">
            var clock;
            
            $(document).ready(function() {
                var date = new Date();

                clock = $('.clock').FlipClock(date, {
                    clockFace: 'TwentyFourHourClock'
                });
            });
        </script>