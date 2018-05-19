 <?php


    $sql_select = "SELECT * from support where col_id=1";
    $query_select = mysqli_query($con,$sql_select);
    $row_select = mysqli_fetch_assoc($query_select);
    $num_select = mysqli_num_rows($query_select)

 ?>      
        <footer class="footer">
                <div class="container">
                    <nav>
                        <p class="copyright text-center" style="font-size: 16px;">
                            นางสาวพรพิไล จิตรัตน์&nbsp;และนางสาวรังสิมา เจ๊ะสม้อ&nbsp;รุ่น'57
                          
         <a >สาขาวิทยาการคอมพิวเตอร์</a> &nbsp;คณะวิทยาศาสตร์และเทคโนโลยี&nbsp;มหาวิทยาลัยราชภัฏสุราษฎร์ธานี 
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    <!--   -->
    <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
        <form action="footer_insert.php" method="post" enctype="multipart/form-data">
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>เปลี่ยนสีแถบด้านซ้าย</p>
                    <div class="pull-right">
                        <input type="color" name="col_code" style="width: 100px;height: 25px !important;" value="<?php echo $row_select["col_code"]; ?>">
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <button target="_blank" class="btn btn-info btn-block btn-fill">Color</button>
                </div>
            </li>
        </form>
        </ul>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script src="../vendor/clocktime/compiled/flipclock.min.js"></script>


</html>