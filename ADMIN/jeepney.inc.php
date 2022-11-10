<?php

    function addJeepney($conn, $plate_num, $route){

        $sql = "INSERT INTO tb_jeepney (plate_number, jeepney_route) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn); // prepare connection
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('location: jeepney.inc.php?error=stmtfailed');
                exit();
            }
        mysqli_stmt_bind_param($stmt, "ss", $plate_num, $route); // bind variables
        mysqli_stmt_execute($stmt); // execute connection
        header('location: a_jeepney.php?success');
    }

    function JExists($conn, $plate_num, $route){

        $sql = 'SELECT * FROM tb_jeepney WHERE plate_number = ?;';
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: jeepney.inc.php?error=stmtfailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $plate_num);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            exit();
        }
        else{
            addJeepney($conn, $plate_num, $route);
        }
    }

    if(isset($_POST['submit'])){
        $plate_num = $_POST['plateNum'];
        $route = $_POST['Route'];

        require '../dbh.inc.php';
        JExists($conn, $plate_num, $route);
    }    
?>