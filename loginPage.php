<?php
    session_start();

    // Unset the error session variables
    // if(isset($_SESSION["usernameError"]) && isset($_SESSION["passwordError"]))
    // {
    //     unset($_SESSION["usernameError"]);
    //     unset($_SESSION["passwordError"]);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shalin Kulawardane">
    <link rel="stylesheet" href="./css/loginPageStyle.css">
    <title>Login</title>
</head>
<body>
    <!-- The illustration and other supplementary components go here -->
    <section class="box">
        <div>
        </div>
    </section>

    <!-- The form and it's elements -->
    <section class="box">
        <div id="textContainer">
            <h1>Login</h1>
            <p>
                Welcome back!<br>Sign in to your account
            </p>
        </div>
        <form method="post" action="./includes/loginHandler.php">
            <div class="formItem">
                <!-- <h3>
                    <?php
                        if(isset($_SESSION["usernameError"])) {
                            echo $_SESSION["usernameError"];
                        } else {
                            echo "Username";
                        }
                    ?>
                </h3> -->
                <h3>Username</h3>
                <input type="text" name="username" autocomplete="off" required>
            </div>
            <div class="formItem">
                <!-- <h3>
                    <?php
                        if(isset($_SESSION["passwordError"])) {
                            echo $_SESSION["passwordError"];
                        }
                        else {
                            echo "Password";
                        }
                    ?>
                </h3> -->
                <h3>Password</h3>
                <input type="password" name="password" autocomplete="off" required>
            </div>
            <div class="formItem">
                <button type="submit">Login</button>
            </div>
        </form>
    </section>
    <!-- <script src="./javaScript/login.js"></script> -->
</body>
</html>
