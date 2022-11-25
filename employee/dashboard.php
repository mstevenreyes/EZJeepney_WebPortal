<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Dashboard</title>
</head>
<body>

    <!-- navbar + sidebar included in another file for all pages -->

    <?php
        include 'navbar-sidebar.php';

        function getMonthName($date)
        {
            $monthName = '';
            $month = $date;
            switch($month){
                case '01':
                    $monthName = 'January';
                    break;
                case '02':
                    $monthName = 'February';
                    break;
                case '03':
                    $monthName = 'March';
                    break;
                case '04':
                    $monthName = 'April';
                    break;
                case '05':
                    $monthName = 'May';
                    break;
                case '06':
                    $monthName = 'June';
                    break;
                case '07':
                    $monthName = 'July';
                    break;
                case '08':
                    $monthName = 'August';
                    break;
                case '09':
                    $monthName = 'September';
                    break;
                case '10':
                    $monthName = 'October';
                    break;
                case '11':
                    $monthName = 'November';
                    break;
                case '12':
                    $monthName = 'December';
                    break;
                default:
                    $monthName = 'Invalid';
            }
            return $monthName;
        }
    ?>


    <!--main dashboard-->

    <main>
    
        <div class="index-dashboard-container">
            <div class="card total2">
                <div class="info">
                    <div class="info-detail">
                        <h3>480BBZ</h3>
                        <p>Assigned Jeepney Today</p>
                    </div>
                    <div class="info-image">
                        <i class="fa fa-bus"></i>
                    </div>
                </div>
            </div>
            <div class="card total3">
                <div class="info">
                    <div class="info-detail">
                        <h3>1</h3>
                        <p>Leave Taken</p>
                    </div>
                    <div class="vl"></div>
                    <div class="info-detail">
                        <h3>9</h3>
                        <p>Remaining</p>
                    </div>   
                </div>
                <div class="info-detail">
                    <button>Apply Leave</button>
                </div>
            </div>
            <div class="card total4">
                <div class="info">
                    <div class="info-detail">
                        <h3>1</h3>
                        <p>Present</p>
                    </div>
                    <div class="vl"></div>
                    <div class="info-detail">
                        <h3>2</h3>
                        <p>Absences</p>
                    </div>   
                </div>
                <div class="info-detail">
                    <a href="attendance.php">
                        <button>View Attendance Records</button>
                    </a>
                </div>
            </div>

           
        </div>

        <div class="index-dashboard-container2">
            <h3>Special Non-Working Holidays</h3>
            <div class="grid-container">
                <div class="grid">February 1 : Chinese Lunar New Year</div>
                <div class="grid">February 25 : EDSA People Power Revolution Anniversary</div>
                <div class="grid">April 16 : Black Saturday (Holy Week)</div>
                <div class="grid">May 9 : Election Day</div>
                <div class="grid">August 21 : Ninoy Aquino Day</div>
                <div class="grid">October 31 : Eve of All Saints' Day</div>
                <div class="grid">November 1 : All Saints' Day</div>
                <div class="grid">December 8 : Feast of the Immaculate Conception of Mary</div>
            </div>
            <br>
            <h3>Special Working Holidays</h3>
            <div class="grid-container">
                <div class="grid">November 2 : All Souls' Day</div>
                <div class="grid">December 24 : Christmas Eve</div>
                <div class="grid">December 31 : New Year's Eve</div>
            </div>
        </div>
            <div class="eom-card">
                <div class="eomcardu" data-label="<?php echo $date = getMonthName(date('m')); ?>">
                    <div class="info-detail">
                        <img style="width: 122px;
                                            height: 113px;
                                            object-fit: cover;
                                            border-radius: 10%;" src="./employee_images/eoftm/eoftm.png" id="img3" alt="">
                        <h3>Jane Doe</h3>
                        <p>PAO</p>
                        <h1>Best Employee of this Month</h1>
                    </div>
                  </div>
                </div>
                </div>
            
             
        
    </main>

</body>
</html>
