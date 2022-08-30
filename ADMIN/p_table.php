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
                        <h4 class="page-title">PAO Attendance</h4>
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
                            <h3 class="box-title">Attendance Record</h3> <br>

                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Employee ID</th>
                                            <th class="border-top-0">First Name</th>
                                            <th class="border-top-0">Last Name</th>
                                            <th class="border-top-0">Time-In</th>
                                            <th class="border-top-0">Time-Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT att.emp_id, emp.emp_surname, emp.emp_firstname , att.time_in, att.time_out, att.attendance_date
                                        FROM `tb_attendance_sheet` as att
                                        INNER JOIN `tb_employee` as emp WHERE att.emp_id = emp.emp_id;";
                                        $dt = mysqli_query($conn, $statement);
                                        while ($result = mysqli_fetch_array($dt)){
                                            $result = "<tr><td>"  . $result['attendance_date'] . "</td>" .
                                            "<td>"  . $result['emp_id'] . "</td>" .
                                            "<td>"  . $result['emp_surname'] . "</td>" .
                                            "<td>"  . $result['emp_firstname'] . "</td>" .
                                            "<td>"  . $result['time_in'] . "</td>" .
                                            "<td>"  . $result['time_out'] . "</td></tr>";
                                            echo $result;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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