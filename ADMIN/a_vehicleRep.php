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
    <title>Ez Jeepney - Vehicle Report</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/ez-jeepney-logo-only.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <!-- CSS For Date Range Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="./css/steven_style.css">
</head>

<body>
    <?php
        include_once 'sidebar.php';
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
                        <h4 class="page-title">Vehicle Report</h4>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">History of Maintenance and Repairs</h3> <br>

                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Vehicle Plate Number</th>
                                            <th class="border-top-0">Date Issued</th>
                                            <th class="border-top-0">Date Fixed</th>
                                            <th class="border-top-0">Reason of Report</th>
                                            <th class="border-top-0">Maintenance Cost</th>
                                            <th class="border-top-0">Vehicle Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $start = date('m/d/Y');
                                            $end = date('m/d/Y');
                                            $statement = "SELECT * FROM tb_maintenance";
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

                                                // if($result['date_fixed'] == NULL){
                                                

                                                $result = "<tr><td>"  . $result['plate_number'] . "</td>" .
                                                "<td>" . '<a href="vec_Issue.php?mtnID=' . $result['mtnID'] . '">' . date("F d, Y", strtotime($result['date_issued'])) . '</a>' . "</td>" .
                                                // "<td>" . '<a href="vec_Issue.php?date_issued=' . $result['date_issued'] .  '">' . '</a>' . "</td>" .
                                                "<td>"  . $dateFixed  . "</td>" .
                                                "<td>"  . $result['reason'] . "</td>" .
                                                "<td>"  . $result['maintenance_cost'] . "</td>" .
                                                "<td>" . $status . "</td>" . "</tr>";
                                                echo $result;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="white-box">
                            <h3 class="box-title">Maintenance Schedule</h3> <br>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Vehicle Plate Number</th>
                                            <th class="border-top-0">Schedule of Maintenance</th>
                                            <th class="border-top-0">Vehicle Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $start = date('m/d/Y');
                                            $end = date('m/d/Y');
                                            $statement = "SELECT * FROM tb_maintenance WHERE reason = 'Maintenance'";
                                            $dt = mysqli_query($conn, $statement);

                                            while ($result = mysqli_fetch_array($dt)){

                                                if(strtotime($result['date_issued'])  > 0 && strtotime($result['date_fixed'])  > 0){
                                                    $status = "Fixed";
                                                }
                                                else{
                                                    $status = "On-going";
                                                }

                                                $result = "<tr><td>"  . $result['plate_number'] . "</td>" .
                                                "<td>"  . date("F d, Y", strtotime($result['date_issued'])) . "</td>" .
                                                "<td>" . $status . "</td>";
                                                echo $result;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action = "a_vehicleRep_inc.php" method="POST" id="vhRep">
                <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="col-lg-4 col-md-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Maintenance Expense</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT maintenance_cost FROM tb_maintenance;";
                                        $dt = mysqli_query($conn, $statement);
                                        $maintenance_cost = 0;
                                        while ($result = mysqli_fetch_array($dt)){
                                            $maintenance_cost += $result['maintenance_cost']; 
                                        }
                                        // echo $maintenance_cost;
                                    ?>
                                <li class="ms-auto"><span class="counter text-danger">₱<?php echo $maintenance_cost ?></span></li>
                                </ul>
                            </div>
                        </div>
                </div>
                <div class="col-sm-12">
                    <div class="white-box"> 
                        <div class="form-group mb-4">

                        <div class="form-group mb-4">
                            <div class="col-sm-12">Date Issued<br>
                                <div class="col-sm-12 border-bottom">
                                    <input type="date" name="DateIssued" id="DateIssued" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()' required> 
                                    <noscript>
                                        <input type="submit" value="submit">
                                    </noscript>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Plate Number<br>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control" id='plateNumber' name='plateNumber' required>
                                        <option class="e_select" value="" selected="true" disabled="disabled"></option>
                                        <?php
                                            require_once '../dbh.inc.php'; 
                                            $statement = "SELECT plate_number FROM tb_jeepney";
                                            $dt = mysqli_query($conn, $statement);

                                            while ($result = mysqli_fetch_array($dt)){
                                            unset($plateNum);
                                            $plateNum = $result['plate_number'];
                                            $result = "<option class = 'e_select' value= '$plateNum'>" . $result['plate_number'] . "</option>";
                                            echo $result;
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Reason of Report<br>
                                <div class="col-md-12 border-bottom p-0">
                                    <select class="form-select shadow-none p-0 border-0 form-control" name="reason" id="reason">
                                        <option class="e_select" name="reason" id="reason" value="reason" selected="true" disabled="disabled"></option>
                                        <option class="e_select" value="Maintenance">Scheduled Maintenance</option>
                                        <option class="e_select" id="def_part" value="Defective Part/s">Defective Part/s Found</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Additional Description<br>
                                <div class="form-select shadow-none p-0 border-0 form-control">
                                    <textarea rows="5" class="form-control p-0 border-0" style="resize: none; height: 50px;" name="details" id="details"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Date Fixed<br>
                                <div class="col-sm-12 border-bottom">
                                    <input type="date" name="DateFixed" id="DateFixed" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()'?>
                                        <noscript>
                                            <input type="submit" value="submit">
                                        </noscript>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">Maintenance Cost<br>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" class="form-control p-0 border-0" name="MaintenanceCost" id="MaintenanceCost"> 
                                </div>
                            </div>
                        </div>
                        
                        <button onclick="valiDate()" class="btn btn-success"  type='submit' name="submit" style="color: white">Submit Maintenance Report</button>
                    </div>
                </div>
                </div>
                </form>
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
            <footer class="footer text-center"> ©2022  EZ JEEPNEY </footer>
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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
    <script script type="text/javascript" language="javascript">
        function valiDate(){
            var sDate = document.getElementById("DateIssued").value;
            var fDate = document.getElementById("DateFixed").value;
            var mCost = document.getElementById("MaintenanceCost").value;
            submitOk = 0;

            if(sDate >= fDate || (mCost < 0 || isNaN(mCost))){

                if(sDate >= fDate && fDate != NULL){
                    alert("The date fixed should not be earlier than the date issued.");
                    submitOk = "false";
                }

                if(mCost < 0 || isNaN(mCost)){
                    alert("The maintenance cost should be numerical.");
                    submitOk = "false";
                }
            }
            else{
                submitOk = "true";
            }

            if(submitOk === "true")
                $('#vhRep').submit(function() {
                alert('Success!');
                return true;
                });
                }
            
    </script>
</body>

</html>