<?php 
include('opendatabase.php');



//take out all stend from database
function getAllData($table){
    global $conn;
    $sql="SELECT * FROM student";
    $sqlrun=mysqli_query($conn,$sql);
   
    return $sqlrun;
}

//take out all transaction which id=$tid from database
function getAllInTrans($table){
    global $conn;
    global $student_id;
    global $tid;
    $sql="SELECT * FROM transaction WHERE st_id='$student_id' AND t_situation='Cash In';";
    $sqlrun=mysqli_query($conn,$sql);
   
    return $sqlrun;
}
function getAllOutTrans($table){
    global $conn;
    global $student_id;
    global $tid;
    $sql="SELECT * FROM transaction WHERE st_id='$student_id' AND t_situation='Cash Out';";
    $sqlrun=mysqli_query($conn,$sql);
   
    return $sqlrun;
}


if(isset($_GET['st_id'])){
    $studentid=$_GET['st_id'];
//take out selected data with st_id
function getSelectedData($table){
    global $conn;
    global $studentid;
    $sql="SELECT * FROM student WHERE st_id='$studentid';";
    $sqlrun=mysqli_query($conn,$sql);
   
    return $sqlrun;
}
}

function getAllEditTrans($table){
    global $conn;
    $student_id=$_SESSION['edit_sid'];
    global $tid;
    $sql="SELECT * FROM transaction WHERE st_id='$student_id';";
    $sqlrun=mysqli_query($conn,$sql);
    unset($_SESSION['edit_sid']);
    return $sqlrun;
}


//fetch selected tid
function getSelectedTrans($table){
    global $conn;
    global $transId;
    $sql="SELECT * FROM transaction WHERE t_id='$transId';";
    $sqlrun=mysqli_query($conn,$sql);
   
    return $sqlrun;
}
function outputAmount($table){
    $stid=$_SESSION['stuId'];
    global$conn;
    $sql="SELECT st_amount FROM student WHERE st_id='$stid'; ";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
    $Am=mysqli_fetch_assoc($sqlrun);
    $result=(int)$Am['st_amount'];
    return $result;}
    else{
        return false;
    }
}
function outputUsed($table){
    $sid=$_SESSION['stuId'];
    global$conn;
    $sql="SELECT st_used FROM student WHERE st_id='$sid'; ";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
    $Use=mysqli_fetch_assoc($sqlrun);
    $result=(int)$Use['st_used'];
    return $result;}
    else{
        return false;
    }
}
function deleteAmount($table){
    $stid=$_SESSION['dStuId'];
    global$conn;
    $sql="SELECT st_amount FROM student WHERE st_id='$stid'; ";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
    $Am=mysqli_fetch_assoc($sqlrun);
    $result=(int)$Am['st_amount'];
    return $result;}
    else{
        return false;
    }
}
function deleteUsed($table){
    $sid=$_SESSION['dStuId'];
    global$conn;
    $sql="SELECT st_used FROM student WHERE st_id='$sid'; ";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
    $Use=mysqli_fetch_assoc($sqlrun);
    $result=(int)$Use['st_used'];
    return $result;}
    else{
        return false;
    }
}
?>

