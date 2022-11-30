<?php

include '../../dbh.inc.php';

// fetch records
$sql = "select emp_id FROM tb_employee";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
?>