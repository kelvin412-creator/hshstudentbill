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
	<title><?php if(isset($_GET['st_id'])){?><?="Edit Student Page";}else{?><?="Edit Transaction Page";}?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>

<body>
	<form action="../database/editData.php" method="post">
<div class="all"><div class="sidebar"><div class="bar1">
	<h2><i class="bi bi-person-check"></i><?php echo $_SESSION["adminName"]?></h2>
</div><div class="bar2"><h1>General</h1><hr>
	<div class="list">
	            <a href="view.php"><i class="bi bi-view-stacked"></i>  View</a>
</div>
    <div class="list">
	<a href="add.php"><i class="bi bi-person-fill-add"></i>  Add or <i class="bi bi-pencil-square"></i> Edit Student</a>
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
<?php if(isset($_GET['st_id'])){
	$student_id=$_GET['st_id'];	
	$_SESSION['editStuId']=$student_id;
	?><div class="body"><h2>Edit Student</h2>
	<div class="label">
<?php $getData=getSelectedData("data");
	if(isset($getData)){
		while($recieve=$getData->fetch_assoc()){
			?><label>Student Name  :</label><br>
			<input type="text" name="studentName" value="<?=$recieve['st_name'];?>"><br></div>
			<div class="label">
			
			<label>Student Phone Number :</label><br>
			<input type="text" name="studentPhone" value="<?=$recieve['st_phone'];?>"><br></div>
			<div class="label">
			<label>Total Amount :</label><br>
			<input type="text" name="totalAmount" value="<?=$recieve['st_amount'];?>"><br></div>
			<div class="label">
			<label>Total Used :</label><br>
			<input type="text" name="totalUsed" value="<?=$recieve['st_used'];?>"><br></div>
			
			<div class="submit">
			
				<button type="submit" name="stsubmit">Insert</button>
				
				<button type="reset" name="reset" >Clean</button>
			
				</div><?php
		}
	}
 ?>


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
	$recieve=getAllData('AllStudent');
	if(isset($recieve)){
		while($detail=$recieve->fetch_assoc()){
			$_SESSION['studentid']=$detail['st_id'];
			$_SESSION['studentName']=$detail['st_name'];
		?>
			<tr>
		<td><?=$detail['st_id'];?></td>
		<td><?=$detail['st_name'];?></td>
		<td><?=$detail['st_amount'];?></td>
		<td><?=$detail['st_used'];?></td>
		<td><?php $total=(int)$detail['st_amount'];$use=(int)$detail['st_used']; echo $total-$use;?></td>
	
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
<?php } elseif(isset($_GET['t_id'])){
	$transId=$_GET['t_id'];
	$_SESSION['tID']=$transId;

	?>
		<div class="body"><h2>Edit Transaction</h2>
		<div class="label">
			<?php $collect=getSelectedTrans('selectTrans');
			
	if(isset($collect)){
		
		while($detail=$collect->fetch_assoc()){
			$_SESSION['stuId']=$detail['st_id'];
			$_SESSION['currentT']=$detail['t_amount'];
		
		
		?>	
	<label>Situation :</label><br>
		<select class="label" name="situation">
			<option value="Cash In">Cash In</option>
			<option value="Cash Out">Cash Out</option>
		</select><br></div>
		<div class="label">
		<label>Date :</label><br>
		<input type="date" name="tDate" value="<?=$detail['t_date']?>"><br></div>
		<div class="label">
		<label>Detail :</label><br>
		<input type="text" name="tDetail" value="<?=$detail['t_detail']?>"><br></div>
		<div class="label">
		<label>Amount :</label><br>
		<input type="text" name="tAmount" value="<?=$detail['t_amount']?>"><br></div>
		
<div class="submit">

	<button type="submit" name="tsubmit">Insert</button>
	
	<button type="reset" name="reset" >Clean</button>

	</div><hr>
	<?php } }

?>
	
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
<tbody><?php 
	$recieve=getAllEditTrans('data');
	if(isset($recieve)){
		while($detail=$recieve->fetch_assoc()){
			$_SESSION['edit_sid']=$detail['st_id'];
			
		?>
			<tr>
			<td><?=$detail['t_id'];?></td>
			   <td><?=$detail['t_date'];?></td>
			   <td><?=$detail['t_detail'];?></td>
			   <td><?=$detail['t_amount'];?></td>
			   <td><?=$detail['t_situation'];?></td>
			   
		   
			   <td> <a href="edit.php?t_id=<?=$detail['t_id'];?>">Edit<i class="bi bi-pencil-square"></i></a></td>
			   <td> <a href="../database/deletedata.php?t_id=<?=$detail['t_id'];?>">Remove<i class="bi bi-trash3-fill"></i></a></td>
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
<?php }
else{
	?> <?="ID Missing From URL!!";
}
	?>


</div>
	
		</form>
</body>
</html>
