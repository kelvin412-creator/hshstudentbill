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
	<title>Add Student Page</title>
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

<div class="body"><h2>Add Student</h2>
		<div class="label">

	<label>Student Name  :</label><br>
	<input type="text" name="studentName" ><br></div>
	<div class="label">

	<label>Student Phone Number :</label><br>
	<input type="text" name="studentPhone" ><br></div>
	<div class="label">
	<label>Total Amount:</label><br>
	<input type="text" name="totalAmount" ><br></div>
   
	
	<div class="submit">

		<button type="submit" name="addstsubmit">Insert</button>
		
	    <button type="reset" name="reset" >Clean</button>

	    </div>
	    <hr>
<div class="studentView">
<table> <thead> 
	<tr>
		<td >ID</td>
		<td>学生姓名</td>
		<td>总余额</td>
		<td>总用额</td>
		<td>剩余</td>
		<td>查看详细</td>
		<td>编辑</td>
	</tr> </thead> 
	<tbody><?php 
		$recieve=getAllData('addStudent');
		if(isset($recieve)){
			while($detail=$recieve->fetch_assoc()){
				$_SESSION['studentid']=$detail['st_id'];
				
			?>
				<tr>
			<td><?=$detail['st_id'];?></td>
			<td><?=$detail['st_name'];?></td>
			<td><?=$detail['st_amount'];?></td>
			<td><?=$detail['st_used'];?></td>
			<td><?php $total=(int)$detail['st_amount'];$use=(int)$detail['st_used'];echo $total-$use; ?></td>
			
		
			<td> <a href="detail.php?st_id=<?=$detail['st_id'];?>">View<i class="bi bi-pencil-square"></i></a></td>
			<td> <a href="edit.php?st_id=<?=$detail['st_id'];?>">Edit<i class="bi bi-pencil-square"></i></a></td>
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
