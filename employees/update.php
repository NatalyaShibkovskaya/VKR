<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    if (!isset($_POST) || empty($_POST)) {
        die("Not POST request");
    }
    $query = pg_query("UPDATE \"DOP\".employees SET
        first_name = '".$_POST['first_name']."', 
        date_of_birth = '".$_POST['date_of_birth']."', 
        pasport = '".$_POST['pasport']."', 
        place_of_residence = '".$_POST['place_of_residence']."', 
        actual_residence = '".$_POST['actual_residence']."', 
        tax_numb = ".$_POST['tax_numb'].", 
        ins_numb = ".$_POST['ins_numb'].", 
        telephon_numb = ".$_POST['telephon_numb'].", 
        date_of_reseipt = '".$_POST['date_of_reseipt']."', 
        date_of_dismissal = '".$_POST['date_of_dismissal']."', 
        status = ".$_POST['status'].", 
        second_name = '".$_POST['second_name']."', 
        patronymic = '".$_POST['patronymic']."'
        WHERE id_empl = " . $_POST['id']);
    if ($query) {
        header("Location: /employees/list.php");
    }
endif;