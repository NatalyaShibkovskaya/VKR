<?php
	require("constants.php");
 
	$con = pg_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(pg_resulr_error());
?>