<?php
    require '../dbh.inc.php';
    // POST VARIABLES
    $selStaff = $_POST['driver-id'];
    $dWorked = $_POST['days-worked'];
    $dWage = $_POST['daily-wage'];
    $cAllowance = $_POST ['canteen-fees'];
    $oAllowance = $_POST ['other-allowance'];
    $pagibig = $_POST ['pag-ibig'];
    $philHealth = $_POST['philhealth'];
    $sss = $_POST['sss'];
    $tbName = "tb_salary_report";
    $submitBTN = $_POST['submit'];

    $grosspay = $dWage * $dWorked + $oAllowance;
    $netpay = $grosspay - ($cAllowance + $pagibig + $philHealth + $sss);

    if(isset($submitBTN)){
        $sql = "INSERT INTO $tbName(emp_id, days_worked, basic_salary, canteen_fees, other_allowance, pagibig, philhealth, sss, grosspay, netpay)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "ERROR: ". mysqli_error($conn);
            exit();
        }

        mysqli_stmt_bind_param($stmt, "siiiiiiiii", $selStaff, $dWorked, $dWage, $cAllowance, $oAllowance,
        $pagibig, $philHealth, $sss, $grosspay, $netpay);
        if(!mysqli_stmt_execute($stmt)){
            echo "ERROR: ". mysqli_error($conn);
            header('location: a_emp_salary.php?error=salary-add-failed');
            exit();
        }
        header('location: a_emp_salary.php?success');
    }
