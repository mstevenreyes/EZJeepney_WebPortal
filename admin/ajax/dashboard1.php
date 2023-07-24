<?php

    require('../../dbh.inc.php');
    $coop = isset($_POST['coop']) ? $_POST['coop'] : "";
    $command = isset($_POST['get']) ? $_POST['get'] : "";
    // $command = "attendance_count";
    switch($command) 
    {
        case "attendance_count":
            if($coop == "bulacan-coop"){
                $sql = "SELECT * FROM tb_daily_attendance_bulacan_coop";
            }
            else if($coop == "majetsco"){
                $sql = "SELECT * FROM view_daily_attendance";
            }
            else{
                $sql = "SELECT * FROM tb_daily_attendance_othercoop";
            }
            $query = mysqli_query($conn, $sql);
            $attendanceArray = array();
            while ($result = mysqli_fetch_assoc($query))
            {   
                $attendanceArray[] = $result ;
            }
            echo json_encode($attendanceArray);
            break;
        case "revenue_count":
            if($coop == "bulacan-coop"){
                $sql = "SELECT * FROM tb_daily_revenue_bulacan_coop";
            }
            else if($coop == "majetsco"){
                $sql = "SELECT * FROM view_daily_revenue";
            }
            else{
                $sql = "SELECT * FROM tb_daily_revenue_othercoop";
            }
           
            $query = mysqli_query($conn, $sql);
            $revenueArr = array();
            while ($result = mysqli_fetch_assoc($query))
            {   
                $revenueArr[] = $result ;
            }
            echo json_encode($revenueArr);
            break;
    }
  
