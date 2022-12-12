<script src="js/notification.js"></script>
<?php

include('../../dbh.inc.php');
// $command = isset($_POST['get']) ? $_POST['get'] : "";
$command = 'late-employees';
switch($command){
    case 'late-employees':
        $sql = "SELECT * FROM view_late_employees ORDER BY batch_id";
        $query = mysqli_query($conn, $sql);
        $lateEmpArr = array();
        while($result = mysqli_fetch_assoc($query)){
            if($result['attendance_date'] == NULL){
                //if time right now is 30 minutes later than shift start, notif
                $currentDate = new DateTime("now", new DateTimeZone('Asia/Taipei'));
                $currentTime = strtotime($currentDate->format('H:i:s'));
                $shiftStart = strtotime($result['shift_start']);
                $timeDiff = ($currentTime - $shiftStart)/3600;
                if($timeDiff >= .5){
                    $tempArr = array($result['tbs_emp_id'], $timeDiff);
                    array_push($lateEmpArr, $tempArr);
                }
            }
        }
        echo json_encode($lateEmpArr);
        break;
}