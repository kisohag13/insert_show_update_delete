<?php
include('config.php');
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
		$result = mysql_query("insert into tbl_student(name,age,roll,email) values 
		('$_POST[name]','$_POST[age]','$_POST[roll]','$_POST[email]')");
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
<title>Data insert page</title>
</head>
<body>
<h2>insert your data</h2>
<?php
if(isset($err_mess)){
	echo $err_mess;
}
if(isset($success_mess)){
	echo $success_mess;
}

?>

<form action="" method="post">
<table>
	<tr>
		<td>Name: </td>
		<td><input type="text" name="name"></td>
	
	</tr>
	<tr>
		<td>Age: </td>
		<td><input type="text" name="age"></td>
	</tr>
	<tr>
		<td>Roll:</td>
		<td><input type="text" name="roll"></td>
	</tr>
	<tr>
		<td>Email: </td>
		<td><input type="text" name="email"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Insert" name="form1"></td>
	</tr>
</table>
</form>
<br>
<a href="index.php"> Back to Previous</a>

</body>
</html>