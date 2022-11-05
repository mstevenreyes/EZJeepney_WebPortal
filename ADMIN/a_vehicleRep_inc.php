<?php

    require '../dbh.inc.php';

    $DI = $_POST['DateIssued'];
    $DF = $_POST['DateFixed'];
    // $qty = $_POST['quantity'];
    // $submitBtn = $_POST['submit'];
    // $tbName = "tb_inventory";
    
    // if(isset($submitBtn)){
    //     $stmt = mysqli_prepare($conn, "INSERT INTO $tbName (item, quantity) VALUES (?, ?)"); 
    //     mysqli_stmt_bind_param($stmt, "si", $item, $qty);
    //     mysqli_stmt_execute($stmt);
    //     mysqli_stmt_close($stmt);
    //     mysqli_close($conn);

    
    if ($DF == NULL){
        echo "No DF";
    }
    else{
        echo $DI;
        echo $DF;
    }

    // }
    