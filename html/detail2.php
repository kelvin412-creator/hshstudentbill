<?php session_start();
include('../database/function.php');


if(isset($_SESSION["loggedin"])){

}
else{
	header('location: check.php');
}?>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Student Detail Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="../css/detail2.css">
</head>

<body>
<div class="all"><div class="sidebar"><div class="bar1">
	<h2><i class="bi bi-person-check"></i><?php echo $_SESSION["adminName"]?></h2>
</div><div class="bar2"><h1>General</h1><hr>
	<div class="list">
	            <a href="view.php" ><i class="bi bi-view-stacked"></i></i>  View</a>
</div>
    <div class="list">
	<a href="add.php"><i class="bi bi-person-fill-add"></i>  Add or <i class="bi bi-pencil-square"></i> Edit Student</a>
</div>
    <div class="list">
	            <a href="delete.php" ><i class="bi bi-trash3-fill"></i>  Delete Student</a>
</div>
</div></div>
<div class="header">
	<div class="content">
		<div class="header1"><h1>Home Sweet Home <br><div class="job">Students Bill</div></h1>
	<div class="about">
		<a href="index.php">Home</a>
		<a href="register.php">Register</a>
		<a href="login.php">Login</a>
		<a href="logout.php">Logout</a></div>
	</div></div>


<div class="body"><?php  if(isset($_GET['st_id'])) //check the st_id is get or not
	{
			$student_id=$_GET['st_id'];	//if get will store to $student_id
			$_SESSION['studetailID']=$student_id;
			?>
			
			<div class="studentDetail"> <?php 
		$recieve=getSelectedData('selectedStudent');
		if(isset($recieve)){
			while($detail=$recieve->fetch_assoc()){
			?>
			<div class="container">
			<div class="firstBar"><h1><i class="bi bi-person-square"></i> <?=$detail['st_name'];?></h1><p><?=$detail['st_phone'];?></p>
			</div>
			<div class="addbtn"><a href="addtrans.php?st_id=<?=$student_id;?>"><i class="bi bi-plus-circle"></i> Add Transaction</a></div></div>
			<div class="secondBar">
			   <div class="b1"><h3> <i class="bi bi-coin"></i> 汇/总存款: <?=$detail['st_amount'];?> Kyats</h3></div>
			   <div class="b2"><h3><i class="bi bi-box-arrow-right"></i> 总用额: <?=$detail['st_used'];?> Kyats</h3></div>
			   <div class="b3"><h3> <i class="bi bi-dash-circle"></i> 剩余存款: <?php $total=(int)$detail['st_amount'];$use=(int)$detail['st_used'];echo $total-$use;?> Kyats</h3></div>		 
		   </div>
	   </div>
	   <div> </div>
   <?php }
   }
    else {

   } ?>
   <div class="cashBtn"><a class="cashIn2" href="detail.php?st_id=<?=$student_id?>">Cash In</a><a class="cashOut2" href="detail2.php?st_id=<?=$student_id?>">Cash Out</a></div>
   <div class="studentView">
   <table> <thead> 
	   <tr>
	   <td >ID</td>
		   <td>日期</td>
		   <td>用于</td>
		   <td>余额</td>
		   <td>状况</td>
		   <td>编辑</td>
		   <td>移除</td>
	   </tr> </thead> 
	   <tbody>
		   <?php 
		   $recieve=getAllOutTrans('data');
		   if(isset($recieve)){
			   while($detail=$recieve->fetch_assoc()){
				$_SESSION['edit_sid']=$detail['st_id'];
				$_SESSION['dTrsId']=$detail['t_id'];
				$_SESSION['dStuId']=$detail['st_id'];
				
			   ?>
				   <tr>
			   <td><?=$detail['t_id'];?></td>
			   <td><?=$detail['t_date'];?></td>
			   <td><?=$detail['t_detail'];?></td>
			   <td><?=$detail['t_amount'];?></td>
			   <td style="color: <?php echo ($detail['t_situation'] ==	 'Cash In') ? 'lime' : 'red';?>"><?=$detail['t_situation'];?></td>
			   
		   
			   <td> <a href="edit.php?t_id=<?=$detail['t_id'];?>">编辑<i class="bi bi-pencil-square"></i></a></td>
			   <td> <a href="../database/deletedata.php?t_id=<?=$detail['t_id'];?>">移除<i class="bi bi-trash3-fill"></i></a></td>
   
			   </tr>
			   <?php
			   }
		   }
			   else{
				   ?> <?="Something Went Wrong!!!";
			   }
		   ?>
		   
	   </tbody>
   </table>	
   </div></div>
   </div><?php
	}  else{
		echo "ID Missing From URL!!";
	}?>

    
	

</body>
</html>
