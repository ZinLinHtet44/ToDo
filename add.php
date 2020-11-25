<?php
	require 'config.php';

	if($_POST){
		$title=$_POST['title'];
		$desc = $_POST['description'];
		$sql="INSERT INTO todo(title,description) VALUES(:title,:description)";
		$pdostatement=$pdo->prepare($sql);
		$result= $pdostatement->execute( array(':title'=>$title,':description'=>$desc));
			if($result){
				echo "<script>alert('Added Data');window.location.href='index.php';</script>";
			}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Add New Record</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="card">
			<div class="card-body">
				<h2>Created New Data</h2><br/>
				<form action="add.php" method="post">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" name="title" required/>
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" rows="8" cols="80"></textarea>
					</div>

					<div class="form-group">
						<input  type="submit" class="btn btn-primary" name="adddata" value="Submit">
						<a type="button" class="btn btn-warning" href="index.php">Back</a>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
