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
    <title>Ez Jeepney - Inventory</title>
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
                                            <th class="border-top-0">Delete Record:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- GET VEHICLES LIST DATA FROM DB -->
                                        <?php
                                            require_once '../dbh.inc.php';  
                                            $statement = "SELECT plate_number, date_issued, date_fixed FROM tb_maintenance";
                                            $dt = mysqli_query($conn, $statement);
                                            while ($result = mysqli_fetch_array($dt)){

                                                // To check if date_acquired and date_issued is null, defuault is 1-11967 //
                                                $date_acquired = empty($result['date_acquired']) ? "" : date("F d, Y", strtotime($result['date_acquired']));
                                                $sched = empty($result['date_issued']) ? "" : date("F d, Y", strtotime($result['date_issued']));

                                                if(empty($result['date_issued']) && empty($result['date_fixed'])){
                                                    $status = "No Data";
                                                } 
                                                else if(empty($result['date_issued']) || empty($result['date_fixed'])){
                                                    $status = "Maintenance";
                                                }
                                                else{
                                                    $status = "Functioning";
                                                }

                                                $result = "<tr><td>"  . $result['plate_number'] . "</td>".
                                                "<td>"  . $date_acquired . "</td>" .
                                                "<td>"  . $status . "</td>" .
                                                "<td>"  . $sched . "</td>";
                                                // "<td>"  . $result['time_in'] . "</td>" .
                                                // "<td>"  . $result['time_out'] . "</td></tr>";
                                                echo $result;
                                            }
                                        ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="page-breadcrumb bg-white">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                    <h3 class="page-title">Supplies/Spare Parts List</h3>
                                </div>
                                <button class="btn-edit-supply btn edit-form" id="edit-inventory-form">EDIT INVENTORY DETAILS:</button>
                            </div>                     
                        <div class="table-responsive">
                            <table class="table text-nowrap schedule-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Item Name:</th>
                                        <th class="border-top-0">Stocks Available:</th>
                                        <th class="border-top-0">Delete Record:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- GET SUPPLIES/PARTS DATA FROM DB -->
                                    <?php
                                        $items = array();
                                        $counter = 0;

                                        require_once '../dbh.inc.php'; 
                                        $statement = "SELECT item, quantity FROM tb_inventory";
                                        $dt = mysqli_query($conn, $statement);

                                        while ($result = mysqli_fetch_array($dt))
                                        {
                                            ++$counter;
                                            $items[] = $result['item'];
                                            $result = "<tr><td>" . $result['item'] . "</td><td>"  . $result['quantity'] . "</td>";
                                            echo $result;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
            
            <!-- ADD NEW PARTS OR SUPPLIES -->
            <div class="form-popup" id="add-supplies">
                <div class="container form-wrapper">
                    <button class="btn close-form">Close</button>
                    <form action="a_inventory_inc.php" method="POST" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="form-title">Add New Spare Part/s</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name">Part/s to be Added:</label>
                                <input type="text" class="form-control" id="item" name="item" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name">Quantity:</label>
                                <input type="text" class="form-control" id="qty" name="quantity" required>
                            </div>
                        </div>
                        <div class="form-check">
                            <label></label>
                        </div>
                        <input type="submit" name="submit" class="btn send-form" value="Confirm">
                    </form>
                </div>
            </div>
             <!-- EDIT CURRENT INVENTORY -->
             <div class="eform-popup">
                <div class="container eform-wrapper">
                    <button class="btn eclose-form">Close</button>
                    <form action="a_inventory_edit.php" method="POST" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="eform-check">
                                    <label></label>
                                </div>
                                <h1 class="form-title">Edit Inventory Details:</h1>
                            </div>
                        </div>
                        <div class="row">
                        <div class="eform-check">
                            <label></label>
                        </div>

                            <div class="col-md-12 e_marginInvent">
                                <label for="name">Select Item:</label>
                                <select class="eform-control e_select" id="item" name="edit_item" required>
                                    <option class="e_select" value="" selected="true" disabled="disabled"></option>
                                    <?php
                                        require_once '../dbh.inc.php'; 
                                        $statement = "SELECT item FROM tb_inventory";
                                        $dt = mysqli_query($conn, $statement);

                                        while ($result = mysqli_fetch_array($dt)){
                                        unset($itemName);
                                        $itemName = $result['item'];
                                        $result = "<option class = e_select value= '$itemName'>" . $result['item'] . "</option>";
                                        echo $result;
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4 col-sm-12 e_marginInvent"><br>
                                <label for="name">Edit Name:</label>
                                <input type="text" class="e_textField2" id="item2" name="edit_name" required>
                            </div>
                            <div class="form-group mb-4 col-sm-12 e_marginInvent">
                                <label for="name">Edit Quantity:</label>
                                <input type="text" class="e_textField" id="qty2" name="edit_quantity" required>
                            </div>
                        </div>
                        <div class="eform-check">
                            <label></label>
                        </div>
                        <input type="submit" name="update" class="btn esend-form e_marginInvent" value="Confirm">
                    </form>
                </div>
            </div>
            <!-- EDIT CURRENT INVENTORY -->
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
            $('.open-form').click(function() {
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
            $('.edit-form').click(function() {
                $('.eform-popup').show();
            });
            $('.eclose-form').click(function() {
                $('.eform-popup').hide();
    
            });

            $(document).mouseup(function(e) {
                var econtainer = $(".eform-wrapper");
                var eform = $(".eform-popup");

                if (!econtainer.is(e.target) && econtainer.has(e.target).length === 0) {
                    eform.hide();
                }
            });
        });
    </script>

</body>

</html>