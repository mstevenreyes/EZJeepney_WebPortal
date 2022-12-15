<?php
    require '../dbh.inc.php';
    session_start();
    $deleteBtn = $_POST ['delete'];
    $ID = $_SESSION['mtnID'];

    if(isset($deleteBtn)){
        $sql = "DELETE from tb_maintenance WHERE mtnID = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $ID);
        if(!mysqli_stmt_execute($stmt))
        {
            // echo "ERROR: " . mysqli_error($conn);
            header('location: vec_Issue.php?error=delete-salary-report-failed');
            exit();
        }
        if(mysqli_stmt_affected_rows($stmt) > 0)
        {
            header('location: vec_Issue.php?status=delete-success');
        }else{
            echo mysqli_error($conn);
            exit();
            header('location:vec_Issue.php?status=delete-failed');
        }
    }
  
 