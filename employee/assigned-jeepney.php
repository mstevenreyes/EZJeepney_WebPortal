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
                    <tr>
                        <th>Employee ID</th>
                        <th>Schedule</th>
                        <th>Jeepney Unit</th>
                    </tr>
                
                        <tr>
                            <td>DR-00001</td>
                            <td>October 21, 2022</td>
                            <td>480BBZ</td>
                        </tr>

                </table>
               

            </div>
        </div>
    </main>

</body>
</html>
