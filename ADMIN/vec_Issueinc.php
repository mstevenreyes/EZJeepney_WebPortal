<?php

    require '../dbh.inc.php';
    session_start();
    $ID = $_SESSION['mtnID'];
    $SubmitBtn = $_POST['esubmit'];

    function getDates($ID){

        require '../dbh.inc.php';

        if(isset($_POST['vec_iDate']) && $_POST['vec_iDate'] > 0){
            $DI = $_POST['vec_iDate'];

            $sql = "UPDATE tb_maintenance SET date_issued = '$DI' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
            header('location: vec_Issue.php?mtnID='.$ID);
        }

        if(isset($_POST['vec_Fdate']) && $_POST['vec_Fdate'] > 0){
            $DF = $_POST['vec_Fdate'];

            $sql = "UPDATE tb_maintenance SET date_fixed = '$DF' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);

            if($_POST['vec_reason'] = "Maintenance"){
                $sched = date("Y-m-d", strtotime($DF. "+1 month"));
                $sql2 = "UPDATE tb_maintenancesched SET sched = '$sched' WHERE mtnID = '$ID'";
                $sql2run = mysqli_query($conn, $sql2);
            }
            header('location: vec_Issue.php?mtnID='.$ID);
        }
    }

    function getAttr($ID){

        require '../dbh.inc.php';

        if(isset($_POST['vec_details'])){
            $details = $_POST['vec_details'];

             $sql = "UPDATE tb_maintenance SET description = '$details' WHERE mtnID = '$ID'";
             $sql_run = mysqli_query($conn, $sql);
             header('location: vec_Issue.php?mtnID='.$ID);
        }

        if(isset($_POST['vec_reason'])){
            $reason = $_POST['vec_reason'];

            $sql = "UPDATE tb_maintenance SET reason = '$reason' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
            header('location: vec_Issue.php?mtnID='.$ID);
        }

        if(isset($_POST['vecMC']) && isset($_POST['vecMC']) != NULL){
            $maintenanceCost = $_POST['vecMC'];

            $sql = "UPDATE tb_maintenance SET maintenance_cost = '$maintenanceCost' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
            //echo $maintenanceCost;
            header('location: vec_Issue.php?mtnID='.$ID);
        }
    }
    

    if(isset($SubmitBtn)){
        getDates($ID);
        getAttr($ID);
    }