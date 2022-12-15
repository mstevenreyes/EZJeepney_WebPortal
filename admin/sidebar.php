<?php
        // Script to check if user is logged in using session variables
        session_start();
        // if(!isset($_SESSION['admin-id'])){
        //     header('location: ../index.php?invalid');
        // }
        
?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <script src="https://kit.fontawesome.com/a398ec554b.js" crossorigin="anonymous"></script>
    
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="a_dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img style="height: 35px;margin:10px " src="../images/ez-jeepney-logo-only.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <h2>EZ JEEPNEY</h2> -->
                            <img style="height: 35px;" src="../images/ez-jeepney-logo-text-2.png" alt="">
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
               
                <div class="navbar-timer">
                    
                    <span id="time-ticker">00:00:00</span>
                </div>
                <div class="navbar-notification">
                    <span><button id="notification-button"><i class="fa-solid fa-bell fa-lg"></i></button></span>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- Notification Pop-up -->
        <div class="popup-notification" id="notification">
            <div class="close-notif">
                    <span class="close">&times;</span>
            </div>
            <div class="notif-content">
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="waves-effect waves-dark sidebar-link" href="a_dashboard"
                                aria-expanded="false">
                                <i class="fa-solid fa-chart-column fa-lg"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  pt-2">
                            <a class="waves-effect waves-dark sidebar-link" href="a_emp_list"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-tie"></i>
                                <span class="hide-menu">Employees</span>
                            </a>
                        </li>
                        <li class="sidebar-item  pt-2">
                            <a class="waves-effect waves-dark sidebar-link" href="a_emp_incentives"
                                aria-expanded="false">
                                <i class="fa-solid 	fas fa-award"></i>
                                <span class="hide-menu">Employee Recognition</span>
                            </a>
                        </li>
                        <li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="a_scheduling"
                                aria-expanded="false">
                                <i class="fa-solid fa-calendar-week"></i>
                                <span class="hide-menu">Scheduling</span>
                            </a>
                        </li> 
                        <li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="a_attendance"
                                aria-expanded="false">
                                <i class="fas fa-clock"></i>
                                <span class="hide-menu">Attendance</span>
                            </a>
                        </li>  
                        <li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="a_emp_salary"
                                aria-expanded="false">
                                <i class="fa-solid fa-money-check-dollar"></i>
                                <span class="hide-menu">Payroll</span>
                            </a>
                        </li>           
                        <li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="a_vehicleRep"
                                aria-expanded="false">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <span class="hide-menu">Vehicle Report</span>
                            </a>
                        </li>
                        <li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="a_inventory"
                                aria-expanded="false">
                                <i class="fa-solid fa-truck-ramp-box"></i>
                                <span class="hide-menu">Inventory</span>
                            </a>
                        </li>
                        <li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="a_jeepney"
                                aria-expanded="false">
                                <i class="fas fa-bus"></i>
                                <span class="hide-menu">Add Jeepney</span>
                            </a>
                        </li>
                        </li><li class="sidebar-item  pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.inc.php"
                                aria-expanded="false">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                    <script src="js/pages/sidebar.js"></script>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->