<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    if (!isset($_POST) || empty($_POST)) {
        die("Not POST request");
    }
    $query = pg_query("UPDATE \"DOP\".time_sheet SET
        specification = " . $_POST['specification'] . ", 
        actual = " . $_POST['actual'] . ", 
        month = '" . $_POST['month'] . "-" . $_POST['year'] . "', 
        id_empl = " . $_POST['id_empl'] . "
        WHERE id_time = " . $_POST['id']);
    if ($query) {
        header("Location: /time_sheet/list.php");
    }
endif;