<?php

include('../../dbh.inc.php');
$command = isset($_POST['get']) ? $_POST['get'] : "";

switch($command){
    case 'late-employees':
        $sql = "SELECT * FROM view_late_drivers";
        $query = mysqli_query($conn, $sql);
        $lateEmpArr = array();
        while($result = mysqli_fetch_array($query)){
            if($result['attendance_date'] == NULL){
                array_push($lateEmpArr, $result['tbs_emp_id']);
            }
        }
        echo json_encode($lateEmpArr);
        break;
}