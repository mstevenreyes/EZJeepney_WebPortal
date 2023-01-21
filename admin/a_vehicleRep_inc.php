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
        $stmt = mysqli_prepare($conn, "INSERT INTO tb_maintenance (date_issued, date_fixed, plate_number, description, reason, maintenance_cost) VALUES (?, ?, ?, ?, ?, ?)"); 
        mysqli_stmt_bind_param($stmt, "sssssi", $DI, $DF, $plateNum,  $deets, $reason, $MaintenanceCost);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // FETCH MTN ID FOR TB_MAINTENANCESCHED
        $query = "SELECT mtnID, date_issued, date_fixed FROM tb_maintenance WHERE date_issued = '$DI' AND date_fixed = '$DF' AND plate_number = '$plateNum' AND reason='Maintenance';";
        $run = mysqli_query($conn, $query);

        while ($result = mysqli_fetch_array($run)){
            $nID = $result['mtnID'];
            $nDI = $result['date_issued'];
            $nDF = $result['date_fixed'];
        }

        if(!= NULL){

        }
        
        $sched = date("Y-m-d", strtotime($newID. "+1 month"));

        $sql = "INSERT INTO tb_maintenancesched VALUES ('$newID', '$plateNum', $sched)";
        $sql_run = mysqli_query($conn, $sql);

        header('location: vec_Issue.php?mtnID='.$ID);
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

        $sql = "SELECT MAX(mtnID), date_fixed FROM tb_maintenance WHERE plate_number = '$plateNum' AND (date_fixed = 0 AND reason = 'Maintenance');";
        $run = mysqli_query($conn, $sql);

        while($result = mysqli_fetch_assoc($run)){
            $count = $result['date_fixed'];
        }
        
        if($count > 0){
            header('location: a_vehicleRep.php?error');
        }
        else{
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

    }


    
    