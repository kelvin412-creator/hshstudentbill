<?php
session_start();
include('opendatabase.php');
//Admin Register
    $name=$_REQUEST['name'];
    $password=$_REQUEST['pw'];
    $repassword=$_REQUEST['rpw'];
    $phone=$_REQUEST['phno'];
//check passwords match or not

    $selectSql = "SELECT * FROM admin WHERE name='$name' AND password='$password';";
    $result = mysqli_query($conn, $selectSql);
    $checkResult = mysqli_num_rows($result);

    if ($checkResult == 0) {

    if($password==$repassword && $username!="" && $password!="" && $repassword!="" && $phone!=""){
        
 //insert into database

        $sql="INSERT INTO admin (`name`, `password`, `phone`) VALUES ('$name', '$password', '$phone');";
        
        if(mysqli_query($conn, $sql)){
            $_SESSION["message"]="Registered Successfully";
            header('location: ../html/login.php');
        }
        else{
            echo mysqli_error($conn);
            $_SESSION["message"]="Registered Fail";
            header('location: ../html/register.php');
        }
       }
    
    else{
        $_SESSION["message"]="Passwords not match";
        header('location: ../html/register.php');
    }  
 }
    else{
        $_SESSION["message"]="Already registered";
        header('location: ../html/register.php');
    }
$mysqli -> close();
?>

