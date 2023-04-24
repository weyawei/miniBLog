<?php
	$con = new mysqli("localhost", "root", "", "miniblog");

	if (!$con){
		die('Connection Failed'. mysql_error());
	}
?>