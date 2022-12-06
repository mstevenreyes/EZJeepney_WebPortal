<?php

    require '../dbh.inc.php';

    // POST VARIABLES
    $batchId = $_POST['batch-id'];
    $driverId = $_POST['driver-id'];
    $paoId = $_POST['pao-id'];
    $plateNumber = $_POST['plate-number'];
    $scheduleType = $_POST['schedule-type'];
    $scheduleDate = $_POST['schedule-date']; 
    $shiftStart = date("G:i", strtotime($_POST['shift-start']));
    $shiftEnd = date("G:i", strtotime($_POST['shift-end']));
    $submitBtn = $_POST['add-schedule'];
    $updateSchedBtn = $_POST['update-schedule'];
    $deleteSchedBtn = $_POST['delete-schedule'];
    $tablename = "tb_schedule_sheet";

    if(isset($submitBtn))
    {
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
                header('location: a_scheduling?error=insert-failed');
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
            while($scheduleIncrement <= $scheduleEnd)
            {
                $scheduleFormatted = $scheduleIncrement->format('Y-m-d');
                $sql = "INSERT INTO tb_schedule_sheet(schedule_date, driver_id, pao_id, plate_number, shift_start, shift_end) VALUES (?, ?, ?, ?, ?, ?)"; // Sql Statement
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
                    echo "ERROR: " . mysqli_error($conn);
                    header('location: a_scheduling.php?error=insert-failed');
                    exit();
                }
                print_r($scheduleFormatted);
                $scheduleIncrement->modify('+1 day');
            }      
        }
        header('location: a_scheduling?status=insert-success');
        // INSERTS UNIQUE EMPLOYEE ID WITH THE DETAILS OF THE EMPLOYEE
        // header('location: a_scheduling.php?success');
    }
    elseif(isset($updateSchedBtn))
    {
        $batchId = $_POST['edit-form-batch-id'];
        $sql = "UPDATE tb_schedule_sheet SET shift_start = ?, shift_end = ? WHERE batch_id = ?"; // Sql Statement
        // Initializing Connection
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $shiftStart, $shiftEnd, $batchId);
        if(!mysqli_stmt_execute($stmt))
        {
            echo "ERROR: " . mysqli_error($conn);
            // header('location: a_scheduling.php?error=stmtfailed');
            exit();
        }
        header('location:a_scheduling.php?status=update-success');
    }
    elseif(isset($deleteSchedBtn))
    {
        $batchId = $_POST['edit-form-batch-id'];
        $sql = "DELETE FROM tb_schedule_sheet WHERE batch_id = ?"; // Sql Statement
        // Initializing Connection
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $batchId);
        if(!mysqli_stmt_execute($stmt))
        {
            // echo "ERROR: " . mysqli_error($conn);
            header('location: a_scheduling?error=delete-sched-exec-failed');
            exit();
        }
        if(mysqli_stmt_affected_rows($stmt) > 0)
        {
            header('location:a_scheduling.php?status=delete-success');
        }else{
            echo mysqli_error($conn);
            exit();
            header('location:a_scheduling.php?status=delete-failed');
        }
    }
  