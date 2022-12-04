<?php
session_start();

if(isset($_SESSION["loggedUser"])) {
    session_destroy();
    header("Location: ../loginPage.php");
}