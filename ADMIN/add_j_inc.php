<?php

    function addJeepney($conn, $plate_num, $s_route, $e_route){

        $sql = "INSERT INTO jeepney_list VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn); // prepare connection
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('location: add_jeepney_inc.php?error=stmtfailed');
                exit();
            }
        mysqli_stmt_bind_param($stmt, "sss", $plate_num, $s_route, $e_route); // bind variables
        mysqli_stmt_execute($stmt); // execute connection
        header('location: add_j.php');
    }

    function JExists($conn, $plate_num, $s_route, $e_route){

        $sql = 'SELECT * FROM jeepney_list WHERE plate_num = ?;';
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: add_j_inc.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $plate_num);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            exit();
        }
        else{
            addJeepney($conn, $plate_num, $s_route, $e_route);
        }
    }

    if(isset($_POST['submit'])){
        $plate_num = $_POST['plateNum'];
        $s_route = $_POST['sRoute'];
        $e_route = $_POST['eRoute'];

        require 'dbh_inc.php';
        JExists($conn, $plate_num, $s_route, $e_route);
    }    
?>