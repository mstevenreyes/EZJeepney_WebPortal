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
    <title>Add Jeepney Unit - Majetsco</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/majetsco_logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

<body>
    <?php
        session_start();
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
                        <h4 class="page-title">Jeepney Maintenance Summary</h4>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/orig_bg.jpg">
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action = "jeepney.inc.php" method="GET" class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" >Date Issued</label>
                                        <div class="col-md-12 border-bottom p-0">
                                                <?php 
                                                        
                                                        require_once '../dbh.inc.php';  
                                                        $di = $_GET['date_issued'];

                                                        echo $di;
                                                        // $statement = "SELECT date_issued FROM tb_maintenance";
                                                        // $dt = mysqli_query($conn, $statement);
                                                        
                                                       
                                                        // while ($result = mysqli_fetch_array($dt)){
                                                        //     echo  date("F d, Y", strtotime($result['date_issued'])) ;
                                                        // }
                                                        
                                                        

                                        
                                                    ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" >Date Fixed</label>
                
                                                <?php 
                                                        require_once '../dbh.inc.php';  
                                                        $statement = "SELECT date_fixed FROM tb_maintenance WHERE date_issued = '$di'";
                                                        $dt = mysqli_query($conn, $statement);
                                                       
                                                        while ($result = mysqli_fetch_array($dt)){
                                                            echo  $result['date_fixed'];
                                                        }
                                                    ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" >Reason of Report</label>
                    
                                                <?php 
                                                        require_once '../dbh.inc.php';  
                                                        $statement = "SELECT descript FROM tb_maintenance WHERE date_issued = '$di'";
                                                        $dt = mysqli_query($conn, $statement);
                                                       
                                                        while ($result = mysqli_fetch_array($dt)){
                                                            echo $result ['descript'];
                                                        }
                                                    ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" >Maintenance Cost</label>
                                        <?php 
                                                        require_once '../dbh.inc.php';  
                                                        $statement = "SELECT maintenance_cost FROM tb_maintenance WHERE date_issued = '$di'";
                                                        $dt = mysqli_query($conn, $statement);
                                                       
                                                        while ($result = mysqli_fetch_array($dt)){
                                                            echo $result ['maintenance_cost'];
                                                        }
                                                    ?>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Vehicle Status</label>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $start = date('m/d/Y');
                                            $end = date('m/d/Y');
                                            $statement = "SELECT * FROM tb_maintenance WHERE date_issued = '$di'";
                                            $dt = mysqli_query($conn, $statement);

                                            while ($result = mysqli_fetch_array($dt)){

                                                if($result['date_issued'] == NULL || $result['date_fixed'] == NULL){
                                                    $status = "On-going";
                                                }
                                                else{
                                                    $status = "Fixed";
                                                }

                                                if($result['date_fixed'] == NULL){
                                                    $dateFixed = "";
                                                }
                                                else{
                                                    $dateFixed = date("F d, Y", strtotime($result['date_fixed']));
                                                }
                                           
                                               echo $status;
                                            }
                                        ?>
                                            </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type='submit' name="submit" class="btn btn-success" value="Add Jeepney">Edit Record</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> ©2022 EZ JEEPNEY </footer>
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
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>