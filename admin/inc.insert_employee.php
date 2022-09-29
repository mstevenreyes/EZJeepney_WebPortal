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
        if(!mysqli_stmt_prepare($stmt, $sql)){
            // echo "ERROR: " . mysqli_error($conn);
            header('location: a_emp_list.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", 
        $reqType, $reqDate, $installDate, $distCenter, 
        $storeCode, $storeName, $address, $openingDate,
        $longitude, $latitude, $financeCode, $projectCost, $depositStatus,
        $banknameSource, $accountnumSource,
        $banknameDest, $accountnumSource, $refNumber, $depositDate);
        if(!mysqli_stmt_execute($stmt)){
            echo "ERROR: " . mysqli_error($conn);
            header('location: r_newstore.php?error=stmtfailed');
            exit();
        }
        header('location:r_newstore.php?success');
    }

  