<?php

    // POST VARIABLES
    $date_issued = $_POST['date-issued'];
    $date_fixed = $_POST['date-fixed'];
    $defective_part = $_POST['defective-part'];
    $plate_number = $_POST['plate-number'];
    $description = $_POST['description'];
    $maintenance_cost = $_POST['maintenance-cost'];

    require '../dbh.inc.php';
    $sql = 'INSERT INTO tb_maintenance(date_issued, date_fixed, plate_number, defective_part, `description`, maintenance_cost) VALUES(?, ?, ?, ?, ?, ?)';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: vehicle_report.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $date_issued, $date_fixed, $plate_number, $defective_part, $description, $maintenance_cost);
    mysqli_stmt_execute($stmt);
    header('location: vehicle_report.php?success');
