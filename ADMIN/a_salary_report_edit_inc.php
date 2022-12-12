<?php

    require '../dbh.inc.php';
    session_start();
    $salary_ID = $_SESSION['salary-id'];

    
    $submitBtn = $_POST['submit'];

    function getGrossPay($ID){

        require '../dbh.inc.php';

        if(isset($_POST['editDays']) && isset($_POST['edit_dWage'])){
            if(!empty($_POST['editDays'] && !empty($_POST['edit_dWage']))){
                $nDays = $_POST['editDays'];
                $new_dWage = $_POST['edit_dWage'];
                
                $newGross = $new_dWage * $nDays;

                //UPDATE GROSS PAY IN DATABASE
                $sql = "UPDATE tb_salary_report SET days_worked = '$nDays', basic_salary = '$new_dWage', grosspay = '$newGross' WHERE salary_id = '$ID'";
                $sql_run = mysqli_query($conn, $sql);
            }
        }
    }

    function fixedDeductions($ID){

        // FETCH VALUES FROM HTML FORM
        $npagibig = $_POST['pagibig'];
        $nphealth = $_POST['phealth'];
        $nSSS = $_POST['sss'];
        $n_cFees = $_POST['cfees'];
        
        // QUERY TO GET OLD DATA FROM DATABASE
        require '../dbh.inc.php';
        $stmt = "SELECT * FROM tb_salary_report AS tbs LEFT JOIN tb_employee AS tbe 
        ON  tbs.emp_id = tbe.emp_id  WHERE tbs.salary_id = '$ID'";
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

            // UPDATE DATABASE VALUES
            $sql = "UPDATE tb_salary_report SET pagibig = '$npagibig', philhealth = '$nphealth', sss = '$nSSS', canteen_fees = '$n_cFees' WHERE salary_id = '$ID'";
            $sql_run = mysqli_query($conn, $sql);
        }
    }

    function deductions($ID){ //storing non-empty input fetched from html

        require '../dbh.inc.php';

        if(isset($_POST['addNewddc']) && isset($_POST['ddcAmnt'])){
            if(!empty($_POST['addNewddc'] && !empty($_POST['ddcAmnt']))){
                $addNewDdc = $_POST['addNewddc'];
                $addNewAmnt = $_POST['ddcAmnt'];

                //proceeds to insert edited new data to db if input field are not left empty
                $sql = "INSERT INTO tb_deductions VALUES ('$ID', '$addNewDdc', $addNewAmnt)";
                $sql_run = mysqli_query($conn, $sql);
            }
        }

        if(isset($_POST['deductEdit']) && isset($_POST['amntDed'])){
            if(!empty($_POST['deductEdit'] && !empty($_POST['amntDed']))){
                $select_deductionName = $_POST['deductEdit'];
                $deductionAmount = $_POST['amntDed'];
                
                $sql = "UPDATE tb_deductions SET d_amount = '$deductionAmount' WHERE sal_id = '$ID' AND deductions = '$select_deductionName'";
                $sql_run = mysqli_query($conn, $sql);
            }
        }
        
        if(isset($_POST['deductName']) && isset($_POST['ndeductName'])){
            if(!empty($_POST['deductName'] && !empty($_POST['ndeductName']))){
                $old_deductionEdit = $_POST['deductName'];
                $new_deductionEdit = $_POST['ndeductName'];
                
                $sql = "UPDATE tb_deductions SET deductions = '$new_deductionEdit' WHERE sal_id = '$ID' AND deductions = '$old_deductionEdit'";
                $sql_run = mysqli_query($conn, $sql);
            }
        }

        if(isset($_POST['selectDelete'])){
            if(!empty($_POST['selectDelete'])){
                $select_deductionDelete = $_POST['selectDelete'];
                
                $sql = "DELETE FROM tb_deductions WHERE sal_id = '$ID' AND deductions = '$select_deductionDelete'";
                $sql_run = mysqli_query($conn, $sql);
            }
        }
        
    }

    function get_totalOddc($ID){

        //QUERY FOR GETTING SUM OF ALL OTHER DEDUCTIONS FROM tb_deductions
        require '../dbh.inc.php';
        $sql = "SELECT d_amount FROM tb_deductions WHERE sal_id = '$ID'";
        $query_run = mysqli_query($conn, $sql);
        $tot_oDdc = 0;

        while ($num = mysqli_fetch_array ($query_run)) {
            $tot_oDdc += $num['d_amount'];
        }
        return $tot_oDdc;
    }

    function get_totalDdc($ID){
        
        require '../dbh.inc.php';
        $sql = "SELECT * FROM tb_salary_report WHERE salary_id = '$ID'";
        $query_run = mysqli_query($conn, $sql);
        $totalDdc = 0;

        while ($num = mysqli_fetch_array ($query_run)) {
            $totalDdc += $num['canteen_fees'];
            $totalDdc += $num['pagibig'];
            $totalDdc += $num['philhealth'];
            $totalDdc += $num['sss'];
            $totalDdc += $num['canteen_fees'];
        }
        return $totalDdc;
    }

    function totalDeductions($ID, $oDdc, $Ddc){

        require '../dbh.inc.php';
        $total_deductions = $oDdc + $Ddc;
        $sql = "UPDATE tb_salary_report SET tot_exp = '$total_deductions' WHERE salary_id = '$ID'";
        $query_run = mysqli_query($conn, $sql);
    }

    function getNetpay($ID){

        require '../dbh.inc.php';
        $sql = "SELECT grosspay, tot_exp from tb_salary_report WHERE salary_id = '$ID'";
        $query_run = mysqli_query($conn, $sql);

        while ($num = mysqli_fetch_array ($query_run)) {
            $gpay = $num['grosspay'];
            $total_exp = $num['tot_exp'];
        }

        $npay = $gpay - $total_exp;

        // NETPAY IN DATABASE
        $sql = "UPDATE tb_salary_report SET netpay = '$npay' WHERE salary_id = '$ID'";
        $query_run = mysqli_query($conn, $sql);

    }

    // if(isset($submitBtn)){

    //     $sql = "UPDATE tb_salary_report SET basic_salary = '$new_dWage', grosspay = '$newGross'  WHERE salary_id = '$salary'";
    //     $sql_run = mysqli_query($conn, $sql);

    // } 

    if(isset($submitBtn)){

        getGrossPay($salary_ID);
        fixedDeductions($salary_ID);
        deductions($salary_ID);
        $tot_oDdc = get_totalOddc($salary_ID);
        $tot_Ddc = get_totalDdc($salary_ID);
        totalDeductions($salary_ID, $tot_oDdc, $tot_Ddc);
        getNetpay($salary_ID);
    }