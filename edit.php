<?php
	require 'config.php';
	if($_POST){
		//echo "post action";
		$title=$_POST['title'];
		$desc = $_POST['description'];
		$id = $_POST['id'];

		$pdostatement=$pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
		$result = $pdostatement->execute();
		if($result){
				echo "<script>alert('Added Data');window.location.href='index.php';</script>";
			}

	}else{
		$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
		$pdostatement->execute();
		$result= $pdostatement->fetchAll();

		//print"<pre>";
		//print_r($result[0]['title']);
		//print_r($result);
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
				<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" name="title"  value="<?php echo $result[0]['title'];?>" required/>
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" rows="8" cols="80">
							<?php echo $result[0]['description'];?>
						</textarea>
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
