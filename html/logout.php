<?php
 session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['studentName']);
    header('location: ../html/login.php');

?>