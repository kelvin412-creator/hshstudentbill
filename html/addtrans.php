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
	<title>Add Transaction Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>

<body>
	<form action="../database/addData.php" method="post">
<div class="all"><div class="sidebar"><div class="bar1">
	<h2><i class="bi bi-person-check"></i><?php echo $_SESSION["adminName"]?></h2>
</div><div class="bar2"><h1>General</h1><hr>
	<div class="list">
	            <a href="view.php"><i class="bi bi-view-stacked"></i>  View</a>
</div>
    <div class="list">
	            <a href="add.php"><i class="bi bi-person-fill-add"></i> Add or <i class="bi bi-pencil-square"></i> Edit Student</a>
</div>
    <div class="list">
	            <a href="delete.php"><i class="bi bi-trash3-fill"></i>  Remove Student</a>
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

<div class="body">
<?php  if(isset($_GET['st_id'])) {//check the st_id is get or not
	
			$student_id=$_GET['st_id'];//if get will store to $student_id
            $_SESSION['trStuId']=$student_id;
			?>
    <h2>Add Transaction</h2>
        <div class="label">
        <label>Situation :</label><br>
		<select class="label" name="situation">
			<option value="Cash In">Cash In</option>
			<option value="Cash Out">Cash Out</option>
		</select><br></div>
		<div class="label">
		<label>Date :</label><br>
		<input type="date" name="tDate"><br></div>
		<div class="label">
		<label>Detail :</label><br>
		<input type="text" name="tDetail"><br></div>
		<div class="label">
		<label>Amount :</label><br>
		<input type="text" name="tAmount" ><br></div>
   
	
	<div class="submit">

		<button type="submit" name="addTsubmit">Insert</button>
		
	    <button type="reset" name="reset" >Clean</button>

	    </div>
	    <hr>
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
		   $recieve=getAllInTrans('data');
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
</div>
</div>
</div>
	
		</form>
</body>
</html>
        <?php } 
        else{
            echo"ID Missing From URL!!";
        }?>