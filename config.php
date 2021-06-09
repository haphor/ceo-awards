<?php

	$db_host='localhost';
	$db_user='occupation';
	$db_pass='wX4hdYDGfmHtXXtA';
	$db_name='morethan';

	try {
		$db_conn= new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>