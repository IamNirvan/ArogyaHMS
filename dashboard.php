<?php 
require $_SERVER["DOCUMENT_ROOT"]."/1_HND/HMS/includes/database/queryHandler.php";
session_start(); 

function renderTable($columnNames, $attributes, $query) {
    
    // Display the table headings
    echo '
    <form method="post" action="'.$_SERVER["PHP_SELF"].'" class="table">
        <div class="header">';
            // <div> ID </div>
            // <div> Date </div>
            // <div> Start </div>
            // <div> Finish </div>
            // <div> Patient </div>
            // <div> Employee </div>

            for($i = 0; $i < count($columnNames); $i++) {
                echo "<div>".$columnNames[$i]."</div>";
            }

        echo '</div>';

    $r = handleSelectQuery($query);

    if($r != false) {

        $count = 0; 
        while($result = mysqli_fetch_assoc($r)) {
            echo '<div class="record">';
    
                for($x = 0; $x < count($attributes); $x++) {
                    echo '<div>'.$result[$attributes[$x]].' </div>';
                }
        
            $count++;
        echo '</div> ';  
    
        }
        echo '</form>';
    }

}
?>

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
    <section id="container">
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
                <div>
                    <h3>Hello, </h3><?php echo $_SESSION["loggedUser"];?><br>
                    <a href="./includes/logoutHandler.php">Logout</a>
                </div>
                <!-- <div>
                    <img src="./images/profile/image1.jpg" alt="image">
                </div> -->
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
                    <div class="value">
                        <?php 
                            echo mysqli_fetch_assoc(handleSelectQuery("SELECT COUNT(patientID) FROM patient;"))["COUNT(patientID)"]; 
                        ?>
                    </div>    
                    <div class="boxHeading"><h3>Number of patients</h3></div>
                    
                </div>
            
                <div class="boxItem">
                    <div class="value">
                        <?php 
                            echo mysqli_fetch_assoc(handleSelectQuery("SELECT COUNT(roomID) FROM room;"))["COUNT(roomID)"]; 
                        ?>
                    </div>
                    <div class="boxHeading"><h3>Number of available rooms</h3></div>
                </div>
            
                <div class="boxItem">
                    <div class="value">
                        <?php 
                            echo mysqli_fetch_assoc(handleSelectQuery("SELECT COUNT(appointmentID) FROM appointment;"))["COUNT(appointmentID)"];
                        ?>
                    </div>
                    <div class="boxHeading"><h3>Number of appointments</h3></div>
                </div>
            
                <div class="boxItem">
                    <div class="value">
                        <?php 
                            echo mysqli_fetch_assoc(handleSelectQuery("SELECT COUNT(operatingRoomID) FROM operatingRoom;"))["COUNT(operatingRoomID)"]; 
                        ?>
                    </div>
                    <div class="boxHeading"><h3>Available operating rooms</h3></div>
                </div>
                
                <div class="boxItem">
                    <div class="value">
                        <?php 
                            echo mysqli_fetch_assoc(handleSelectQuery("SELECT COUNT(employeeID) FROM employee;"))["COUNT(employeeID)"]; 
                        ?>
                    </div>
                    <div class="boxHeading"><h3>Total employee count</h3></div>
                </div>
            </div>

            <div id="informationBox">
                <!-- This div allows for OR booking records to be viewed -->
                <div class="informationBoxItem">
                    <div class="title">
                        <h3>Today's appointments</h3>
                    </div>
                    <div class="content">
                        <?php 
                            $columnNames =  array("ID", "Date", "Start", "End", "Patient ID", "Employee ID");
                            $attributes = array("appointmentID", "bookedDate", "startTime", "endTime", "patientID", "employeeID");
                            renderTable($columnNames, $attributes, "SELECT * FROM appointment;") ?>
                    </div>
                </div>

                <!-- This div allows for appointment records to be viewed -->
                <div class="informationBoxItem">
                    <div class="title">
                        <h3>Operating room bookings</h3>
                    </div>
                    <div class="content">
                        <?php 
                            $columnNames =  array("ID", "Date", "Start", "End", "OR ID");
                            $attributes = array("operatingRoomScheduleID", "bookedDate", "startTime", "endTime", "operatingRoomID");
                            renderTable($columnNames, $attributes, "SELECT * FROM operatingroomschedule;") ?>
                    </div>
                </div>

                <!-- This div allows for appointment records to be viewed -->
                <div class="informationBoxItem">
                    <div class="title">
                        <h3>Title</h3>
                    </div>
                </div>

                <!-- This div allows for appointment records to be viewed -->
                <div class="informationBoxItem">
                    <div class="title">
                        <h3>Title</h3>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- <footer>
        <p>Protected by Copyright &copy; 2022</p>
    </footer> -->

    
</body>

<?php
    }
?>

</html>