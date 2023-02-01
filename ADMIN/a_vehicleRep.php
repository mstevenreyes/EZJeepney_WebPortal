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
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- EZ Jeepney Custom Styles-->
    <link rel="stylesheet" href="css/steven_style.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                                            $statement = "SELECT * FROM tb_maintenance ORDER BY date_issued ASC";
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
                                            <th class="border-top-0">Maintenance ID</th>
                                            <th class="border-top-0">Vehicle Plate Number</th>
                                            <th class="border-top-0">Upcoming Maintenance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT plateNum, MAX(mtnID) as mtnID, sched FROM tb_maintenancesched GROUP by plateNum;";

                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){

                                                $result = "<tr><td>"  . $result['mtnID'] . "</td>" . 
                                                "<td>"  . $result['plateNum'] . "</td>" .
                                                "<td>" . date("F d, Y", strtotime($result['sched'])) . "</td>";
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
                                        // require_once '../dbh.inc.php';  
                                        // $statement = "SELECT maintenance_cost FROM tb_maintenance;";
                                        // $dt = mysqli_query($conn, $statement);
                                       
                                        // while ($result = mysqli_fetch_array($dt)){
                                        //     $submitbtn = ['generate-payroll'];
                                        //     $DI = $result['date_issued'];
                                        //     $DF = $result['date_fixed'];
                                        //     $dateIssued = date("F d, Y", strtotime($DI));
                                        //     $maintenance_cost += $result['maintenance_cost']; 
                                        
                                        // if(isset($submitbtn)){
                                        //     if(strtotime($result['date_issued']) > 0 && strtotime($result['date_fixed']) > 0){
                                        //         $maintenance_cost += $result['maintenance_cost']; 
                                        // }
                                        // }

                                        
                                        // }
                                    ?>
                                <li class="ms-auto"><span class="counter text-danger" id ="maintenance_cost">₱ <input type="text" style = "width: 145px; height: 23px;" readonly></span></li>
                                <?php
                                    

                                ?>
                                </ul>
                                <div class="col-sm-12 border-bottom">
                                <thead>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">Start Date<br>
                                        <div class="col-sm-12 border-bottom">
                                            <input class="datepicker" type="text" name="StartDate" id="StartDate" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()' required> 
                                            <noscript>
                                                <input type="submit" value="submit">
                                            </noscript>
                                        </div>
                                    </div>
                                </div>
                                </thead>
                                </div>
                                <div class="col-sm-12 border-bottom">
                                <thead>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">End Date<br>
                                        <div class="col-sm-12 border-bottom">
                                            <input class="text" type="text" name="EndDate" id="EndDate" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()'?>
                                                <noscript>
                                                    <input type="submit" value="submit">
                                                </noscript>
                                        </div>
                                    </div>
                                </div>
                                </thead>
                                </div>
                                <button type="button" class="btn send-form" id="generate-total-expense" name="generate-total-expense">Generate</button>
                            </div>
                        </div>
                </div>
                <div class="col-sm-12">
                    <div class="white-box"> 
                        <div class="form-group mb-4">

                        <div class="form-group mb-4">
                            <div class="col-sm-12">Date Issued<br>
                                <div class="col-sm-12 border-bottom">
                                    <input class="datepicker" type="text" name="DateIssued" id="DateIssued" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()' required> 
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
                                    <input class="text" type="text" name="DateFixed" id="DateFixed" value="" value="<?= date('Y-m-d'); ?>" oninput='chooseDate.submit()'?>
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
    <script script type="text/javascript" language="javascript">
       
        // $('#DateFixed').on('propertychange input', function (e) {
        //     console.log("working");
        //     console.log($(this).val());
        // });
        $(document).ready(function(){
            var dateIssued;
            $( function() {
                $( ".datepicker" ).each(function(){//DATEPICKER
                        $('#DateIssued').datepicker({
                            
                            dateFormat: 'yy-mm-dd',
                            onClose: function () {
                                $("#DateFixed").datepicker(
                                    "change", {
                                    minDate: new Date($('#DateIssued').val())
                                });
                            }
                        });
                        $('#DateFixed').datepicker({
                            dateFormat: 'yy-mm-dd',
                            onClose: function () {
                                $("#DateIssued").datepicker(
                                    "change", {
                                    maxDate: new Date($('#DateIssued').val())
                                });
                            }
                    
                        })

                    });
            });
         
            $('#DateIssued').on('input', function() {
                dateIssued = $(this).val();
                console.log($(this).val());
                console.log('working');
            });
        
            let dateFixed = document.querySelector('#DateFixed');
            dateFixed.addEventListener('input', () => {
                console.log(dateFixed.value);
            });
            
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
        })
       
        $(document).ready(function(){
            var startDate;
            $( function() {
                $( ".datepicker" ).each(function(){//DATEPICKER
                        $('#StartDate').datepicker({
                            
                            dateFormat: 'yy-mm-dd',
                            onClose: function () {
                                $("#EndDate").datepicker(
                                    "change", {
                                    minDate: new Date($('#StartDate').val())
                                });
                            }
                        });
                        $('#EndDate').datepicker({
                            dateFormat: 'yy-mm-dd',
                            onClose: function () {
                                $("#StartDate").datepicker(
                                    "change", {
                                    maxDate: new Date($('#StartDate').val())
                                });
                            }
                    
                        })

                    });
            });
         
            $('#StartDate').on('input', function() {
                startDate = $(this).val();
                console.log($(this).val());
                console.log('working');
            });
        
            let dateFixed = document.querySelector('#EndDate');
            dateFixed.addEventListener('input', () => {
                console.log(dateFixed.value);
            });
            
            function valiDate(){
                var startDate = document.getElementById("StartDate").value;
                var endDate = document.getElementById("EndDate").value;
                var mCost = document.getElementById("MaintenanceCost").value;
                submitOk = 0;

                if(startDate >= endDate || (mCost < 0 || isNaN(mCost))){

                    if(startDate >= endDate && endDate != NULL){
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

            $("#generate-total-expense").click(function(){
                var startDate = $("#StartDate").val();
                var endDate = $("#EndDate").val();
                // AJAX Request to generate/insert data to maintenance expense
                $.ajax({
                    type: "POST",
                    url: "ajax/vehiclereport.php",
                    data: "command=generate-total-expense&StartDate=" + startDate + "&EndDate=" + endDate 
                }).done(function(result){
                    // function to do after executing AJAX request
                    $('#maintenance_cost').text(result);

                    alert("Maintenance Expense updated.");
                    // alert(result);

                }); 
            });
            
        });
        

        
            
    </script>
</body>

</html>