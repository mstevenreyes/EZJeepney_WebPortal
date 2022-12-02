<?php

    require('../../dbh.inc.php');
    
    // $command = isset($_POST['get']) ? $_POST['get'] : ""
    $command = "attendance_count";
    switch($command) 
    {
        case "attendance_count":
            $sql = "SELECT schedule_date, COUNT(emp_id) AS present_employee FROM tb_jeepneys_on_route WHERE schedule_date = CURDATE();";
            $query = mysqli_query($conn, $sql);
            $attendanceArray = array();
            while ($result = mysqli_fetch_assoc($query))
            {   
                $attendanceArray[] = $result ;
            }
                // print_r($attendanceArray);
            break;
    }
    echo json_encode($attendanceArray);
