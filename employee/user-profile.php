<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>User Profile</title>
</head>
<body>

      <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';
    ?>

    <!--main dashboard-->

    <main>
        <div class="compinfo-container">
             <div class="card detail">
                    <div class="detail-header">
                        <h2>User Profile</h2>
                    </div>
                    <div class="compform">
                        <div class="input box0">
                            <img style="border:1px solid #201f2b;
                                            width: 122px;
                                            height: 113px;
                                            object-fit: cover;
                                            margin-left: 78px;
                                            border-radius: 10px;" src="<?php echo 'employee_images/' . $empID ?>.png" id="img3" alt="">
                            </div>
                            <div class="input box1">
                                <!-- Note: PHP Variables located in navbar-sidebar.php -->
                                <span class="details">Employee Name: <u><i><?php echo $empFirstname . ' ' . $empSurname ?></i></u> </span>
                            </div>
                        <div class="input box4">
                            <span class="details">Birthday: <u><i><?php echo $empBirthday ?></i></u></span>
                        </div>
                        <div class="input box5">
                            <span class="details">Address: <u><i><?php echo $empAddress ?></i></u></span>
                        </div>
                        <div class="input box6">
                            <span class="details">Gender: <u><i><?php echo $empGender ?></i></u></span><br><br>
                        </div>
                        
                    </div>
                </div>
            </form>

        </div>
    </main>
</body>
</html>
