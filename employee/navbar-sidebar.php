<!-- navbar  -->

<?php
    include '../dbh.inc.php';

    session_start();
    $empID = $_SESSION['emp-id'];

    //query for employee details like name, birthdays, etc.
    $sql = "SELECT emp_birthday, emp_address, emp_gender, emp_surname, emp_firstname FROM tb_employee WHERE emp_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo (mysqli_stmt_error($stmt));
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $empID);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($empData = mysqli_fetch_assoc($resultData))
    {
        $empSurname = $empData['emp_surname'];
        $empFirstname = $empData['emp_firstname'];
        $empBirthday = $empData['emp_birthday'];
        $empAddress = $empData['emp_address'];
        $empGender = $empData['emp_gender'];
    }
?>
<nav class="navbar">
        <!-- <h4>
        <span class="header">EZ JEEPNEY</span>
        </h4> -->
        <img style="height: 45px;margin: 10px;" src="../images/ez-jeepney-logo-only.png" alt="">
        <img style="height: 50px;" src="../images/ez-jeepney-logo-text-2.png" alt="">
    <!-- </a> -->
    <div class="profile">

        <img src="./employee_images/<?php echo $empID ?>.png" alt="" class="profile-image">
        <p class="profile-name"><?php echo $empSurname . ', ' . $empFirstname   ?><br><?php echo $empID; ?></p>
        <p id="emp-id" style="display: none;"><?php echo $empID; ?></p>
    </div>
</nav>

<!-- sidebar -->

<input type="checkbox" id="toggle">
    <label for="toggle" class="side-toggle">
        <span class="fa fa-bars"></span>
    </label>

    <div class="sidebar">
        <a href="dashboard.php"><div class="sidebar-menu">
            <span class="fa fa-home"></span>
                <p>Dashboard</p>
        </div></a>
        <a href="user-profile.php"><div class="sidebar-menu">
            <span class="fa fa-user"></span>
                <p>User Profile</p>
        </div></a>
        <a href="attendance.php"><div class="sidebar-menu">
            <span class="fa fa-calendar"></span>
                <p>Attendance Records</p>
        </div></a>
        <a href="salary-report.php"><div class="sidebar-menu">
            <span class="fa fa-money"></span>
                <p>Salary Report</p>
        </div></a>
        <a href="assigned-jeepney.php"><div class="sidebar-menu">
            <span class="fa fa-bus"></span>
                <p>View Assigned Jeepney</p>
        </div></a>
        <a href="../index.php"><div class="sidebar-menu">
            <span class="fa fa-sign-out"></span>
                <p>Logout</p>
        </div></a>
    </div>




