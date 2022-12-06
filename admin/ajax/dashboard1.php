<?php

    require('../../dbh.inc.php');
    
    $command = isset($_POST['get']) ? $_POST['get'] : "";
    // $command = "attendance_count";
    switch($command) 
    {
        case "attendance_count":
            $sql = "SELECT * FROM tb_daily_attendance";
            $query = mysqli_query($conn, $sql);
            $attendanceArray = array();
            while ($result = mysqli_fetch_assoc($query))
            {   
                $attendanceArray[] = $result ;
            }
            echo json_encode($attendanceArray);
            break;
        case "revenue_count":
            $sql = "SELECT * FROM tb_daily_revenue";
            $query = mysqli_query($conn, $sql);
            $revenueArr = array();
            while ($result = mysqli_fetch_assoc($query))
            {   
                $revenueArr[] = $result ;
            }
            echo json_encode($revenueArr);
            break;
    }
  
