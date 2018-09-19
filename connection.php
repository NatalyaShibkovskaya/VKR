<?php
require("constants.php");
<<<<<<< HEAD
$connStr = pg_connect("host=localhost port=5433 dbname=vkr user=postgres password=123") or die(pg_last_error());
=======
$connStr = pg_connect("host=localhost port=5432 dbname=vkr user=postgres password=postgres") or die(pg_last_error());
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
