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
                                                  // Making mtnID global
                                                $_SESSION['mtnID'] = $ID;
                                                echo $ID;
                                            ?>

                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Vehicle Plate Number:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <?php 
                                                
                                                require_once '../dbh.inc.php';  

                                                $statement = "SELECT plate_number FROM tb_maintenance WHERE mtnID = '$ID'";
                                                $dt = mysqli_query($conn, $statement);
                                                
                                                while ($result = mysqli_fetch_array($dt)){
                                                    echo $result['plate_number'];
                                                }
                                                    
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date Issued:</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <?php  

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
                                        <div class="table-responsive">
                                            <button type="button" name="submit" class="vc-edit-form" style="width:325px">Edit Record</button>
                                            <button type="button" name="delete" class="del-form" style="width: 300px; background-color: #0f1236">Delete Record</button>
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
                                        <form action="vec_Issueinc.php" method="POST" novalidate="novalidate">

                                        <!-- QUERY TO GET ALL RELATED VALUES FROM DATABASE -->
                                        <?php
                                            require_once '../dbh.inc.php';
                                            $start = date('m/d/Y');
                                            $end = date('m/d/Y');
                                            $statement = "SELECT * FROM tb_maintenance WHERE mtnID = '$ID'";
                                            $dt = mysqli_query($conn, $statement);

                                            while ($result = mysqli_fetch_array($dt)){
                                                $DI = $result['date_issued'];
                                                $DF = $result['date_fixed'];
                                                $pNum = $result['plate_number'];
                                                $descript = $result['description'];
                                                $reason = $result['reason'];
                                                $mCost = $result['maintenance_cost'];
                                                $dateIssued = date("F d, Y", strtotime($DI));

                                                if(strtotime($DF > 0)){
                                                    $dateFixed = date("F d, Y", strtotime($DF));
                                                }
                                                else{
                                                    $dateFixed = "No fixed date yet";
                                                }
                                            }

                                        ?>
                                        
                                        <!-- EDIT MAINTENANCE REPORT POP OUT FORM -->
                                        <div class="row">
                                            <div class="col-md-12 text-center"></br>
                                                <h2 class="vceform-title">Edit Maintenance Report Details</h2>

                                                <h4 class="deductions_table deduction_details" style="text-align: center; font-weight: bold;">Maintenance Report ID: <?php echo $ID?></h4>
                                                <form action="vec_Issueinc.php" method="POST" novalidate="novalidate">
                                                <!-- DEDUCTIONS TABLE -->
                                                <table class="deductions_table deduction_details">
                                                    <thead>
                                                        <tr><th class="border-top-0" style="width:350px; margin-left: -25px">Date Issued</th>
                                                        <th class="border-top-0">
                                                            <input placeholder="<?php echo $dateIssued ?>" class="deduction_details datepicker" type="text" 
                                                                onfocus="(this.type='date')" onblur="(this.type='text')"
                                                                id="vec_iDate" name="vec_iDate" />
                                                            </th></tr>
                                                    </thead>
                                                    <thead>
                                                        <tr><th class="border-top-0">Date Fixed</th>
                                                        <th class="border-top-0">
                                                            <input placeholder="<?php echo $dateFixed?>" class="deduction_details text" type="text" 
                                                                onfocus="(this.type='date')" onblur="(this.type='text')"
                                                                id="vec_Fdate" name="vec_Fdate" />
                                                        </th></tr>
                                                    </thead>
                                                </table>
                                                <table class="deductions_table deduction_details">
                                                    <thead>
                                                        <tr><th class="border-top-0">Addtional Description</th></tr>
                                                    </thead>
                                                    <tr><td class=" shadow-none p-0 border-0 form-control" style="height: 100px">
                                                        <input type="text" class="deduction_details" 
                                                                rows="5" class="deduction_details" 
                                                                style="resize: none; height: 75px; width: 550px;" 
                                                                name="vec_details" id="vec_details">
                                                    </td></tr>
                                                </table>
                                                <table class="deductions_table deduction_details">
                                                    <thead>
                                                        <tr><th class="border-top-0" style="width:350px;">Reason of Report</th>
                                                        <th class="border-top-0">
                                                            <select class="deductions_table deduction_details" style="width:350px; margin-left:-25px" name="vec_reason" id="vec_reason">
                                                                <option class="e_select" name="reason" id="reason" value="reason" selected="true" disabled="disabled"></option>
                                                                <option class="e_select" value="Maintenance">Scheduled Maintenance</option>
                                                                <option class="e_select" id="def_part" value="Defective Part/s">Defective Part/s Found</option>
                                                            </select>
                                                        </th></tr>
                                                        
                                                    </thead>
                                                    <thead>
                                                        <tr><th class="border-top-0" style="width:350px;">Maintenance Cost</th>
                                                        <th><input type="text" class="deduction_details" name="vecMC" id="vecMC" style="width:350px; margin-left: -25px" placeholder="Amount"></th></tr>
                                                    </thead>
                                                </table>
                                                <button class="vcesend-form" type='submit' name='esubmit'>Submit Form</button>
                                                <!-- ========================== -->
                                                </form>
                                            </div>
                                        </div>
                                        
                                            <div class="form-check">
                                                <label></label>
                                            </div>
                                            <!-- <input type="submit" name="submit" class="btn send-form" value="Confirm"> -->
                                        </form>
                                    </div>
                                </div>
                        <!-- Delete Salary Details -->
                        <div class="delform-popup">
                            <div class="container delform-wrapper">
                                <button class="btn delclose-form">Close</button>
                                <form action="vec_issue_del_inc.php" method="POST" novalidate="novalidate">

                            <div class="row">
                                <div class="col-md-12 text-center"></br>
                                    <h2 class="form-title">Proceed to delete this record?</h2>
                                </div>
                            </div>

                            <button type="submit" name="delete" class="del-form del_btnPlace">Yes</button>
                            <button type="button" id="noBtn" class="del-form del_btnPlace" >No</button> 
                            
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script> 
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- DATE RANGE PICKER JAVASCRIPT IMPORTS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" ></script>
    <!-- For Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!-- Timepicker JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- CSS For Date Range Picker and Datepicker-->   

    <!-- EDIT POP OUT -->
    <script>

        // FUNCTION FOR DELETE POP OUT //
        $(document).ready(function() {
            $('.vc-edit-form').click(function() {
                $('.vceform-popup').show();
            });
            $('.vceclose-form').click(function() {
                $('.vceform-popup').hide();
                location.reload();   
            });
        });
        
        // FUNCTION FOR DELETE POP OUT //
        $(document).ready(function() {
            $('.del-form').click(function() {
                $('.delform-popup').show();
            });
            $('.delclose-form').click(function() {
                $('.delform-popup').hide();
            });

            $('#noBtn').click(function() {
                $('.delform-popup').hide();
    
            });
        });

        //  FUNCTION FOR DATE PICKER
        $(document).ready(function(){
            var dateIssued;
            $( function() {
                $( ".datepicker" ).each(function(){//DATEPICKER
                        $('#vec_iDate').datepicker({
                            
                            dateFormat: 'yy-mm-dd',
                            onClose: function () {
                                $("#vec_Fdate").datepicker(
                                    "change", {
                                    minDate: new Date($('#vec_iDate').val())
                                });
                            }
                        });
                        $('#vec_Fdate').datepicker({
                            dateFormat: 'yy-mm-dd',
                            onClose: function () {
                                $("#vec_iDate").datepicker(
                                    "change", {
                                    maxDate: new Date($('#vec_iDate').val())
                                });
                            }
                    
                        })

                    });
            });
        });

        // FUNCTION FOR CHECKING INPUT TYPE FOR MAINTENANCE COST
        $('#vecMC').change(function(){
                var x = $('#vecMC').val();
                if(!$.isNumeric(x)){
                    alert("Input should be of integer value.");
                }
                else
                    $('#vecMC').val(x);
            })
    </script>
</body>

</html>