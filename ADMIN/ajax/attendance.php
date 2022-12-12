<?php
include '../../dbh.inc.php';
$applyDate = isset($_POST['apply-date']) ? date('Y-m-d', strtotime($_POST['apply-date'])) : "";
$empID = isset($_POST['emp-id']) ? $_POST['emp-id'] : "";
$leaveStatus = isset($_POST['leave-status']) ? $_POST['leave-status'] : "";
$command = isset($_POST['set']) ? $_POST['set'] : 0;

switch($command){
    case "leaves":
        $sql = "UPDATE tb_employee_leaves SET leave_status = '$leaveStatus' WHERE emp_id = '$empID' AND apply_date = '$applyDate'";
        $query = mysqli_query($conn, $sql);
        echo $empID;
        break;
}