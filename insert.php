<?php 

    require 'dbh.inc.php';
    $password = "superadmin123";
    $pwd_hashed = password_hash($password, PASSWORD_DEFAULT);
    echo $pwd_hashed;
    $sql = "INSERT INTO `admin` VALUES ('superadmin', ?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $pwd_hashed);
    mysqli_stmt_execute($stmt);