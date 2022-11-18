<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>EZJEEPNEY - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="../images/favicon.ico">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/steven_style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <?php
        include 'sidebar.php';
    ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Good day, Admin!</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal"></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                        <div style="display:flex;">
                                <div style="width:50%;padding-top:20px;padding-left:20px;color:#313131">
                                    <i class="fa-solid fa-id-card fa-2xl"></i>
                                </div>
                                <div style="text-align: right;width:50%;">
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li class="ms-auto"><span class="counter text-info">45</span>
                                        </li>
                                    </ul>
                                    <h3 class="box-title">Present Drivers</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                        <div style="display:flex;">
                                <div style="width:50%;padding-top:20px;padding-left:20px;color:#313131">
                                <i class="fa-solid fa-chalkboard-user fa-2xl"></i>
                                </div>
                                <div style="text-align: right;width:50%;">
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li class="ms-auto"><span class="counter text-info">45</span>
                                        </li>
                                    </ul>
                                    <h3 class="box-title">Present PAOs</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <div style="display:flex;">
                                <div style="width:50%;padding-top:20px;padding-left:20px;color:#313131">
                                    <i class="fa-solid fa-bus-simple fa-2xl"></i>
                                </div>
                                <div style="text-align: right;width:50%;">
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li class="ms-auto"><span class="counter text-info">22</span>
                                        </li>
                                    </ul>
                                    <h3 class="box-title">Jeepneys On-route</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- ATTENDANCE GRAPH -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 ">
                        <div class="white-box">
                            <!-- <h3 class="box-title">Daily Earnings</h3> -->
                            <h3 class="box-title">Daily Attendance</h3>
                            <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>Drivers</h5>
                                    </li>
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-inverse"></i>PAOs</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="area-chart" style="height: 250px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 ">
                        <div class="white-box">
                            <h3 class="box-title">Daily Revenue</h3>
                            <div class="d-md-flex">
                                <ul class="list-inline d-flex ms-auto">
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-info"></i>Earnings</h5>
                                    </li>
                                    <li class="ps-3">
                                        <h5><i class="fa fa-circle me-1 text-inverse"></i>Expenses</h5>
                                    </li>
                                </ul>
                            </div>
                            <!-- <label class="label label-success">Line Chart</label> -->
                            <div id="bar-chart" ></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                        <div class="white-box" style="display: flex;">
                            <div style="width: 50%;border-right:1px solid #313131;height:100%">
                                <!-- Header -->
                                <div style="display: flex;">
                                    <div style="width: 50%;">
                                        <p><strong>New Employees</strong></p>
                                    </div>
                                    <div style="width: 50%;">
                                        <p><strong>+10%</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 50%">
                                <!-- Header -->
                                <div style="display: flex;">
                                    <div style="width: 50%;">
                                        <p><strong>New Employees</strong></p>
                                    </div>
                                    <div style="width: 50%;">
                                        <p><strong>+10%</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- CHART FOR ATTENDANCE KEEPING -->
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
      var data = [
      { y: '2014', a: 50, b: 90},
      { y: '2015', a: 65,  b: 75},
      { y: '2016', a: 50,  b: 50},
      { y: '2017', a: 75,  b: 60},
      { y: '2018', a: 80,  b: 65},
      { y: '2019', a: 90,  b: 70},
      { y: '2020', a: 100, b: 75},
      { y: '2021', a: 115, b: 75},
      { y: '2022', a: 120, b: 85},
      { y: '2023', a: 145, b: 85},
      { y: '2024', a: 160, b: 95}
    ],
    config = {
        data: data,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Total Income', 'Total Outcome'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        behaveLikeLine: true,
        resize: true,
        pointFillColors:['#ffffff'],
        pointStrokeColors: ['black'],
        lineColors:['blue','dimgray']
    };
    config.element = 'area-chart';
    Morris.Area(config);
    config.element = 'stacked';
    config.element = 'bar-chart';
    Morris.Bar(config);
    </script>
</body>

</html>