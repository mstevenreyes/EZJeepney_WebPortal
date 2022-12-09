<?php

    require '../dbh.inc.php';

    // $nDays = $_POST['editDays'];
    // $new_dWage = $_POST['edit_dWage'];
    // $new_cFees = $_POST['edit_cFees'];
    $npagibig = $_POST['pagibig'];
    $nphealth = $_POST['phealth'];
    $nSSS = $_POST['sss'];
    $n_cFees = $_POST['cfees'];
    $submitBtn = $_POST['submit'];

    if($npagibig === '0' || !empty($npagibig )){
        echo "is of zero value";
    }
    else
        echo "is empty";

    session_start();
    $salary = $_SESSION['salary-id'];

    // $newGross = $new_dWage * $nDays;

    // if(isset($submitBtn)){

    //     $sql = "UPDATE tb_salary_report SET basic_salary = '$new_dWage', grosspay = '$newGross'  WHERE salary_id = '$salary'";
    //     $sql_run = mysqli_query($conn, $sql);

    // } 

    // if(isset($submitBtn)){
    //     $sql = "UPDATE tb_salary_report 
    //         SET pagibig = '$npagibig', philhealth = '$nphealth',
    //         sss = '$nSSS', canteen_fees = '$n_cFees'
    //         WHERE salary_id = '$salary'";
    //     $sql_run = mysqli_query($conn, $sql);
    // }