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
    <title>Ez Jeepney - Employee Recognition</title>
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
    <link rel="stylesheet" href="css/steven_style.css">
</head>

<body>
<?php
        include 'sidebar.php';
        include '../dbh.inc.php';
        $sql = "SELECT * FROM tb_employee";
        $stmt = mysqli_query($conn, $sql);
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
                        <h3 class="page-title">Employee Recognition</h3>
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
                            <h3 class="box-title">Employee of the Month</h3>
                            <div class="row align-items-center">
                                <button class="btn-edit-supply btn edit-form">Edit Employee of the Month</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap schedule-table" >
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 required">Name of Incentive/s:</th>
                                            <th class="border-top-0 required">Amount:</th>
                                            <th class="border-top-0 required">Name of Beneficiary:</th>
                                            <th class="border-top-0 required">Date Received:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- GET VEHICLES LIST DATA FROM DB -->
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT * FROM tb_incentives";
                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){
                                                $result = "<tr><td>"  . $result['incentive_name'] . "</td>" .
                                                "<td>"  . $result['amt'] . "</td>" .
                                                "<td>"  . $result['beneficiary_name'] . "</td>" .
                                                "<td>"  . $result = date("F d, Y", strtotime($result['date_received'])) . "</td>";
                                                echo $result;
                                            }
                                        ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Best Attendance</h3> <br>
                        <div class="row align-items-center">
                             <button class="btn-edit-supply btn edit-att-form" style="border-radius:10px;">Edit Best Attendance</button>
                        </div>                               
                        <div class="table-responsive">
                            <table class="table text-nowrap schedule-table" >
                                <thead>
                                    <tr>
                                        <th class="border-top-0 required">Name of Incentive/s:</th>
                                        <th class="border-top-0 required">Amount:</th>
                                        <th class="border-top-0 required">Name of Beneficiary:</th>
                                        <th class="border-top-0 required">Date Received:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- GET VEHICLES LIST DATA FROM DB -->
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT * FROM tb_incentives";
                                        $dt = mysqli_query($conn, $statement);
                                        while ($result = mysqli_fetch_array($dt)){
                                            $result = "<tr><td>"  . $result['incentive_name'] . "</td>" .
                                            "<td>"  . $result['amt'] . "</td>" .
                                            "<td>"  . $result['beneficiary_name'] . "</td>" .
                                            "<td>"  . $result = date("F d, Y", strtotime($result['date_received'])) . "</td>";
                                            echo $result;
                                        }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Employee with the Most Revenue Gathered</h3>
                        <div class="row align-items-center">
                                <button class="btn-edit-supply btn edit-cont-form" style="border-radius:10px;">Edit Employee With the Most Revenue Gathered</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap schedule-table" >
                                <thead>
                                    <tr>
                                        <th class="border-top-0 required">Name of Incentive/s:</th>
                                        <th class="border-top-0 required">Amount:</th>
                                        <th class="border-top-0 required">Name of Beneficiary:</th>
                                        <th class="border-top-0 required">Date Received:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- GET VEHICLES LIST DATA FROM DB -->
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT * FROM tb_incentives";
                                        $dt = mysqli_query($conn, $statement);
                                        while ($result = mysqli_fetch_array($dt)){
                                            $result = "<tr><td>"  . $result['incentive_name'] . "</td>" .
                                            "<td>"  . $result['amt'] . "</td>" .
                                            "<td>"  . $result['beneficiary_name'] . "</td>" .
                                            "<td>"  . $result = date("F d, Y", strtotime($result['date_received'])) . "</td>";
                                            echo $result;
                                        }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-popup">
                <div class="container form-wrapper">
                    <button class="close-form">Close</button>
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

                            if(strtotime($DF > 0)){
                                $dateFixed = date("F d, Y", strtotime($DF));
                            }
                            else{
                                $dateFixed = "No fixed date yet";
                            }
                        }

                    ?>

                    <div class="row">
                        <div class="col-md-12 text-center"></br>
                            <h2 class="vceform-title">Edit Employee of the Month</h2>

                            <h4 class="deductions_table deduction_details" style="text-align: center; font-weight: bold;">Employee ID: Jane Doe</h4>
                            <form action="a_salary_report_edit_inc.php" method="POST" novalidate="novalidate">
                            <!-- DEDUCTIONS TABLE -->
                            <table class="deductions_table deduction_details">
                                <thead>
                                    <th class="border-top-0" style="width:350px;">Recognition Given</th>
                                    <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Recognition"></th></tr>
                                </thead>
                                <thead>
                                    <tr><th class="border-top-0" style="width:350px;">Amount</th>
                                    <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Amount"></th></tr>
                                </thead>
                            </table>
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
                                    <tr><th class="border-top-0">Date Given</th>
                                    <th class="border-top-0">
                                        <input placeholder="<?php echo $dateFixed?>" class="deduction_details" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="vec_Fdate" name="vec_Fdate" />
                                            <noscript>
                                                <input type="submit" value="submit">
                                            </noscript></th></tr>
                                </thead>
                            </table>
                            <table class="deductions_table deduction_details">
                                <thead>
                                    <tr><th class="border-top-0">Addtional Description</th></tr>
                                </thead>
                                <tr><td class=" shadow-none p-0 border-0 form-control" style="height: 100px">
                                    <input type="text" class="deduction_details" 
                                            name="newMC" id="newMC" 
                                            rows="5" class="deduction_details" 
                                        style="resize: none; height: 75px; width: 550px;" 
                                        name="vec_details" id="vec_details">
                                </td></tr>
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
            <div class="eform-popup">
                <div class="container eform-wrapper">
                    <button class="eclose-form">Close</button>
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

                            if(strtotime($DF > 0)){
                                $dateFixed = date("F d, Y", strtotime($DF));
                            }
                            else{
                                $dateFixed = "No fixed date yet";
                            }
                        }

                    ?>

                    <div class="row">
                        <div class="col-md-12 text-center"></br>
                            <h2 class="vceform-title">Edit Employee with the Best Attendance</h2>

                            <h4 class="deductions_table deduction_details" style="text-align: center; font-weight: bold;">Employee ID: Jane Doe</h4>
                            <form action="a_salary_report_edit_inc.php" method="POST" novalidate="novalidate">
                            <!-- DEDUCTIONS TABLE -->
                            <table class="deductions_table deduction_details">
                                <thead>
                                    <th class="border-top-0" style="width:350px;">Recognition Given</th>
                                    <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Recognition"></th></tr>
                                </thead>
                                <thead>
                                    <tr><th class="border-top-0" style="width:350px;">Amount</th>
                                    <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Amount"></th></tr>
                                </thead>
                            </table>
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
                                    <tr><th class="border-top-0">Date Given</th>
                                    <th class="border-top-0">
                                        <input placeholder="<?php echo $dateFixed?>" class="deduction_details" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="vec_Fdate" name="vec_Fdate" />
                                            <noscript>
                                                <input type="submit" value="submit">
                                            </noscript></th></tr>
                                </thead>
                            </table>
                            <table class="deductions_table deduction_details">
                                <thead>
                                    <tr><th class="border-top-0">Addtional Description</th></tr>
                                </thead>
                                <tr><td class=" shadow-none p-0 border-0 form-control" style="height: 100px">
                                    <input type="text" class="deduction_details" 
                                            name="newMC" id="newMC" 
                                            rows="5" class="deduction_details" 
                                        style="resize: none; height: 75px; width: 550px;" 
                                        name="vec_details" id="vec_details">
                                </td></tr>
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
                    
                        <div class="form-check">
                            <label></label>
                        </div>
                        <!-- <input type="submit" name="submit" class="btn send-form" value="Confirm"> -->
                    </form>
                </div>
            </div>

            <div class="aform-popup">
                <div class="container aform-wrapper">
                    <button class="aclose-form">Close</button>
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

                            if(strtotime($DF > 0)){
                                $dateFixed = date("F d, Y", strtotime($DF));
                            }
                            else{
                                $dateFixed = "No fixed date yet";
                            }
                        }

                    ?>

                    <div class="row">
                        <div class="col-md-12 text-center"></br>
                            <h2 class="vceform-title">Edit Employee with the Most Revenue Gathered</h2>

                            <h4 class="deductions_table deduction_details" style="text-align: center; font-weight: bold;">Employee ID: Jane Doe</h4>
                            <form action="a_salary_report_edit_inc.php" method="POST" novalidate="novalidate">
                            <!-- DEDUCTIONS TABLE -->
                            <table class="deductions_table deduction_details">
                                <thead>
                                    <th class="border-top-0" style="width:350px;">Recognition Given</th>
                                    <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Recognition"></th></tr>
                                </thead>
                                <thead>
                                    <tr><th class="border-top-0" style="width:350px;">Amount</th>
                                    <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Amount"></th></tr>
                                </thead>
                            </table>
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
                                    <tr><th class="border-top-0">Date Given</th>
                                    <th class="border-top-0">
                                        <input placeholder="<?php echo $dateFixed?>" class="deduction_details" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="vec_Fdate" name="vec_Fdate" />
                                            <noscript>
                                                <input type="submit" value="submit">
                                            </noscript></th></tr>
                                </thead>
                            </table>
                            <table class="deductions_table deduction_details">
                                <thead>
                                    <tr><th class="border-top-0">Addtional Description</th></tr>
                                </thead>
                                <tr><td class=" shadow-none p-0 border-0 form-control" style="height: 100px">
                                    <input type="text" class="deduction_details" 
                                            name="newMC" id="newMC" 
                                            rows="5" class="deduction_details" 
                                        style="resize: none; height: 75px; width: 550px;" 
                                        name="vec_details" id="vec_details">
                                </td></tr>
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
                    
                        <div class="form-check">
                            <label></label>
                        </div>
                        <!-- <input type="submit" name="submit" class="btn send-form" value="Confirm"> -->
                    </form>
                </div>
            </div>
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
    <script>

</script>
    <script>

        // FUNCTION FOR OPEN-FORM //
        $(document).ready(function() {
            $('.edit-form').click(function() {
                $('.form-popup').show();
            });
            $('.close-form').click(function() {
                $('.form-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var container = $(".form-wrapper");
                var form = $(".form-popup");

                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    form.hide();
                }
            });
        });


        $(document).ready(function() {
            $('.edit-att-form').click(function() {
                $('.eform-popup').show();
            });
            $('.eclose-form').click(function() {
                $('.eform-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var econtainer = $(".form-wrapper");
                var eform = $(".form-popup");

                if (!econtainer.is(e.target) && econtainer.has(e.target).length === 0) {
                    eform.hide();
                }
            });
        });

           $(document).ready(function() {
            $('.edit-cont-form').click(function() {
                $('.aform-popup').show();
            });
            $('.aclose-form').click(function() {
                $('.aform-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var acontainer = $(".form-wrapper");
                var aform = $(".form-popup");

                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    aform.hide();
                }
            });
        });

    </script>

</body>

</html>