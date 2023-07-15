<?php
session_start();
include('opendatabase.php');
$loginName = $_REQUEST['loginname'];
$loginPassword = $_REQUEST['loginpw'];

//Admin Login 

if ($loginName != "" && $loginPassword != "") {
    $selectSql = "SELECT * FROM admin WHERE name='$loginName' AND password='$loginPassword';";
    $result = mysqli_query($conn, $selectSql);
    $checkResult = mysqli_num_rows($result);

    if ($checkResult > 0) {
        $_SESSION["loggedin"]=true;
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["adminName"]=$row['name'];
        }
        header('Location:../html/index.php'); // Corrected header() function calls
    } else {
        header('Location: ../html/login.php'); // Corrected header() function calls
    }
} else {
    header('Location: ../html/login.php'); // Corrected header() function calls * location and ":" not space 
}
?>