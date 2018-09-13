<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('DELETE FROM "DOP".employees WHERE id_empl=' . $_GET['id']);
    if ($query) {
        header("Location: /employees/list.php");
    }
endif;