<?php

include('opendatabase.php');
include('../html/detail.php');


if(isset($_GET['st_id'])){
    $studentId=$_GET['st_id'];
    
    $sql="DELETE FROM student WHERE st_id='$studentId';";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
        header('location:../html/delete.php');
    }
}



require_once('function.php');
global $dAmount;
if(isset($_SESSION['dTrsId'])){
    $dTid=$_SESSION['dTrsId']; // get id from detail.php
    $sql="SELECT t_situation,t_amount FROM transaction WHERE t_id='$dTid';";
    $sqlrun=mysqli_query($conn,$sql);
    $dres=mysqli_fetch_assoc($sqlrun);
    $dSit=$dres['t_situation'];
    $dAm=(int)$dres['t_amount'];
    $dStu=$_SESSION['dStuId'];//student id session from detail.php
   
    if ($dSit=="Cash In") {
            $recieve= deleteAmount('OutputAmount');
            $totalA=(int)$recieve-$dAm;
            $sql1 = "UPDATE student SET st_amount='$totalA' WHERE st_id='$dStu';";
            $sqlrun1 = mysqli_query($conn, $sql1);
            
    }

    else{
            $recieve = deleteUsed('OutputUsed');
            $totalU=(int)$recieve-$dAm;   
            $sql1 = "UPDATE student SET st_used='$totalU' WHERE st_id='$dStu';";
            $sqlrun1 = mysqli_query($conn, $sql1);
           
              
    }
    $sql2 = "DELETE FROM transaction WHERE t_id='$dTid';";
            $sqlrun2 = mysqli_query($conn, $sql2);
            if ($sqlrun1 && $sqlrun2) {
                header('location:../html/detail.php?st_id='.$dStu);
                unset($_SESSION['dTrsId']);
                unset($_SESSION['dStuId']);
                exit;
            } else {
                echo "Error deleting data: " . mysqli_error($conn);
            }
 
        }   
?>
