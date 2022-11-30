<?php

    require '../dbh.inc.php';

    $oldName = $_POST['edit_item'];
    $newName = $_POST['edit_name'];
    $qty = $_POST['edit_quantity'];
    $submitBtn = $_POST['update'];

    if(isset($submitBtn)){

        $sql = "UPDATE tb_inventory SET item = '$newName', quantity = '$qty' WHERE item = '$oldName'";
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run){
            echo '<script> alert("Data Updated"); </script>';
        }
        else{
            echo '<script> alert("Data Not Updated"); </script>';
        }


        header('location: a_inventory.php?status');
    }
    