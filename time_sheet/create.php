<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    if (!isset($_POST) || empty($_POST)) {
        die("Not POST request");
    }
    $query = pg_query("INSERT INTO \"DOP\".time_sheet(
        specification, 
        actual, 
        month, 
        id_empl) 
    VALUES (" .
        $_POST['specification'] . ',' .
        $_POST['actual'] . ',' .
        "'" . $_POST['month'] . "-" . $_POST['year'] . "'," .
        $_POST['id_empl']
        . ")");
    if ($query) {
        header("Location: /time_sheet/list.php");
    }
endif;