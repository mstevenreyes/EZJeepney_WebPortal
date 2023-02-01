<?php
include '../../dbh.inc.php';
// Data From AJAX via Javascript
$data = isset($_POST['data']) ? json_decode($_POST['data'], true) : 0;
$startDate = isset($_POST['StartDate']) ? $_POST['StartDate'] : 0;
$EndDate = isset($_POST['EndDate']) ? $_POST['EndDate'] : 0;
$command = isset($_POST['command']) ? $_POST['command'] : 0;


// echo $dateStart;

switch($command){
    // command to execute for generating total expense
    case "generate-total-expense":
        
        $stmt = "SELECT maintenance_cost, date_issued FROM tb_maintenance WHERE date_issued >= '$startDate' && date_issued <= '$EndDate';";
        $query = mysqli_query($conn, $stmt);
        $result = 0;
        while ($row = mysqli_fetch_array($query)){
            $result = $result + $row['maintenance_cost'];
        }

        echo json_encode($result);
       
        break;
}