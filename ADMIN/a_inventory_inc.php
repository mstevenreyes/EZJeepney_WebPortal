<?php


    require '../dbh.inc.php';

    // POST VARIABLES

    $spareParts = $_POST['spare_parts'];
    $qty = $_POST['quantity'];
    $submitBtn = $_POST['submit'];
    $tablename = "tb_spare_parts";

    if(isset($submitBtn)){
        $sql = "INSERT INTO $tablename(spare_parts, quantity) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn, $sql);
        if(!mysqli_stmt_prepare($stmt)){
            die("Error")
        }
    }