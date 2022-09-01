<?php
    include('sidebar.php');
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
                        <h4 class="page-title">Vehicle Maintenance Report</h4>
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
                            <h3 class="box-title">Maintenance Report</h3> <br>

                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Date Issued</th>
                                            <th class="border-top-0">Plate Number</th>
                                            <th class="border-top-0">Defective Part(s)</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Date Fixed</th>
                                            <th class="border-top-0">Maintenance Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT * FROM tb_maintenance";
                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){
                                                $result = "<tr><td>"  . $result['date_issued'] . "</td>" .
                                                "<td>"  . $result['plate_number'] . "</td>" .
                                                "<td>"  . $result['defective_part'] . "</td>" .
                                                "<td>"  . $result['description'] . "</td>" .
                                                "<td>"  . $result['date_fixed'] . "</td>" .
                                                "<td>"  . $result['maintenance_cost'] . "</td></tr>";
                                                echo $result;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="col-lg-4 col-md-12">
                            <div class="white-box analytics-info">
                                <h3 class="box-title">Total Maintenance Expense</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li class="ms-auto"><span class="counter text-danger">₱<?php
                                        require_once '../dbh.inc.php';  
                                        $statement = "SELECT maintenance_cost FROM tb_maintenance;";
                                        $dt = mysqli_query($conn, $statement);
                                        $maintenance_cost = 0;
                                        while ($result = mysqli_fetch_array($dt)){
                                            $maintenance_cost += $result['maintenance_cost']; 
                                        }
                                        echo $maintenance_cost;
                                ?></span></li>
                                </ul>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="white-box"> 
                            <form id="maintenance-form" action="vehicle_report.inc.php" method="POST">
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">Date Issued<br>
                                        <div class="col-sm-12 border-bottom">
                                            <input class="shadow-none p-0 border-0 form-control" type="text" name="date-issued" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">Plate Number<br>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control" name="plate-number" required>
                                                <?php
                                                    require_once '../dbh.inc.php';
                                                    $statement = "SELECT plate_number from tb_jeepney;";
                                                    $dt = mysqli_query($conn, $statement);
                                                    while ($result = mysqli_fetch_array($dt)){
                                                        $result = "<option value='"  . $result['plate_number'] . "'>" . $result['plate_number'] . "</option>";
                                                        echo $result; 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12" >Defective Part<br>
                                        <div class="col-sm-12 border-bottom">
                                            <input class=" shadow-none p-0 border-0 form-control" name="defective-part" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">Reason for Maintenance<br>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea rows="5" class="form-control p-0 border-0"  name="description" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">Date Fixed<br>
                                        <div class="col-sm-12 border-bottom">
                                            <input class="shadow-none p-0 border-0 form-control" type="text" name="date-fixed" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">Maintenance Cost<br>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control p-0 border-0"  name="maintenance-cost" required> 
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-success" style="color: white " type="submit" value="Submit Report">
                            
                            </div>
                        </form>
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
    <!-- Custom Javascript for datepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $('input[name="date-issued"]').datepicker({
                dateFormat: 'yy-dd-mm'
            });
            $('input[name="date-fixed"]').datepicker({
                dateFormat: 'yy-dd-mm'
            });

        });
</script>
</body>

</html>