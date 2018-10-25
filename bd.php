<?php 
	require 'config.php';
	require 'rb-mysql.php';
	R::setup( 'mysql:host='.$mysqlhost . ';dbname=' . $mysqlbase, $mysqllogin, $mysqlpassword);
 ?>