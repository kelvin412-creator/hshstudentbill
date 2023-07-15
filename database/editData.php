<?php
include('../html/edit.php');
include('opendatabase.php');
require_once('function.php');

$currentTr=$_SESSION['currentT'];
$currentTrs=(int)$currentTr;
global $tAmount;
// Update the 'transaction' table
if(isset($_POST['tsubmit'])){
    $situation=$_REQUEST['situation'];
    $date=$_REQUEST['tDate'];
    $detail=$_REQUEST['tDetail'];
    $amount=$_REQUEST['tAmount'];
    $tAmount=(int)$amount;
    $tid=$_SESSION['tID'];//session from edit.php
    $stId=$_SESSION['stuId'];//session from edit.php

    if ($situation=="Cash In") {
        if($tAmount != $currentTrs){
            $collect = outputAmount('slectedOutputAmount');
            $edit=(int)$tAmount-$currentTrs;
            $totalA=(int)$collect+$edit;
            $sql1 = "UPDATE student SET st_amount='$totalA' WHERE st_id='$stId';";
            $sqlrun1 = mysqli_query($conn, $sql1);
            $sql2 = "UPDATE transaction SET t_situation='$situation', t_date='$date', t_detail='$detail', t_amount='$amount' WHERE t_id='$tid';";
            $sqlrun2 = mysqli_query($conn, $sql2);
            if ($sqlrun1 && $sqlrun2) {
                header('location:../html/detail.php?st_id='.$stId."hgfghf");
                unset($_SESSION['stuId']);
                exit;
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }
 
        }   
            
        
        else{
            $sql2 = "UPDATE transaction SET t_situation='$situation', t_date='$date', t_detail='$detail', t_amount='$amount' WHERE t_id='$tid';";
            $sqlrun2 = mysqli_query($conn, $sql2);
            if ($sqlrun2) {
                header('location:../html/detail.php?st_id='.$stId);
                unset($_SESSION['stuId']);
                exit;
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }
        }
     
    }

    elseif($situation=="Cash Out"){
        
        if($tAmount != $currentTrs){
            $collect = outputUsed('slectedOutputUsed');
            $uEdit=(int)$tAmount-$currentTrs;
            $totalU=(int)$collect+$uEdit;
            $sql1 = "UPDATE student SET st_used='$totalU' WHERE st_id='$stId';";
            $sqlrun1 = mysqli_query($conn, $sql1);   
            $sql2 = "UPDATE transaction SET t_situation='$situation', t_date='$date', t_detail='$detail', t_amount='$amount' WHERE t_id='$tid';";
            $sqlrun2 = mysqli_query($conn, $sql2);
            if ($sqlrun1 && $sqlrun2) {
                header('location:../html/detail.php?st_id='.$stId."dfgdf".$recieve);
                unset($_SESSION['stuId']);
                exit;
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }
 
        }     
               
        
        else{
            $sql2 = "UPDATE transaction SET t_situation='$situation', t_date='$date', t_detail='$detail', t_amount='$amount' WHERE t_id='$tid';";
            $sqlrun2 = mysqli_query($conn, $sql2);
            if ($sqlrun2) {
                header('location:../html/detail.php?st_id='.$stId);
                unset($_SESSION['stuId']);
                exit;
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }
        }
              
    }
  
 
        }   



 if(isset($_POST['stsubmit'])){
    
            $studentName=$_REQUEST['studentName'];
            $StudentPhone=$_REQUEST['studentPhone'];
            $TotalAmount=$_REQUEST['totalAmount'];
            $TotalUsed=$_REQUEST['totalUsed'];
            $TotalBorrow=$_REQUEST['totalBorrow'];
            $sID=$_SESSION['editStuId'];  
                $sql="UPDATE student SET st_name='$studentName',st_phone='$StudentPhone',st_amount='$TotalAmount',st_used='$TotalUsed',st_borrow='$TotalBorrow' WHERE st_id='$sID';";
                $sqlrun=mysqli_query($conn,$sql);
                if($sqlrun){
                        
                    header('location:../html/add.php?st_id='.$sID);
                    unset($_SESSION['editStuId']);
                    exit;
                }
                else {
                    echo "Error updating data: " . mysqli_error($conn);
                }
            
            }
            
                
            
                
                
?>
