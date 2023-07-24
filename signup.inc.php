<?php
    require 'dbh.inc.php';

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
    $coop = isset($_POST['cooperative']) ? $_POST['cooperative'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";


    $sql = "INSERT INTO tb_admin VALUES(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo mysqli_stmt_error($stmt);
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $coop);
    if(!mysqli_stmt_execute($stmt)){
        echo mysqli_stmt_error($stmt);
        exit();
    }
    echo "success";
    header('location: admin_login.php?message=signup-success');

