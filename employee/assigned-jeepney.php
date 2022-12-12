<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Assigned Jeepney</title>
</head>
<body>

    <!--header or navbar-->

     <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';

    ?>

    <main>

            <!--bottom cards-->

            <div class="card detail">
                <div class="detail-header">
                    <h2>Assigned Jeepney Records</h2>
                </div>


                <table>
                    <thead>
                        <th>Batch ID</th>
                        <th>Schedule</th>
                        <th>Jeepney Unit</th>
                        <th>Shift Start</th>
                        <th>Shift End</th>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM tb_schedule_sheet WHERE driver_id = '$empID' OR pao_id = '$empID'";
                            $query = mysqli_query($conn, $sql);
                            while($result = mysqli_fetch_array($query)){
                        ?>                        
                         <tr>
                            <td><?php echo $result['batch_id']; ?></td>
                            <td><?php echo $result['schedule_date']; ?></td>
                            <td><?php echo $result['plate_number']; ?></td>
                            <td><?php echo $result['shift_start']; ?></td>
                            <td><?php echo $result['shift_end']; ?></td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                       

                </table>
               

            </div>
        </div>
    </main>

</body>
</html>
