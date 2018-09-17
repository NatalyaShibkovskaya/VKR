<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('DELETE FROM "DOP".time_sheet WHERE id_time=' . $_GET['id']);
    if ($query) {
        header("Location: /time_sheet/list.php");
    }
endif;