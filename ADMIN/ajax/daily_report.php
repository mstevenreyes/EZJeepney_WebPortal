<?php

    require('../../dbh.inc.php');
    // echo $_POST['mydata'], $_POST['command'];
    $data =  json_decode($_POST['mydata'], true);
    $command = isset($_POST['command']) ? $_POST['command'] : "";
    switch($command) 
    {
        case "add-report":
            // Insertion of daily report
            $sql = "INSERT INTO tb_daily_report(emp_id, report_date) VALUES (?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "ERROR:";
                exit();
            }
            mysqli_stmt_bind_param($stmt, "ss", $data['emp-id'], $data['report-date']);
            if(!mysqli_stmt_execute($stmt)){
                echo "ERROR: " . mysqli_error($conn);
                exit();
            }
            
            $sql = "SELECT * FROM tb_daily_report ORDER BY daily_report_id DESC LIMIT 1";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            $reportId =  $result['daily_report_id'];
            // Insertion of daily report items
            $i = 1;
            while(true){
                if(!isset($data['item-description-' . $i])){
                    break;
                }
                $sql = "INSERT INTO tb_daily_report_items (daily_report_id, item_description, item_type, amount) VALUES(?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "ERROR: " . mysqli_error($conn);
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "sssi", $reportId, $data['item-description-' . $i], $data['item-type-' . $i], $data['amount-' . $i]);
                if(!mysqli_stmt_execute($stmt))
                {
                    echo "ERROR: " . mysqli_error($conn);
                    exit();
                }
                $i++;
            }
            echo 'SUCCESS';
    }
  
