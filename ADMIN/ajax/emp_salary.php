<?php
include '../../dbh.inc.php';
$data = isset($_POST['data']) ? json_decode($_POST['data'], true) : 0;
// print_r($data);
$salId = isset($_POST['salary-id']) ? $_POST['salary-id'] : 0;
$command = isset($_POST['command']) ? $_POST['command'] : 0;


// echo $dateStart;

switch($command){
    case "calculate-payroll":
        $dateArr = explode(" - ", $data['range']);
        $dateStart = $dateArr[0];
        $dateEnd = $dateArr[1];
        // Getting days worked
        $sql = "SELECT emp_id, COUNT(*) days_worked FROM  tb_attendance_sheet WHERE attendance_date BETWEEN ? AND ? GROUP BY emp_id;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "ERROR: " . mysqli_error($conn);
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $dateStart, $dateEnd);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // Generation of Payrolls + computation
        while($row = mysqli_fetch_array($result)){
            $empId = $row['emp_id'];
            $daysWorked = $row['days_worked'];
            $basePay = $data['empType'] == 'driver' ? 900 : 550;
            $grossPay = $row['days_worked'] * $basePay;
            $pagibig = 150;
            $philhealth = 150;
            $sss = 150;
            $totalDeduction = $pagibig + $sss + $philhealth;
            // if($taxContributtions){
                
            // }
            $netPay = $grossPay - $totalDeduction;
            $sql = "INSERT INTO tb_payroll_report(emp_id, days_worked, basic_pay, grosspay, sss, pagibig, philhealth, deduction, netpay) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt2, $sql)){
                echo "ERROR: " . mysqli_stmt_error($stmt2);
                exit();
            }
            mysqli_stmt_bind_param($stmt2, "siiiiiiii", $empId, $daysWorked, $basePay, $grossPay, $sss, $pagibig, $philhealth, $totalDeduction, $netPay);
            if(!mysqli_stmt_execute($stmt2)){
                echo "ERROR: " . mysqli_stmt_error($stmt2);
                exit();
            }
        }
        break;
    case "get-payroll":
        $sql = "SELECT * FROM tb_payroll_report WHERE salary_id = '$salId'";
        $query = mysqli_query($conn, $sql);
        $salArr = array();
        while($result = mysqli_fetch_assoc($query)){
            $salArr[] = $result;
        }
        echo json_encode($salArr);

        break;
    case "delete-payroll":
        $sql = "DELETE FROM tb_payroll_report WHERE salary_id = '$salId'";
        $query = mysqli_query($conn, $sql);
        break;
}