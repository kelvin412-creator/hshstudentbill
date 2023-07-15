<?php
$servername="localhost";
$username="root@";
$password="";
$dbName="student_bill";

//create connection
$conn=mysqli_connect($servername,$username,$password,$dbName);

//check connection
if($conn->connect_error){
    die("connection failed :" .$conn->connect_error);
};


