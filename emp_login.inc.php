<?php 

function uIDExists($conn, $username){
    $sql = 'SELECT * FROM `tb_employee` WHERE emp_id = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: emp_login.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
}

function loginFaculty($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username);
    if($uidExists === false){
        header('location: emp_login.php?error=usernotexists');
        exit();
    }
    $pwdHashed = $uidExists['emp_pword'];
    $pwd_check = password_verify($pwd, $pwdHashed);

    
    if($pwd_check){
        session_start();
        $_SESSION['emp-id'] = $uidExists['emp_id'];
        header('location: ./employee/dashboard.php');
    }else{
    
        header('location: emp_login.php?error=wronglogin');
        exit();
    }
}
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    require 'dbh.inc.php';
    loginFaculty($conn, $username, $pwd);
}else{
    header('location: emp_login.php?error=invalidentry');
}