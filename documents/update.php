<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    if (!isset($_POST) || empty($_POST)) {
        die("Not POST request");
    }
    $query = pg_query("UPDATE \"DOP\".documents SET
        doc_number = '".$_POST['doc_number']."', 
        date_doc = '".$_POST['date_doc']."', 
        id_empl = ".$_POST['id_empl'].", 
        action = ".$_POST['action']."
        WHERE id_doc = " . $_POST['id']);
    if ($query) {
        header("Location: /documents/list.php");
    }
endif;