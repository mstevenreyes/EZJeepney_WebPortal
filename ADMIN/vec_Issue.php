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
    <title>Maintenance Report Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/majetsco_logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/steven_style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
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
                        <h4 class="page-title">Vehicle Report Information</h4>
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
                                <form id="form-ni-geon" action ="" method="POST" class="form-horizontal form-material" novalidate="novalidate">

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Maintenance Report ID:</label>
                                        <div class="col-md-12 border-bottom p-0">
            
                                            <?php 
                                                require_once '../dbh.inc.php';   
                                                $ID = $_GET['mtnID'];
                                                echo $ID;
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date Issued:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <?php 
                                                
                                                require_once '../dbh.inc.php';  

                                                $statement = "SELECT date_issued FROM tb_maintenance WHERE mtnID = '$ID'";
                                                $dt = mysqli_query($conn, $statement);
                                                
                                                while ($result = mysqli_fetch_array($dt)){
                                                    echo date("F d, Y", strtotime($result['date_issued']));
                                                }
                                                    
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date Fixed:</label>
                                            <div class="col-md-12 border-bottom p-0">
                
                                                <?php 
                                                    require_once '../dbh.inc.php';  
                                                    $statement = "SELECT date_fixed FROM tb_maintenance WHERE mtnID = '$ID'";
                                                    $dt = mysqli_query($conn, $statement);
                                                    
                                                    while ($result = mysqli_fetch_array($dt)){
                                                        if(strtotime($result['date_fixed'])  > 0){
                                                            $dateFixed = date("F d, Y", strtotime($result['date_fixed']));
                                                            echo $dateFixed;
                                                        }
                                                        else{
                                                            $dateFixed = "N/A";
                                                            echo $dateFixed;
                                                        }
                                                        // echo date("F d, Y", strtotime($result['date_fixed']));
                                                    }
                                                ?>
                                            </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Additional Description:</label>
                                            <div class="col-md-12 border-bottom p-0">
            
                                                <?php 
                                                    require_once '../dbh.inc.php';  
                                                    $statement = "SELECT description FROM tb_maintenance WHERE mtnID = '$ID'";
                                                    $dt = mysqli_query($conn, $statement);
                                                    
                                                    while ($result = mysqli_fetch_array($dt)){
                                                        echo $result ['description'];
                                                    }
                                                ?>
                                            </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Reason of Report:</label>
                                            <div class="col-md-12 border-bottom p-0">   
            
                                                <?php 
                                                    require_once '../dbh.inc.php';  
                                                    $statement = "SELECT reason FROM tb_maintenance WHERE mtnID = '$ID'";
                                                    $dt = mysqli_query($conn, $statement);
                                                    
                                                    while ($result = mysqli_fetch_array($dt)){
                                                        echo $result ['reason'];
                                                    }
                                                ?>
                                            </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" >Maintenance Cost:</label>
                                            <div class="col-md-12 border-bottom p-0">

                                                <?php 
                                                    require_once '../dbh.inc.php';  
                                                    $statement = "SELECT maintenance_cost FROM tb_maintenance WHERE mtnID = '$ID'";
                                                    $dt = mysqli_query($conn, $statement);
                                                
                                                    while ($result = mysqli_fetch_array($dt)){
                                                        echo $result ['maintenance_cost'];
                                                    }
                                                ?>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Vehicle Status:</label>
                                            <div class="col-md-12 border-bottom p-0">

                                                <?php
                                                    require_once '../dbh.inc.php';  
                                                    $start = date('m/d/Y');
                                                    $end = date('m/d/Y');
                                                    $statement = "SELECT * FROM tb_maintenance WHERE mtnID = '$ID'";
                                                    $dt = mysqli_query($conn, $statement);

                                                    while ($result = mysqli_fetch_array($dt)){

                                                        if(strtotime($result['date_fixed'])  > 0){
                                                            $dateFixed = date("F d, Y", strtotime($result['date_fixed']));
                                                            // $dateFixed = "";
                                                        }
                                                        else{
                                                            $dateFixed = "";
                                                        }
        
                                                        if(strtotime($result['date_issued'])  > 0 && strtotime($result['date_fixed'])  > 0){
                                                            $status = "Fixed";
                                                        }
                                                        else{
                                                            $status = "On-going";
                                                        }
                                                
                                                    echo $status;
                                                    }
                                                ?>
                                            </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="button" name="submit" class="btn vc-edit-form">Edit Record</button>
                                           
                                        </div>
                                    </div>
                                    <!-- <div class="table-responsive">
                                        <button type="submit" name="submit" class="btn edit-form" style="width: 300px;">EDIT SALARY DETAILS</button>
                                        <button type="submit" name="delete" class="btn del-form" style="width: 300px; background-color: #0f1236">DELETE SALARY REPORT</button>
                                    </div> -->
                                </form>

                                <!-- EDIT FORM FOR MAINTENANCE REPORT -->
                                <div class="vceform-popup">
                                    <div class="container vceform-wrapper">
                                        <button class="vceclose-form">Close</button>
                                        <form action="" method="POST" novalidate="novalidate">

                                        <!-- QUERY TO GET ALL RELATED VALUES FROM DATABASE -->
                                        <?php
                                            require_once '../dbh.inc.php';
                                            $start = date('m/d/Y');
                                            $end = date('m/d/Y');
                                            $statement = "SELECT * FROM tb_maintenance";
                                            $dt = mysqli_query($conn, $statement);

                                            while ($result = mysqli_fetch_array($dt)){
                                                $DI = $result['date_issued'];
                                                $DF = $result['date_fixed'];
                                                $pNum = $result['plate_number'];
                                                $descript = $result['description'];
                                                $reason = $result['reason'];
                                                $mCost = $result['maintenance_cost'];

                                                
                                            }

                                        ?>

                                        <div class="row">
                                            <div class="col-md-12 text-center"></br>
                                                <h2 class="vceform-title">Edit Maintenance Report Details</h2>

                                                <h4 class="deductions_table deduction_details" style="text-align: center; font-weight: bold;">Maintenance Report ID: <?php echo $ID?></h4>
                                                <form action="a_salary_report_edit_inc.php" method="POST" novalidate="novalidate">
                                                <!-- DEDUCTIONS TABLE -->
                                                <table class="deductions_table deduction_details">
                                                    <thead>
                                                        <tr><th class="border-top-0" style="width:350px; margin-left: -25px">Date Issued</th>
                                                        <th class="border-top-0">
                                                            <input placeholder="<?php echo date("F d, Y", strtotime($DI))?>" class="deduction_details" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="vec_iDate" name="vec_iDate" />
                                                                <noscript>
                                                                    <input type="submit" value="submit">
                                                                </noscript></th></tr>
                                                    </thead>
                                                    <thead>
                                                        <tr><th class="border-top-0">Date Fixed</th>
                                                        <th class="border-top-0">
                                                            <input placeholder="<?php echo date("F d, Y", strtotime($DF))?>" class="deduction_details" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="vec_Fdate" name="vec_Fdate" />
                                                                <noscript>
                                                                    <input type="submit" value="submit">
                                                                </noscript></th></tr>
                                                    </thead>
                                                </table>
                                                <table class="deductions_table deduction_details">
                                                    <thead>
                                                        <tr><th class="border-top-0">Addtional Description</th></tr>
                                                    </thead>
                                                </table>
                                                <table class="deductions_table deduction_details">
                                                    <thead>
                                                        <tr><th class="border-top-0">Reason of Report</th>
                                                        
                                                    </thead>
                                                    <thead>
                                                        <tr><th class="border-top-0" style="width:350px;">Maintenance Cost</th>
                                                        <th><input type="text" class="deduction_details" name="newMC" id="newMC" style="width:350px; margin-left: -25px" placeholder="Amount"></th></tr>
                                                    </thead>
                                                </table>
                                                </form>
                                                 <!-- ETONG BUTTON FOR SUBMISSION PWEDE ILAGAY OUTSIDE FORM TAG, LAGAY MU NLNG SA POPUP MO ETO -->
                                                <button class ="vcesend-form" type="submit" form="form-ni-geon" onclick="!this.form&&$('#'+$(this).attr('form')).submit()">Submit Form</button>
                                                <!-- ========================== -->
                                            </div>
                                        </div>
                                        
                                            <div class="form-check">
                                                <label></label>
                                            </div>
                                            <!-- <input type="submit" name="submit" class="btn send-form" value="Confirm"> -->
                                        </form>
                                    </div>
                                </div>
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

    <!-- EDIT POP OUT -->
    <script>
        // FUNCTION FOR DELETE POP OUT //
        $(document).ready(function() {
            $('.vc-edit-form').click(function() {
                $('.vceform-popup').show();
            });
            $('.vceclose-form').click(function() {
                $('.vceform-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var container = $(".vceform-wrapper");
                var form = $(".vceform-popup");

                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    form.hide();
                }
            });
        });
    </script>
</body>

</html>