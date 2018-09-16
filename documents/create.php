<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    if (!isset($_POST) || empty($_POST)) {
        die("Not POST request");
    }
    $query = pg_query("INSERT INTO \"DOP\".documents(
        id_empl, 
        date_doc, 
        action, 
        doc_number) 
    VALUES (" .
        $_POST['id_empl'] . ',' .
        "'" . $_POST['date_doc'] . "',".
        $_POST['action'] . ',' .
        "'" . $_POST['doc_number']
        . "')");
    if ($query) {
        header("Location: /documents/list.php");
    }
endif;