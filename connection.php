<?php
require("constants.php");
$connStr = pg_connect("host=localhost port=5432 dbname=vkr user=postgres password=postgres") or die(pg_last_error());
