<?php 

    require 'dbh.inc.php';
    $password = "12345";
    $pwd_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_employee VALUES (2, ?, 'Villavicencio', 'John Vincent');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "FAILED";
    }
    mysqli_stmt_bind_param($stmt, "s", $pwd_hashed);
    mysqli_stmt_execute($stmt);