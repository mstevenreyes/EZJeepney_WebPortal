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
        $day = date('w');
        $week_start = strtoupper(date('M d', strtotime('-'.$day.' days')));
        $week_end = strtoupper(date('M d Y', strtotime('+'.(6-$day).' days')));
        $sql = "SELECT * FROM tb_salary_report AS tbs  LEFT JOIN tb_employee AS tbe ON tbs.emp_id = tbe.emp_id WHERE tbs.emp_id = '$empID'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $pag_ibig = $result['pagibig'];
        $philhealth = $result['philhealth'];
        $sss = $result['sss'];
    ?>

<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        <main>
        <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div style="text-align:center">
                                <h3 class="box-title">PAYSLIP FOR THE WEEK OF  <?php echo $week_start . ' - ' . $week_end ?></h3>
                            </div>
                            <div class="payslip-details">
                                <div class="company-details">
                                    <h3>Majetsco Cooperative</h3>
                                    <img src="images/majetsco-logo.png" alt="" style="width: 80px;">
                                    <p>29 Gov. Pascual Ave</p>
                                    <p>Malabon, 1470 Metro Manila</p>
                                
                                </div>
                                <div class="employee-details">
                                    <p><?php echo $result['salary_id'] ?></p>
                                    <p><?php echo $result['emp_firstname'] . " " . $result['emp_surname'] ?></p>
                                    <p><?php echo $result['emp_id'] ?></p>
                                </div>
                                <div class="salary-details">
                                    <div class="earning-details">
                                        <h3>Earnings</h3>
                                        <div class="earning-details-child">
                                            <p>Basic Salary</p>
                                            <p class="amount">
                                                <?php 
                                                echo $result['basic_salary']; 
                                                ?>
                                            </p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Canteen Fees</p>
                                            <p class="amount"><?php echo $result['canteen_fees']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Gross Pay</p>
                                            <p class="amount"><?php echo $result['grosspay']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Total Earnings</p>
                                            <p class="amount"><?php echo $result['netpay'] ?></p>
                                        </div>
                                    </div>
                                    <div class="deduction-details">
                                        <h3>Deductions</h3>
                                        <div class="earning-details-child">
                                            <p>Pag-ibig</p>
                                            <p class="amount"><?php  echo $pag_ibig; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Philhealth</p>
                                            <p class="amount"><?php echo $philhealth; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>SSS</p>
                                            <p class="amount"><?php  echo $sss; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Total Earnings</p>
                                            <p class="amount">P5500</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    // }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
        </main>
    </body>
</html>
