<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shalin Kulawardane">
    <link rel="stylesheet" href="./css/dashboardStyle.css">
    <title>Dashboard</title>
</head>

<?php
    if(isset($_SESSION["loggedUser"])) {
?>

<body>
    <section class="box">
        <nav id="navigation">
            <ul>
                <li><a href="">
                    <div class="itemBox">
                        <div id="imageBox1"></div>
                        Dashboard
                    </div>
                </a></li>
                <li><a href="">
                    <div class="itemBox">
                        <div id="imageBox2"></div>
                        Patients
                    </div>
                </a></li>
                <li><a href="">
                    <div class="itemBox">
                        <div id="imageBox3"></div>
                        employees
                    </div>
                </a></li>
                <li><a href="">
                    <div class="itemBox">
                        <div id="imageBox4"></div>
                        Operating room bookings
                    </div>
                </a></li>
                <li><a href="">
                    <div class="itemBox">
                        <div id="imageBox5"></div>
                        Appointments
                    </div>
                </a></li>
                <li><a href="">
                    <div class="itemBox">
                        <div id="imageBox6"></div>
                        Invoices
                    </div>
                </a></li>
            </ul>
        </nav>
        <div id="userAccount">
            <h3>Hello,</h3>Username
        </div>
    </section>
    
    <!-- This box will contain the necessary information that must be displayed, etc... -->
    <section class="box">
        <!--
            Number of available normal rooms
            Number of available operating rooms
            Number of pending appointments for the day
            Number of patients
            Number of out-of-order rooms
        -->

        <!-- This div is for the greeting and to display various information -->
        <div id="landscapeBox">
            <div class="boxItem">
                <h3>Number of patients</h3>
                <div class="value">#</div>
            </div>
        
            <div class="boxItem">
                <h3>Number of available rooms</h3>
                <div class="value">#</div>
            </div>
        
            <div class="boxItem">
                <h3>Number of appointments</h3>
                <div class="value">#</div>
            </div>
        
            <div class="boxItem">
                <h3>Available operating rooms</h3>
                <div class="value">#</div>
            </div>
        </div>

        <div id="informationBox">
            <!-- This div allows for OR booking records to be viewed -->
            <div class="informationBoxItem">
                
            </div>

            <!-- This div allows for appointment records to be viewed -->
            <div class="informationBoxItem">
                
            </div>
        </div>
    </section>
</body>

<?php
    }
?>

</html>