<?php
include('config.php');

?>

<!doctype html>
<html>
<head>
<meta charset ="UTF-8">
<title>view database</title>
	<script>
	function confirm_delete(){
		return confirm('Do you want to delete');
	}
	</script>

</head>
<body>
<h2>Data view page</h2>
<br>

<table border="1" cellspacing="1" cellpadding="5">
	<tr>
		<th>Serial</th>
		<th>Name</th>
		<th>Age</th>
		<th>Roll</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
		
	
	</tr>
	<?php
	$i=0;
	$result = mysql_query("select * from tbl_student");
	while($row= mysql_fetch_array($result))
	{
		$i++;
		?>
	
	
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['age']?></td>
		<td><?php echo $row['roll']?></td>
		<td><?php echo $row['email']?></td>
		<td><a href="update.php?id=<?php echo $row['id'];?>">Edit</td>
		<td><a onclick="return confirm_delete();" href="delete.php?id=<?php echo $row['id'];?>">Delete</td>
	
	</tr>
<?php
	}
?>
</table>
<br>
<a href="index.php">Back</a>

</body>
</html>