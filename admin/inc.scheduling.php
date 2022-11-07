<?php


    require '../dbh.inc.php';

    // POST VARIABLES
    $driverId = $_POST['driver-id'];
    $paoId = $_POST['pao-id'];
    $plateNumber = $_POST['plate-number'];
    $batchId = '5432';
    $scheduleType = $_POST['schedule-type'];
    $scheduleDate = $_POST['schedule-date'];
    $scheduleStart = $_POST['schedule-start'];
    $scheduleEnd = $_POST['schedule-end'];
    $submitBtn = $_POST['submit'];
    $tablename = "tb_schedule_sheet";

    if(isset($submitBtn)){
        // INSERTS UNIQUE EMPLOYEE ID WITH THE DETAILS OF THE EMPLOYEE
        if($scheduleType == "day"){
            
        }
        $sql = "INSERT INTO $tablename(schedule_date, batch_id, emp_id, plate_number) VALUES (?, ?, ?, ?)"; // Sql Statement
        $stmt = mysqli_stmt_init($conn); // Initializing Connection
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $scheduleDate, $batchId, $driverId, $plateNumber);
        if(!mysqli_stmt_execute($stmt)){
            echo "ERROR: " . mysqli_error($conn);
            exit();
        }
        // FOR PAO INSERTION
        $sql = "INSERT INTO $tablename(schedule_date, batch_id, emp_id, plate_number) VALUES (?, ?, ?, ?)"; // Sql Statement
        $stmt = mysqli_stmt_init($conn); // Initializing Connection
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            header('location: a_scheduling.php?error=stmtfailed');
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ssss", $scheduleDate, $batchId, $paoId, $plateNumber);
        if(!mysqli_stmt_execute($stmt)){
            echo "ERROR: " . mysqli_error($conn);
            header('location: a_scheduling.php?error=stmtfailed');
            exit();
        }

        header('location: a_scheduling.php?success');
    }

  