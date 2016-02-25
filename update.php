<?php
include('config.php');
// Check ID is set and if not kick the view page

if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
	
}
	else {
		header('location: show.php');
	}



if(isset($_POST['form1']))
{
	try{
		if(empty($_POST['name'])){
			throw new Exception("name can't empty");
		}
		
		if(empty($_POST['age'])){
			throw new Exception("roll can't empty");
		}
		if(empty($_POST['roll'])){
			throw new Exception("age can't empty");
		}
		if(empty($_POST['email'])){
			throw new Exception("email can't empty");
		}
		$result = mysql_query("update tbl_student set name='$_POST[name]', age='$_POST[age]',roll='$_POST[roll]',email='$_POST[email]'where id='$id'");
		$success_mess = 'Data insert successfully';
		
	}
	catch(Exception $e){
		$err_mess = $e->getMessage();
	}
}
?>






<!doctype html>
<html>
<head>
<meta charset ="UTF-8">
<title>Data Update page</title>
</head>
<body>
<h2>Update your data</h2>
<?php
if(isset($err_mess)){
	echo $err_mess;
}
if(isset($success_mess)){
	echo $success_mess;
}

?>
<br>
<?php
$result = mysql_query("select * from tbl_student where id='$id'");

	while($row=mysql_fetch_array($result)){
		$name_old = $row['name'];
		$age_old = $row['age'];
		$roll_old = $row['roll'];
		$email_old = $row['email'];
	}

?>


<form action="" method="post">
<table>
	<tr>
		<td>Name: </td>
		<td><input type="text" name="name" value="<?php echo $name_old;?>"></td>
	
	</tr>
	<tr>
		<td>Age: </td>
		<td><input type="text" name="age" value="<?php echo $age_old;?>"></td>
	</tr>
	<tr>
		<td>Roll:</td>
		<td><input type="text" name="roll" value="<?php echo $roll_old;?>"></td>
	</tr>
	<tr>
		<td>Email: </td>
		<td><input type="text" name="email" value="<?php echo $email_old;?>"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Update" name="form1"></td>
	</tr>
</table>
<input type ="hidden" name="id" value="<?php echo $id?>">
</form>
<br>
<a href="index.php"> Back to Previous</a>

</body>
</html>