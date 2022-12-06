<?php

    require '../dbh.inc.php';

    $new_dWage = $_POST['edit_dWage'];
    $new_cFees = $_POST['edit_cFees'];
    $submitBtn = $_POST['submit'];
    // $salary = $_GET['salary-id'];

    session_start();
    $salary = $_SESSION['salary-id'];
    session_destroy();

    if(isset($submitBtn)){

        $sql = "UPDATE tb_salary_report SET basic_salary = '$new_dWage', canteen_fees = '$new_cFees'  WHERE salary_id = '$salary'";
        $sql_run = mysqli_query($conn, $sql);

    } 