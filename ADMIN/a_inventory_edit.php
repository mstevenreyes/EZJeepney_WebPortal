<?php

    require '../dbh.inc.php';

    $item = $_POST['item'];
    $qty = $_POST['quantity'];
    $submitBtn = $_POST['submit'];
    $tbName = "tb_inventory";

    // $sql = "INSERT INTO tb_inventory (item, quantity) VALUES (?, ?)";

    // if (mysqli_query( $conn, $sql)){
    //     echo "Record Added";
    // }
    // else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }
    // mysqli_close($conn);
    
    if(isset($submitBtn)){
        // $stmt = mysqli_prepare($conn, "INSERT INTO $tbName (item, quantity) VALUES (?, ?)"); 
        // mysqli_stmt_bind_param($stmt, "si", $item, $qty);
        // mysqli_stmt_execute($stmt);
        // mysqli_stmt_close($stmt);
        // mysqli_close($conn);

        header('location: a_inventory.php');
    }
    