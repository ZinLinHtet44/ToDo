<?php
	require'config.php';
	$pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
	$pdostatement->execute();
	$result=$pdostatement->fetchAll();
	//var_dump($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>todo</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="card">
  			<div class="card-body">
  				<h2>To Do HomePage</h2><br/>

  				<a type="button" class="btn btn-success" href="add.php">Create New</a><br/><br/>
    			<table class="table table-striped">
    				<thead>
    					<tr>
    						<td>ID</td>
    						<td>Title</td>
    						<td>Description</td>
    						<td>Created Date</td>
    						<td>Action</td>
    					</tr>
    				</thead>
    				<tbody>

    				<?php
    				$i=1;
    					foreach ($result as $value) {
    				?>
    						<tr>
    						<td><?php echo"{$i}"?></td>
    						<td><?php echo $value['title'];?></td>
    						<td><?php echo $value['description']?></td>
    						<td><?php echo date('Y-m-d',strtotime($value['created_at']));?></td>
    						<td>
    							<a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id'];?>">Edit</a>
    							<a type="butoon" class="btn btn-danger" href="delete.php?id=<?php echo $value['id'];?>">Delete</a>
    						</td>
    						</tr> 
    				

    				<?php	
    				$i++;	
    					}
    				?>
    					
    				
    				</tbody>
    			</table>
  			</div>
		</div>
	</body>
</html>
