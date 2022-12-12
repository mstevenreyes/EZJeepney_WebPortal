<?php

    require('../../dbh.inc.php');
    $empID = isset($_POST['emp-id']) ? $_POST['emp-id'] : 0;
    $command = isset($_POST['set']) ? $_POST['set'] : "";
    // $command = "attendance_count";
    switch($command) 
    {
        case "apply-leave":
            $sql = "INSERT INTO tb_employee_leaves VALUES( '$empID', CURDATE(), 'PENDING')";
            $query = mysqli_query($conn, $sql);
            break;

    }