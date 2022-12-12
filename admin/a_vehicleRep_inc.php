<?php

    require '../dbh.inc.php';

    $plateNum = $_POST['plateNumber'];
    $deets = $_POST['details'];
    $reason = $_POST['reason'];
    $MaintenanceCost = $_POST['MaintenanceCost'];
    $DI = $_POST['DateIssued'];
    $DF = $_POST['DateFixed'];
    $SubmitBtn = $_POST['submit'];

    //insert new part record
    function insert($conn, $DI, $DF, $plateNum, $deets, $reason, $MaintenanceCost){
        $stmt = mysqli_prepare($conn, "INSERT INTO tb_maintenance VALUES (?, ?, ?, ?, ?, ?)"); 
        mysqli_stmt_bind_param($stmt, "sssssi", $DI, $DF, $plateNum,  $deets, $reason, $MaintenanceCost);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    //insert date fixed on existing record 
    function addFixedDate($conn, $DI, $DF, $plateNum){

        $sql = "UPDATE tb_maintenance SET date_fixed = '$DF' WHERE date_issued = '$DI' AND plate_number = '$plateNum'";
        $sql_run = mysqli_query($conn, $sql);
    }

    //insert a new record w/o fixed date
    function addRecord($conn, $DI, $plateNum, $deets, $reason, $MaintenanceCost){
        $stmt = mysqli_prepare($conn, "INSERT INTO tb_maintenance (date_issued, plate_number, description, reason, maintenance_cost) 
                                        VALUES (?, ?, ?, ?, ?)"); 
        mysqli_stmt_bind_param($stmt, "ssssi", $DI, $plateNum,  $deets, $reason, $MaintenanceCost);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    if(isset($SubmitBtn)){

        $varEDate = NULL; $varSDate = NULL; //default value is NULL
        $sqlCheck_DF = "SELECT tb_maintenance.date_issued, tb_maintenance.date_fixed FROM tb_maintenance, tb_jeepney 
                        WHERE tb_maintenance.date_issued = '$DI' 
                        AND tb_jeepney.plate_number = '$plateNum';";
        $testDF = mysqli_query($conn, $sqlCheck_DF);
        
        while ($result = mysqli_fetch_assoc($testDF)){
            $varSDate = $result['date_issued'];
            $varEDate = $result['date_fixed'];
        }


        if($DF == NULL && $varSDate != NULL){
            addRecord($conn, $DI, $plateNum, $deets, $reason, $MaintenanceCost);
        }
        else if($varEDate == NULL && $varSDate == $DI){
            addFixedDate($conn, $DI, $DF, $plateNum);
        }
        else if($varEDate == NULL && $varSDate == NULL){
            insert($conn, $DI, $DF, $plateNum, $deets, $reason, $MaintenanceCost);
        }
        else{
        }
        header('location: a_vehicleRep.php');

    }


    
    