<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Attendance Records</title>
</head>
<body>

    <!--header or navbar-->

     <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';
    ?>

    <main>

            <!--attendance rec-->

            <div class="card detail">
                <div class="detail-header">
                    <h2>Attendance Records</h2>
                </div>


                <table>
                    <tr>
                        <th>Date</th>
                        <th>Time-In</th>
                        <th>Time-Out</th>
                    </tr>
                        <?php
                            $sql = "SELECT * FROM tb_attendance_sheet WHERE emp_id = 'DR-00001'";
                            $query = mysqli_query($conn, $sql);
                            while($result = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo date('l, F d', strtotime($result['attendance_date']));  ?></td>
                            <td><?php echo date('h:i A', strtotime($result['time_in'])); ?></td>
                            <td><?php echo date('h:i A', strtotime($result['time_out'])); ?></td>
                        </tr>
                        <?php } ?>

                </table>
               

            </div>
            
            <br>
                <!--absences/leaves rec-->

            <div class="card detail">
                <div class="detail-header">
                    <h2>Absences/Leaves Records</h2>
                </div>


                <table>
                    <tr>
                        <th>Leaves Application Date</th>
                        <th>Status</th>
                    </tr>
                
                        <tr>
                            <?php 
                            $sql="SELECT * FROM tb_employee_leaves WHERE emp_id = '$empID'";
                            $query2 = mysqli_query($conn, $sql); 
                            while($result = mysqli_fetch_array($query2)){
                            ?>  
                            <td><?php echo date('F d Y', strtotime($result['apply_date']));  ?></td>
                            <td><?php echo $result['leave_status']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                </table>
               

            </div>
        </div>
    </main>

</body>
</html>
