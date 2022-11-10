<?php


    require '../dbh.inc.php';

    // POST VARIABLES

    $empSurname = $_POST['emp_surname'];
    $empFirstname = $_POST['emp_firstname'];
    $empType = $_POST['emp-type'];
    $submitBtn = $_POST['submit'];
    $tablename = "tb_employee";

    if(isset($submitBtn)){
        $sql = "INSERT INTO $tablename(emp_type, emp_pword, emp_surname, emp_firstname) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn, $sql);
        if(!mysqli_stmt_prepare($stmt)){
            die("Error")
        }
    }

  