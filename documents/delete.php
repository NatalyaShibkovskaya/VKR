<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('DELETE FROM "DOP".documents WHERE id_doc=' . $_GET['id']);
    if ($query) {
        header("Location: /documents/list.php");
    }
endif;