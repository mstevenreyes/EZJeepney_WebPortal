<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="kane_style.css">

    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Salary Report - EZ Jeepney</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
</head>
<body>

    <!--header or navbar-->

     <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';
        // $day = date('w');
        // $week_start = strtoupper(date('M d', strtotime('-'.$day.' days')));
        // $week_end = strtoupper(date('M d Y', strtotime('+'.(6-$day).' days')));
        // $sql = "SELECT * FROM tb_salary_report AS tbs  LEFT JOIN tb_employee AS tbe ON tbs.emp_id = tbe.emp_id WHERE tbs.emp_id = '$empID'";
        // $query = mysqli_query($conn, $sql);
        // $result = mysqli_fetch_assoc($query);
        // $pag_ibig = $result['pagibig'];
        // $philhealth = $result['philhealth'];
        // $sss = $result['sss'];
    ?>

<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <main>
            <div class="container-fluid">
                <h1>Salary Report - Majetsco</h1>

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <div class="row white-box">

                    <div class="col-sm-12">
                        <div style="display:flex;justify-content:flex-end;">
                        
                        </div>
                            <div class="table-responsive center">
                                <table class="table text-nowrap" id="schedule-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Employee</th>
                                            <th class="border-top-0">Days Worked</th>
                                            <th class="border-top-0">Gross Pay</th>
                                            <th class="border-top-0">Total Deduction</th>
                                            <th class="border-top-0">Net Pay</th>
                                            <th class="border-top-0">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include '../dbh.inc.php';
                                            $sql = "SELECT * FROM tb_payroll_report WHERE emp_id = '$empID'";
                                            $query = mysqli_query($conn, $sql);
                                            while($result = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $result['salary_id'] ?></td>
                                            <td><?php echo $result['emp_id'] ?></td>
                                            <td><?php echo $result['days_worked'] ?></td>
                                            <td><?php echo $result['grosspay'] ?></td>
                                            <td><?php echo $result['deduction'] ?></td>
                                            <td><?php echo $result['netpay'] ?></td>
                                            <td>
                                                <button class="view-report"><i class="fa-solid fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ====================== VIEW PAYROLL POPUP==================== -->
            <div class="form-popup" id="view-payroll-popup">
                    <div class="container form-wrapper">
                        <button class="btn close-form" id="close-view-report"><i class="fa-solid fa-xmark"></i></button>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <div>
                                        
                                        <!-- <button class="btn-add-driver btn open-form" style="margin-left: auto;bottom: 50px;">Add Schedule</button> -->
                                    </div>
                                    <div class="payslip-details">
                                        <div class="company-details">
                                            <h4 class="box-title"><span id="view-date-range"></span></h4>
                                            <p class="box-title">Majetsco Cooperative</p>
                                            <img src="images/majetsco-logo.png" alt="" style="width: 80px;">
                                            <p class="box-title">29 Gov. Pascual Ave</p >
                                            <p class="box-title">Malabon, 1470 Metro Manila</p >
                                            <strong><p id="view-emp-id"></p></strong>
                                        </div>
                                        <div class="employee-details">
                                        
                                    
                                        </div>
                                        <div class="salary-details">
                                            <div class="earning-details">
                                                <h3>Earnings</h3>
                                                <div class="earning-details-child">
                                                    <p>Days Worked</p>
                                                    <p class="amount" id="view-days-worked"></p>
                                                </div>
                                                <div class="earning-details-child">
                                                    <p>Basic Pay</p>
                                                    <p class="amount" id="view-basic-pay"></p>
                                                </div>
                                                <div class="earning-details-child">
                                                    <p>Gross Pay</p>
                                                    <p class="amount" id="view-gross-pay"></p>
                                                </div>
                                       
                                            </div>
                                            <div class="deduction-details">
                                                <h3>Deductions</h3>
                                                    <div class="earning-details-child">
                                                        <p>Pag-ibig</p>
                                                        <p class="amount" id="view-pag-ibig"></p>
                                                    </div>
                                                    <div class="earning-details-child">
                                                        <p>Philhealth</p>
                                                        <p class="amount" id="view-philhealth"></p>
                                                    </div>
                                                    <div class="earning-details-child">
                                                        <p>SSS</p>
                                                        <p class="amount" id="view-sss"></p>
                                                    </div>
                                                    <div class="earning-details-child" style="font-weight: bold;">
                                                        <p>Net Pay</p>
                                                        <p class="amount" id="view-net-pay">₱ </p>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- ============================================================= -->
                 
        </main>
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
        <!-- Custom JS-->     
        <script src="https://kit.fontawesome.com/a398ec554b.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                var table = $('#schedule-table').DataTable({
                // ajax: data,
                "pageLength" : 25,
                scrollX: true,
                    columnDefs: [
                        { "width": "200px", targets: "_all" },
                        { "className": "salary-table", targets: "_all" } 
                    ]
                });
                var salId;
                $('.view-report').click(function(){
                    salId = $(this).closest('tr').find('td:nth-child(1)').text();
                    console.log(salId);
                    $('#view-payroll-popup').hide(100).fadeIn(300);
                    $.ajax({
                        type: "POST",
                        url: "ajax/emp_salary.php",
                        data: "command=get-payroll&salary-id=" + salId  
                    }).done(function(result) { 
                        var myJson = JSON.parse(result)     
                        console.log(result);      
                        var dateStart = new Date(myJson[0]['payroll_date_start']).toLocaleDateString('en-EN', {
                                                month: 'long',
                                                day: 'numeric'
                                            });   
                        var dateEnd = new Date(myJson[0]['payroll_date_end']).toLocaleDateString('en-EN', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });   
                        $('#view-days-worked').text(myJson[0]['days_worked']);
                        $('#view-basic-pay').text(myJson[0]['basic_pay']);
                        $('#view-gross-pay').text(myJson[0]['grosspay']);
                        $('#view-pag-ibig').text(myJson[0]['pagibig']);
                        $('#view-philhealth').text(myJson[0]['philhealth']);
                        $('#view-sss').text(myJson[0]['sss']);
                        $('#view-net-pay').text( "\u20B1" + myJson[0]['netpay']);
                        $('#view-emp-id').text(myJson[0]['emp_id'])
                        $('#view-date-range').text( dateStart + " - " + dateEnd);
                        console.log(myJson[0]['deduction']);
                    });
                });
                $('#close-view-report').click(function(){
                    $('#view-payroll-popup').show(100).fadeOut(300);
                });

            });
              
        </script>
    </body>
</html>
