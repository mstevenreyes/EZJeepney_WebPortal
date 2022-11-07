<?php

    require '../dbh.inc.php';

    $plateNum = $_POST['plateNumber'];
    $reason = $_POST['reason'];
    $MaintenanceCost = $_POST['MaintenanceCost'];
    $DI = $_POST['DateIssued'];
    $DF = $_POST['DateFixed'];
    $SubmitBtn = $_POST['submit'];

    
    if(isset($SubmitBtn)){
        $stmt = mysqli_prepare($conn, "INSERT INTO tb_maintenance (date_issued, date_fixed, plate_number, descript, maintenance_cost) VALUES (?, ?, ?, ?, ?)"); 
        mysqli_stmt_bind_param($stmt, "ssssi", $DI, $DF, $plateNum, $reason, $MaintenanceCost);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
        header('location: a_vehicleRep.php');

    }


    
    