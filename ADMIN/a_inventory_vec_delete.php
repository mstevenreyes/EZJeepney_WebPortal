<?php
    require '../dbh.inc.php';
    $plateNum = $_GET['plate_num'];

        $sql = "DELETE from tb_jeepney WHERE plate_number = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "ERROR: " . mysqli_error($conn); //Outputs Error in case of statement failing
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $plateNum);

        if(!mysqli_stmt_execute($stmt))
        {
            echo "ERROR: " . mysqli_error($conn);
            header('location: a_inventory.php?error=delete-salary-report-failed');
            exit();
        }

        if(mysqli_stmt_affected_rows($stmt) > 0)
        {
            header('location:a_inventory.php?status=delete-success');
        }
        else{
            echo mysqli_error($conn);
            exit();
            header('location:a_inventory.php.php?status=delete-failed');
        }
   
  
 