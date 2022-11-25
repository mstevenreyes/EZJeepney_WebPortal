<?php

    require '../dbh.inc.php';

    // POST VARIABLES
    $driverId = $_POST['driver-id'];
    $paoId = $_POST['pao-id'];
    $plateNumber = $_POST['plate-number'];
    $scheduleType = $_POST['schedule-type'];
    $scheduleDate = $_POST['schedule-date']; 
    $shiftStart = $_POST['shift-start'];
    $shiftEnd = $_POST['shift-end'];
    $submitBtn = $_POST['submit'];
    $updateSchedBtn = $_POST['update-schedule'];
    $tablename = "tb_schedule_sheet";

    if(isset($submitBtn)){
        //If scheduling only one day
        if($scheduleType == "day")
        {
            $sql = "INSERT INTO $tablename(schedule_date, driver_id, pao_id, plate_number, shift_start, shift_end) VALUES (?, ?, ?, ?, ?, ?)"; // Sql Statement
            // Initializing Connection
            $stmt = mysqli_stmt_init($conn); 
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
                exit();
            }
            mysqli_stmt_bind_param($stmt, "ssssss", $scheduleDate, $driverId, $paoId, $plateNumber, $shiftStart, $shiftEnd );
            if(!mysqli_stmt_execute($stmt))
            {
                echo "ERROR: " . mysqli_error($conn);
                // header('location: a_scheduling.php?error=stmtfailed');
                exit();
            }
        }
        //If Schedule is for a specific range
        else
        {
            $daterange = $_POST['schedule-range'];
            $dateArray = explode(" - ", $daterange);
            $scheduleStart = new DateTime($dateArray[0]);
            $scheduleEnd = new DateTime($dateArray[1]);
            $scheduleIncrement = $scheduleStart;
            while($scheduleIncrement != $scheduleEnd)
            {
                $scheduleFormatted = $scheduleIncrement->format('Y-m-d');
                $sql = "INSERT INTO $tablename(schedule_date, driver_id, pao_id, plate_number, shift_start, shift_end) VALUES (?, ?, ?, ?, ?, ?)"; // Sql Statement
                // Initializing Connection
                $stmt = mysqli_stmt_init($conn); 
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
                    exit();
                }
        
                mysqli_stmt_bind_param($stmt, "ssssss", $scheduleFormatted, $driverId, $paoId, $plateNumber, $shiftStart, $shiftEnd );
                if(!mysqli_stmt_execute($stmt))
                {
                    // echo "ERROR: " . mysqli_error($conn);
                    header('location: a_scheduling.php?error=stmtfailed');
                    exit();
                }
                // FOR PAO INSERTION
                $sql = "INSERT INTO $tablename(schedule_date, batch_id, emp_id, plate_number) VALUES (?, ?, ?, ?)"; // Sql Statement
                $stmt = mysqli_stmt_init($conn); // Initializing Connection
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
                    header('location: a_scheduling.php?error=stmtfailed');
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "ssss", $scheduleFormatted, $batchId, $paoId, $plateNumber);
                if(!mysqli_stmt_execute($stmt)){
                    // echo "ERROR: " . mysqli_error($conn);
                    header('location: a_scheduling.php?error=stmtfailed');
                    exit();
                }
                $scheduleIncrement->add(new DateInterval('P1D'));
            }      
        }
        header('location: a_scheduling.php?status=success');
        // INSERTS UNIQUE EMPLOYEE ID WITH THE DETAILS OF THE EMPLOYEE
        // header('location: a_scheduling.php?success');
    }
    elseif(isset($updateSchedBtn))
    {
        $sql = "INSERT INTO $tablename(schedule_date, driver_id, pao_id, plate_number, shift_start, shift_end) VALUES (?, ?, ?, ?, ?, ?)"; // Sql Statement
        // Initializing Connection
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssss", $scheduleDate, $driverId, $paoId, $plateNumber, $shiftStart, $shiftEnd );
        if(!mysqli_stmt_execute($stmt))
        {
            echo "ERROR: " . mysqli_error($conn);
            // header('location: a_scheduling.php?error=stmtfailed');
            exit();
        }
    }
  