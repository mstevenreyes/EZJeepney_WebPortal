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
    <title>Ez Jeepney - Payroll Report</title>
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
    <link href="css/steven_style.css" rel="stylesheet">
    
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
                        <h4 class="page-title">Salary Reports - Majetsco</h4>            
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
                            <div style="text-align:center">
                                <h3 class="box-title">PAYSLIP FOR THE WEEK OF [INSERT MONTH HERE]</h3>
                                <!-- <button class="btn-add-driver btn open-form" style="margin-left: auto;bottom: 50px;">Add Schedule</button> -->
                            </div>
                            <div class="payslip-details">
                                <div class="company-details" style="text-align:center">
                                    <h3 class="box-title">Majetsco Cooperative</h3>
                                    <img src="images/majetsco-logo.png" alt="" style="width: 100px;">
                                    <h4  class="box-title">29 Gov. Pascual Ave</h4 >
                                    <h4 class="box-title">Malabon, 1470 Metro Manila</h4 >
                                </div>
                                <div class="employee-details">
                                    <?php
                                    require_once '../dbh.inc.php';
                                    
                                    $salary = $_GET['salary-id'];

                                        // Making SAL-ID global
                                        $_SESSION['salary-id'] = $salary;

                                    $stmt = "SELECT * FROM tb_salary_report AS tbs LEFT JOIN tb_employee AS tbe 
                                                ON  tbs.emp_id = tbe.emp_id  WHERE tbs.salary_id = '$salary'";
                                    $sr = mysqli_query($conn, $stmt);
                                    

                                    while ($result = mysqli_fetch_array($sr))
                                    {
                                        echo "<p>" . $result['emp_firstname'] . " " . $result['emp_surname'] . "</p>";
                                        echo "<p>" . $salary . "</p>" . "<p>" . $result['emp_type'] . "</p>";
                                    ?>
                            
                                </div>
                                <div class="salary-details">
                                    <div class="earning-details">
                                        <h3>Earnings</h3>
                                        <div class="earning-details-child">
                                            <p>Days Worked</p>
                                            <p class="amount" ><?php echo $result['days_worked']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Daily Wage</p>
                                            <p class="amount" name="bSalary"><?php echo $result['basic_salary']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Gross Pay</p>
                                            <p class="amount"><?php echo $result['grosspay']; ?></p>
                                        </div>
                                        <div class="earning-details-child">
                                            <p>Total Deductions: </p>
                                            <p class="amount"><?php echo -$result['grosspay']; ?></p>
                                        </div>
                                        <div class="earning-details-child" style="font-weight: bold;">
                                            <p>Net Pay</p>
                                            <p class="amount"><?php echo $result['netpay']; ?></p>
                                        </div>
                                    </div>
                                    <div class="deduction-details">
                                        <h3>Deductions</h3>
                                            <div class="earning-details-child">
                                                <p>Pag-ibig</p>
                                                <p class="amount"><?php echo $result['pagibig']; ?></p>
                                            </div>
                                            <div class="earning-details-child">
                                                <p>Philhealth</p>
                                                <p class="amount"><?php echo $result['philhealth']; ?></p>
                                            </div>
                                            <div class="earning-details-child">
                                                <p>SSS</p>
                                                <p class="amount"><?php echo $result['sss']; ?></p>
                                            </div>
                                            <div class="earning-details-child">
                                                <p>Canteen Fees</p>
                                                <p class="amount" name="cFees"><?php echo $result['canteen_fees']; ?></p>
                                            </div>

                                        <?php
                                            $pagibig = $result['pagibig'];
                                            $philhealth = $result['philhealth'];
                                            $sss = $result['sss'];
                                            $cFees = $result['canteen_fees'];
                                            }

                                            $stmt2 = "SELECT tbd.deductions, tbd.d_amount FROM tb_salary_report AS tbs JOIN tb_deductions AS tbd 
                                                ON tbd.sal_id = tbs.salary_id WHERE tbs.salary_id = '$salary'";
                                    
                                            $mysql = mysqli_query($conn, $stmt2);

                                            while ($fetch = mysqli_fetch_array($mysql)){
                                        ?>

                                            <div class="earning-details-child" name="Dname">
                                                <p><?php echo $fetch['deductions']; ?></p>
                                                <p class="amount" name="deduct"><?php echo $fetch['d_amount']; ?></p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="table-responsive">
                                <button type="submit" name="submit" class="btn edit-form" style="width: 300px; background-color: #0f1236">EDIT SALARY DETAILS</button>
                                <button type="submit" name="delete" class="btn del-form" style="width: 300px; background-color: #0f1236">DELETE SALARY REPORT</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edit Salary Details -->
                    <div class="eform-popup">
                        <div class="container eform-wrapper">
                            <button class="btn eclose-form">Close</button>
                            <form action="a_salary_report_edit_inc.php" method="POST" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h1 class="eform-title">Edit Employee Salary</h1>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="eform-group edit_empSal">
                                        <label for="name">Edit Days Worked:</label>
                                        <input type="text" class="eform-control edit_textField" id="edit_bSalary" name="editDays" style="width: 426px" required>
                                </div>
                                <div class="eform-group edit_empSal">
                                        <label for="name">Edit Daily Wage:</label>
                                        <input type="text" class="eform-control edit_textField" id="edit_bSalary" name="edit_dWage" style="width: 439px" required>
                                    </div>
                                    
                                    <!-- DEDUCTIONS TABLE -->
                                    <table class="deductions_table deduction_details">
                                        <thead>
                                            <tr><th class="border-top-0" style="padding-left: 50px">Deductions</th>
                                            <th class="border-top-0">Amount</th>
                                        </thead>
                                    <?php
                                        $stmt2 = "SELECT tbd.deductions, tbd.d_amount FROM tb_salary_report AS tbs JOIN tb_deductions AS tbd 
                                            ON tbd.sal_id = tbs.salary_id WHERE tbs.salary_id = '$salary'";
                                
                                        $mysql = mysqli_query($conn, $stmt2);
                                    
                                    ?>
                                        <tr><td class="deduction_details" style="padding-left: 46px">Pag-ibig</td>
                                        <td><input type="text" class="deduction_details" id="pgbg"
                                            name="pagibig" placeholder="<?php echo $pagibig?>"></td></tr>
                                        <tr><td class="deduction_details" style="padding-left: 46px">Philhealth</td>
                                        <td><input type="text" class="deduction_details" id="philhealth" value="<?php $philhealth?>"
                                            name="phealth" placeholder="<?php echo $philhealth?>"></td></tr>
                                        <tr><td class="deduction_details" style="padding-left: 46px">SSS</td>
                                        <td><input type="text" class="deduction_details" id="sss" value="<?php $sss?>"
                                            name="sss" placeholder="<?php echo $sss?>"></td></tr>
                                        <tr><td class="deduction_details" style="padding-left: 46px">Canteen Fees</td>
                                        <td><input type="text" class="deduction_details" id="cfees" value="<?php $cFees?>"
                                        name="cfees" placeholder="<?php echo $cFees?>"></td></tr>
                                    </table>

                                    <!-- TABLE FOR tb_deductions -->
                                    <table class="deductions_table deduction_details">

                                        <thead>
                                            <tr><th class="border-top-0">Deduction to Edit</th>
                                            <th class="border-top-0" style="padding-right: 30px">Amount</th></tr>
                                        </thead>

                                        <td><select name="deduction_name" class="deduction_details d_input" value="" style="width:175px">
                                            <option class="deduction_details d_input" value="" selected="true" disabled="disabled">Select Deduction:</option>
                                                <?php
                                                    while ($fetch = mysqli_fetch_array($mysql)){
                                                        unset($dName);
                                                        $dName = $fetch['deductions'];
                                                        $fetch = "<option class=e_eselect value='$dName'>" . $fetch['deductions'] . "</option>";
                                                        echo $fetch;
                                                    }
                                                ?>
                                        <td style="padding-right: 29px"><input type="text" class="deduction_details dd_input" value="" name="edit_deduct" placeholder="Place Amount"></td></tr>

                                        <thead>
                                            <tr><th class="border-top-0">Deduction to Edit</th>
                                            <th class="border-top-0" style="padding-right: 30px">New Deduction</th></tr>
                                        </thead>

                                        <td><select name="deduction_name" class="deduction_details d_input" value="" style="width:175px">
                                            <option class="deduction_details d_input" value="" selected="true" disabled="disabled">Select Deduction:</option>
                                                <?php

                                                    // DUPLICATED QUERY TO RUN
                                                    $stmt2 = "SELECT tbd.deductions, tbd.d_amount FROM tb_salary_report AS tbs JOIN tb_deductions AS tbd 
                                                    ON tbd.sal_id = tbs.salary_id WHERE tbs.salary_id = '$salary'";
                                    
                                                    $mysql = mysqli_query($conn, $stmt2);
                                                    
                                                    while ($row = mysqli_fetch_array($mysql)){
                                                        unset($dName2);
                                                        $dName2 = $row['deductions'];
                                                        $row = "<option class=e_eselect value='$dName2'>" . $row['deductions'] . "</option>";
                                                        echo $row;
                                                    }
                                                ?>
                                        <td style="padding-right: 29px"><input type="text" class="deduction_details dd_input" value="" name="edit_deduct" placeholder="Type new name"></td></tr>
                                        
                                        <thead>
                                            <tr><th class="border-top-0">Deduction to Delete</th>


                                        <th><select name="deduction_name" class="deduction_details d_input" value="" style="width:175px; margin-right: 35px;">
                                            <option class="deduction_details d_input" value="" selected="true" disabled="disabled">Select Deduction:</option>
                                                <?php

                                                    // DUPLICATED QUERY TO RUN
                                                    $stmt2 = "SELECT tbd.deductions, tbd.d_amount FROM tb_salary_report AS tbs JOIN tb_deductions AS tbd 
                                                    ON tbd.sal_id = tbs.salary_id WHERE tbs.salary_id = '$salary'";
                                    
                                                    $mysql = mysqli_query($conn, $stmt2);
                                                    
                                                    while ($row = mysqli_fetch_array($mysql)){
                                                        unset($dName2);
                                                        $dName2 = $row['deductions'];
                                                        $row = "<option class=e_eselect value='$dName2'>" . $row['deductions'] . "</option>";
                                                        echo $row;
                                                    }
                                                ?></th>
                                        </thead>
                                    </table>

                                </div>

                                <div class="form-check">
                                    <label></label>
                                </div>

                                <input type="submit" name="submit" class="btn send-form" value="Confirm" style = "margin-left: 39%">

                            </form>

                        </div>

                    </div>

                     <!-- Delete Salary Details -->
                    <div class="delform-popup">
                        <div class="container delform-wrapper">
                            <button class="btn delclose-form">Close</button>
                            <form action="" method="POST" novalidate="novalidate">

                            <div class="row">
                                <div class="col-md-12 text-center"></br>
                                    <h2 class="form-title">Proceed to delete this record?</h2>
                                </div>
                            </div>

                            <button type="submit" name="" class="del-form del_btnPlace">Yes</button>
                            <button type="submit" name="" class="del-form del_btnPlace">No</button> 
                            
                                <div class="form-check">
                                    <label></label>
                                </div>
                                <!-- <input type="submit" name="submit" class="btn send-form" value="Confirm"> -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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
    <!-- EDIT SALARY BTN & DELETE SALARY BTN -->
    <script>

        // FUNCTION FOR EDIT POP OUT //
        $(document).ready(function() {
            $('.edit-form').click(function() {
                $('.eform-popup').show();
            });
            $('.eclose-form').click(function() {
                $('.eform-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var container = $(".eform-wrapper");
                var form = $(".eform-popup");

                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    form.hide();
                }
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

            $(document).mouseup(function(e) {
                var econtainer = $(".delform-wrapper");
                var eform = $(".delform-popup");

                if (!econtainer.is(e.target) && econtainer.has(e.target).length === 0) {
                    delform.hide();
                }
            });
        });

        // FUNCTION FOR EDIT SALARY DETAILS //

        $(document).ready(function() {

            $('#pgbg').change(function(){          
                var x = $('#pgbg').val();
                $('#pgbg').val(x);
            });

            $('#philhealth').change(function(){
                var x = $('#philhealth').val();
                $('#philhealth').val(x);
            })

            $('#sss').change(function(){
                var x = $('#sss').val();
                $('#sss').val(x);
            })

            $('#cfees').change(function(){
                var x = $('#cfees').val();
                $('#cfees').val(x);
            })

            $('.d_input').change(function(){

            })

            // $("#pgbg").click(function(x){
            //     var x = document.getElementByID("pgbg");
            //     var oldValue = x.oldValue;
            //     var newValue = x.value;

            //     if(oldValue == newValue){
            //         alert("The value of pag-ibig hasn't changed.");
            //     }
            //     else{
            //         alert("The old value was: " + oldValue + "\n" + "New value is: " + );
            //     }
            // });
        });



    </script>
</body>

</html>