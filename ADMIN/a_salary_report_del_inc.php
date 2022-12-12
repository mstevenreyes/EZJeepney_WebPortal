<?php
    require '../dbh.inc.php';
    session_start();
    $deleteBtn = $_POST ['delete'];
    $salaryID = $_SESSION['salary-id'];

    if(isset($deleteBtn)){
        $sql = "DELETE from tb_salary_report WHERE salary_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $salaryID);
        if(!mysqli_stmt_execute($stmt))
        {
            // echo "ERROR: " . mysqli_error($conn);
            header('location: a_salary_report.php?error=delete-salary-report-failed');
            exit();
        }
        if(mysqli_stmt_affected_rows($stmt) > 0)
        {
            header('location:a_emp_salary.php?status=delete-success');
        }else{
            echo mysqli_error($conn);
            exit();
            header('location:a_salary_report.php.php?status=delete-failed');
        }
    }
  
 