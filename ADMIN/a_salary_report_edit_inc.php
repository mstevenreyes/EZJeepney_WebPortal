<?php

    require '../dbh.inc.php';

    // GETTING VALUES FROM HTML FORM
    // $nDays = $_POST['editDays'];
    // $new_dWage = $_POST['edit_dWage'];
    // $new_cFees = $_POST['edit_cFees'];
    $npagibig = $_POST['pagibig'];
    $nphealth = $_POST['phealth'];
    $nSSS = $_POST['sss'];
    $n_cFees = $_POST['cfees'];
    $submitBtn = $_POST['submit'];

    session_start();
    $salary = $_SESSION['salary-id'];

    // QUERY TO GET OLD DATA FROM DATABASE
    $stmt = "SELECT * FROM tb_salary_report AS tbs LEFT JOIN tb_employee AS tbe 
                ON  tbs.emp_id = tbe.emp_id  WHERE tbs.salary_id = '$salary'";
    $run = mysqli_query($conn, $stmt);

    // TO CHECK WHETHER VALUES FETCHED FROM HTML FORMS ARE NOT NULL
    while($result = mysqli_fetch_array($run)){

        if($npagibig === '0' || !empty($npagibig )){
            // $npagibig stays the same;
        }
        else{
            $npagibig = $result['pagibig'];
        }
        
        if($nphealth === '0' || !empty($nphealth)){
            // $phealth stays the same;
        }
        else{
            $nphealth = $result['philhealth'];
        }

        if($nSSS === '0' || !empty($nSSS)){
            // $nsss stays the same;
        }
        else{
            $nSSS = $result['sss'];
        }

        if($n_cFees === '0' || !empty($n_cFees)){
            // $n_cFees stays the same;
        }
        else{
            $n_cFees = $result['canteen_fees'];
        }
    }


    

    // $newGross = $new_dWage * $nDays;

    // if(isset($submitBtn)){

    //     $sql = "UPDATE tb_salary_report SET basic_salary = '$new_dWage', grosspay = '$newGross'  WHERE salary_id = '$salary'";
    //     $sql_run = mysqli_query($conn, $sql);

    // } 

    if(isset($submitBtn)){
        $sql = "UPDATE tb_salary_report 
            SET pagibig = '$npagibig', philhealth = '$nphealth',
            sss = '$nSSS', canteen_fees = '$n_cFees'
            WHERE salary_id = '$salary'";
        $sql_run = mysqli_query($conn, $sql);

        header('location: a_salary_report.php?salary-id='.$salary);
    }