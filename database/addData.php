<?php
include('opendatabase.php');
require_once('function.php');
session_start();

//add student
if(isset($_POST['addstsubmit'])){
$studentName=$_REQUEST['studentName'];
$studentPhone=$_REQUEST['studentPhone'];
$studentAmount=$_REQUEST['totalAmount'];

$sql="INSERT INTO student (`st_name`, `st_phone`, `st_amount`) VALUES ('$studentName', '$studentPhone', '$studentAmount');";
$sqlrun=mysqli_query($conn,$sql);
if($sqlrun){
    header('location:../html/add.php');
}
}

//add Transaction
if(isset($_POST['addTsubmit'])){
    global $conn;
    $situation=$_REQUEST['situation'];
    $date=$_REQUEST['tDate'];
    $detail=$_REQUEST['tDetail'];
    $amount=$_REQUEST['tAmount']; //transaction Amount
    $addAmount=(int) $amount;   // convert into int
    $sid=$_SESSION['trStuId'];  // session from addtrans.php

    if($situation=="Cash In")//if situation is cashin 
    {
        $sql="SELECT st_amount FROM student WHERE st_id='$sid';";
        $sqlrun=mysqli_query($conn,$sql);
        if($sqlrun){
            $stRow=mysqli_fetch_assoc($sqlrun);
            $stAmount=(int)$stRow['st_amount'];
            $total=(int)$stAmount+$addAmount;

        }
        $sql1="UPDATE student SET st_amount='$total' WHERE st_id='$sid';"; // update the student Amount again
        $sqlrun1=mysqli_query($conn,$sql1);
      }
      else //or situation is cashout
      {
        $sql="SELECT st_used FROM student WHERE st_id='$sid';";
        $sqlrun=mysqli_query($conn,$sql);
        if($sqlrun){
            $stUs=mysqli_fetch_assoc($sqlrun);
            $stUse=(int)$stUs['st_used'];
            $total=(int)$stUse+$addAmount;
        }
        $sql1="UPDATE student SET st_used='$total' WHERE st_id='$sid';";// update the student Use again
        $sqlrun1=mysqli_query($conn,$sql1);
        }
    
    
    $sql = "INSERT INTO transaction (`t_situation`, `t_date`, `t_detail`, `t_amount`,`st_id`) VALUES ('$situation', '$date', '$detail', '$amount','$sid')";
    $sqlrun=mysqli_query($conn,$sql);
    
    if($sqlrun){
    header('location:../html/detail.php?st_id='.$sid);
    unset($_SESSION['trStuId']);
    exit;
}
else{
    echo "Something Wrong ".mysqli_error($conn);
}

    }

?>