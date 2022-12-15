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
            
        }

        if(isset($_POST['vec_Fdate'])){
            $DF = $_POST['vec_Fdate'];

            $sql = "UPDATE tb_maintenance SET date_fixed = '$DF' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
        }
    }

    function getAttr($ID){

        require '../dbh.inc.php';

        if(isset($_POST['vec_details'])){
            $details = $_POST['vec_details'];

             $sql = "UPDATE tb_maintenance SET description = '$details' WHERE mtnID = '$ID'";
             $sql_run = mysqli_query($conn, $sql);
        }

        if(isset($_POST['vec_reason'])){
            $reason = $_POST['vec_reason'];

            $sql = "UPDATE tb_maintenance SET reason = '$reason' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
        }

        if(isset($_POST['vecMC'])){
            $maintenanceCost = $_POST['vecMC'];

            $sql = "UPDATE tb_maintenance SET maintenance_cost = '$maintenanceCost' WHERE mtnID = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
        }
    }
    

    if(isset($SubmitBtn)){
        getDates($ID);
        getAttr($ID);
    }