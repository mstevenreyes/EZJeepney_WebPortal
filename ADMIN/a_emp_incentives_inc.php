<?php

    require '../dbh.inc.php';

    $iName = $_POST['inc_name'];
    $amt = $_POST['amt'];
    $bName = $_POST['benef_name'];
    $dRec = $_POST['date_rec'];
    $submitBtn = $_POST['submit'];
    $tbName = "tb_incentives";

    // $sql = "INSERT INTO tb_inventory (item, quantity) VALUES (?, ?)";

    // if (mysqli_query( $conn, $sql)){
    //     echo "Record Added";
    // }
    // else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }
    // mysqli_close($conn);
    
    if(isset($submitBtn)){
        $stmt = mysqli_prepare($conn, "INSERT INTO $tbName (incentive_name, amt, beneficiary_name, date_received) VALUES (?, ?, ?, ?)"); 
        mysqli_stmt_bind_param($stmt, "siss", $iName, $amt, $bName, $dRec);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('location: a_emp_incentives.php');
    }
    


