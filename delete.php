<?php
	include('config.php');
	if(isset($_REQUEST['id'])){
		$id= $_REQUEST['id'];
		$result=mysql_query("delete from tbl_student where id='$id'");
		header('location: show.php');
		
	}
	else{
		header('location: view.php');
	}

?>