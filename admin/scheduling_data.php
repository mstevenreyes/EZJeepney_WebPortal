<?php

include '../dbh.inc.php';

$sql = "SELECT emp_id FROM tb_employee";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
}

$dataset = array(
    "data" => $array
);


echo json_encode($dataset);
?>