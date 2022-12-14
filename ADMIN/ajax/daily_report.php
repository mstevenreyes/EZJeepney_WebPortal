<?php

    require('../../dbh.inc.php');
    print_r(json_decode( $_POST['mydata']));
    $command = isset($_POST['command']) ? $_POST['command'] : "";
    // $command = "attendance_count";
    switch($command) 
    {
        case "add-report":
            $sql = "SELECT * FROM tb_daily_attendance";
            $query = mysqli_query($conn, $sql);
            $attendanceArray = array();
            while ($result = mysqli_fetch_assoc($query))
            {   
                $attendanceArray[] = $result ;
            }
            echo json_encode($attendanceArray);
            break;
    }
  
