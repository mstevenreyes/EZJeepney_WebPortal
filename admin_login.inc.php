<?php 

function uIDExists($conn, $username){
    $sql = 'SELECT * FROM `tb_admin` WHERE admin_id = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: admin_login.php?error=stmtfailed');
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
        header('location: admin_login.php?error=usernotexists');
        exit();
    }
    $pwdHashed = $uidExists['admin_pword'];

    $pwd_check = password_verify($pwd, $pwdHashed);

    if($pwd_check){
        session_start();
        $_SESSION['admin-id'] = $uidExists['admin_id'];
        $_SESSION['admin-pword'] = $uidExists['admin_pword'];
        header('location: ./admin/a_dashboard.php');
        exit();
    }else{
    
        header('location: admin_login.php?error=wronglogin');
        exit();
    }
}
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    require 'dbh.inc.php';
    loginFaculty($conn, $username, $pwd);
}else{
    header('location: admin_login.php?error=invalidentry');
}