<?php
    require '../dbh.inc.php';
    // POST VARIABLES
    $empSurname = $_POST['emp-surname'];
    $empImage = $_FILES['emp-image']['name'];
    $empImageSource = $_FILES['emp-image']['tmp_name'];
    $empFirstname = $_POST['emp-firstname'];
    $empPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $empType = $_POST['emp-type'];
    $empID = "";
    $submitBtn = $_POST['submit'];
    $tablename = "tb_employee";
    $prefix = "";
    $empDirectory = "";
    $permissions = 0777;

    if(isset($submitBtn)){
        // CHECKS WETHER IF EMPLOYEE TYPE IS DRIVER OR PAO AND ASSIGNS PREFIX
        if(substr($empType, 0, 2) == "DR"){
            $prefix = "DR";
        }else{
            $prefix = "PAO";
        }
        // CHECKS WHAT LAST EMPLOYEE NUMBER IS INSIDE THE DB OF EMPLOYEE TYPE
        $sql = "SELECT emp_id FROM tb_employee WHERE emp_id LIKE '$prefix%'";
        $stmt = mysqli_query($conn, $sql);
        $result2;
        while($result = mysqli_fetch_array($stmt)){
            $result2 = $result['emp_id'];
        }
        // FORMS NEW EMPLOYEE ID
        $empID = $prefix . "-" . str_pad(intval(substr($result2, -5, 5)) + 1, 5, "0", STR_PAD_LEFT);
        // INSERTS UNIQUE EMPLOYEE ID WITH THE DETAILS OF THE EMPLOYEE
        $sql = "INSERT INTO $tablename() VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            // echo "ERROR: " . mysqli_error($conn);
            header('location: a_emp_list.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $empID, $empType, $empPassword, $empSurname, $empFirstname);
        if(!mysqli_stmt_execute($stmt)){
            echo "ERROR: " . mysqli_error($conn);
            header('location: a_emp_list.php?error=stmtfailed');
            exit();
        }
        // RENAMING IMAGE
        $temp = explode(".", $_FILES["emp-image"]["name"]);
        $newfilename =  $empID . '.' . end($temp);
        // MAKES DIRECTORY OF IMAGE AND UPLOADS EMPLOYEE IMAGE TO SERVER
        $empDirectory = "../employee/employee_profiles/{$empID}/" ;
        mkdir(
            $empDirectory, 
            $permissions,
            true
        );
        move_uploaded_file($empImageSource, $empDirectory.$newfilename);

        header('location: a_emp_list.php?success');
    }

  