<?php
include '../../dbh.inc.php';
$coop = isset($_POST['coop']) ? $_POST['coop'] : "";
$empID = isset($_POST['emp-id']) ? $_POST['emp-id'] : "";
$command = isset($_POST['get']) ? $_POST['get'] : 0;

switch($command){
    case "employee-search":
        $sql = "SELECT emp_surname, emp_firstname, emp_id FROM tb_employee WHERE (emp_id LIKE '%$empID%' OR emp_surname LIKE '%$empID%' or emp_firstname LIKE '%$empID%') AND emp_coop LIKE '%$coop%';";
        $query = mysqli_query($conn, $sql);
        $employeeArray = array();
        while($result = mysqli_fetch_assoc($query)){
            $employeeArray[] = $result;
        }
        echo json_encode($employeeArray);
        break;
    case "all-employee":
        $sql = "SELECT emp_surname, emp_firstname, emp_id FROM tb_employee WHERE emp_coop LIKE '%$coop%';";
        $query = mysqli_query($conn, $sql);
        $employeeArray = array();
        while($result = mysqli_fetch_assoc($query)){
            $employeeArray[] = $result;
        }
        echo json_encode($employeeArray);
        break;
}