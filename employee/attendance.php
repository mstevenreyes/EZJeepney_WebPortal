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
                        <th>Attendance ID</th>
                        <th>Date</th>
                        <th>Time-In</th>
                        <th>Time-Out</th>
                    </tr>
                
                        <tr>
                            <td>123456</td>
                            <td>September 28, 2022</td>
                            <td>8:00am</td>
                            <td>8:00pm</td>
                        </tr>

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
                        <th>Absences</th>
                        <th>Status</th>
                    </tr>
                
                        <tr>
                            <td>September 26, 2022</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>September 27, 2022</td>
                            <td>Paid Leave</td>
                        </tr>

                </table>
               

            </div>
        </div>
    </main>

</body>
</html>
