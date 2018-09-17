<?php
require("constants.php");
$connStr = pg_connect("host=localhost port=5433 dbname=vkr user=postgres password=123") or die(pg_last_error());
