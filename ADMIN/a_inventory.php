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
    <title>Inventory - Majetsco</title>
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
    <link rel="stylesheet" href="css/steven_style.css">
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
                        <h3 class="page-title">Inventory Tables</h3>
                    </div>
                    <button class="btn-add-supply btn open-form">Add New Supplies/Spare Part</button>
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
                            <h3 class="box-title">Vehicles List</h3> <br>

                            <div class="table-responsive">
                                <table class="table text-nowrap schedule-table" >
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Plate Number:</th>
                                            <th class="border-top-0">Date Acquired:</th>
                                            <th class="border-top-0">Status:</th>
                                            <th class="border-top-0">Scheduled Maintenance:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- SAMPLE DATA ONLY -->
                                        <tr>
                                            <td class="border-top-0">123AB</td>
                                            <td class="border-top-0">September 12, 2020</td>
                                            <td class="border-top-0">On-route</td>
                                            <td class="border-top-0">October 6, 2022</td>
                                        </tr>
                                        <!-- END OF SAMPLE DATA -->
                                    <!-- <?php
                                        // require_once '../dbh.inc.php';  
                                        // $statement = "SELECT att.emp_id, emp.emp_type, emp.emp_surname, emp.emp_firstname , att.time_in, att.time_out, att.attendance_date
                                        // FROM `tb_attendance_sheet` as att
                                        // INNER JOIN `tb_employee` as emp WHERE att.emp_id = emp.emp_id AND emp.emp_type='pao';";
                                        // $dt = mysqli_query($conn, $statement);
                                        // while ($result = mysqli_fetch_array($dt)){
                                        //     $result = "<tr><td>"  . $result['attendance_date'] . "</td>" .
                                        //     "<td>"  . $result['emp_id'] . "</td>" .
                                        //     "<td>"  . $result['emp_surname'] . "</td>" .
                                        //     "<td>"  . $result['emp_firstname'] . "</td>" .
                                        //     "<td>"  . $result['time_in'] . "</td>" .
                                        //     "<td>"  . $result['time_out'] . "</td></tr>";
                                        //     echo $result;
                                        // }
                                    ?> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Supplies/Spare Parts List</h3> <br>

                        <div class="table-responsive">
                            <table class="table text-nowrap schedule-table">
                                <thead>
                                    <tr>
                                        <th class="table-align">Supply:</th>
                                        <th class="border-top-0">Supplies Description:</th>
                                        <th class="border-top-0">Stocks Available:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td class="border-top-0"><img src="../employee/employee_profiles/DR-00001/DR-00001.png" class="schedule-emp-img" alt="image"></td>
                                    <td class="border-top-0"><br>Testing 1</td>
                                    <td class="border-top-0"><br>150</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="page-breadcrumb bg-white">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Inventory Settings</h4>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-12"><br>
                    <div class="card">
                        <form class="white-box">
                            <h4 class="box-title">Update Vehicles List:</h4> <br>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Select Plate Number<br>
                                    <div class="table-responsive">
                                        <select class="form-select shadow-none p-0 border-0 form-control">
                                            <option>Test1</option>
                                            <option>Test2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Update Date Acquired:<br>
                                    <div class="table-responsive">
                                        <select class="form-select shadow-none p-0 border-0 form-control">
                                            <option>Test1</option>
                                            <option>Test2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Update Status:<br>
                                    <div class="table-responsive">
                                        <select class="form-select shadow-none p-0 border-0 form-control">
                                            <option>Test1</option>
                                            <option>Test2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Schedule Maintenance:<br>
                                    <div class="table-responsive">
                                        <select class="form-select shadow-none p-0 border-0 form-control">
                                            <option>Test1</option>
                                            <option>Test2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success" style="color:white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 col-xlg-9 col-md-12"><br>
                    <div class="card">
                        <form class="white-box">
                            <h4 class="box-title">Update Supplies/Spare Parts List:</h4> <br>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Select Supplies Description:<br>
                                    <div class="table-responsive">
                                        <select class="form-select shadow-none p-0 border-0 form-control">
                                            <option>Test1</option>
                                            <option>Test2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Update Stocks Available:<br>
                                    <div class="table-responsive">
                                        <select class="form-select shadow-none p-0 border-0 form-control">
                                            <option>Test1</option>
                                            <option>Test2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success" style="color:white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 col-xlg-9 col-md-12"><br>
                    <div class="card">
                        <form class="white-box">
                            <h4 class="box-title">Add New Supplies:</h4> <br>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Supplies Name:<br>
                                    <div class="table-responsive">
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter name..."
                                                class="form-control p-0 border-0"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">Stocks Available:<br>
                                    <div class="table-responsive">
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="123 456 7890"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success" style="color:white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            <divclass="container-fluid">
            </div>     

             </div>
                <div class="col-lg-8 col-xlg-9 col-md-12">
                    <div class="card">
                            <div class="white-box">              
                            </div>
                    </div>
                </div>
            
            <div class="form-popup">
                    <div class="container form-wrapper">
                        <button class="btn close-form">Close</button>
                        <form action="inc.insert_employee.php" method="POST" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="form-title">Add new Employee</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name">First Name</label>
                                    <input type="text" class="form-control" id="name" name="emp-firstName" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name">Surname</label>
                                    <input type="text" class="form-control" id="emp-surname" name="emp-surname" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="name">Employee Type</label>
                                    <select name="emp-type" id="emp-type" style="width: 100%;font-size:14px;border-color: gray;" required>
                                        <option value="Driver">Driver</option>
                                        <option value="PAO">Public Assistance Officer</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="name">Date of Birth</label>
                                    <input type="text" class="form-control" id="birthdate" name="birthdate" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Contact Number</label>
                                    <input type="text" class="form-control" id="email" name="email" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="something">Address</label>
                                    <textarea name="something" class="form-control" id=""></textarea>
                                </div>
                            </div>
                            <div class="form-check">
                                <label>
                                </label>
                            </div>
                            <input type="submit" class="btn send-form" value="Add Employee">
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

        // DATEPICKER
          $(function() {
            $('input[name="birthdate"]').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-dd-mm'
            });
            // $('input[name="date-fixed"]').datepicker({
            //     dateFormat: 'yy-dd-mm'
            // });

        });

        $(document).ready(function() {
        // FUNCTION FOR FORM
        $('.open-form').click(function() {
            $('.form-popup').show();
        });
        $('.close-form').click(function() {
            $('.form-popup').hide();
   
        });

        $(document).mouseup(function(e) {
            var container = $(".form-wrapper");
            var form = $(".form-popup");

            // if (!container.is(e.target) && container.has(e.target).length === 0) {
            //     form.hide();
            // }
        });


        });
    </script>

</body>

</html>