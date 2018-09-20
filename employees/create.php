<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    if (!isset($_POST) || empty($_POST)) {
        die("Not POST request");
    }
<<<<<<< HEAD
    echo "INSERT INTO \"DOP\".employees(
        first_name, 
        date_of_birth, 
        pasport, 
        place_of_residence, 
        actual_residence, 
        tax_numb, 
        ins_numb, 
        telephon_numb, 
        date_of_reseipt, 
        date_of_dismissal, 
        status,
        division,
        position, 
        second_name, 
        patronymic) 
    VALUES (" .
        "'" . $_POST['first_name'] . "',".
        "'" . $_POST['date_of_birth'] . "',".
        "'" . $_POST['pasport'] . "',".
        "'" . $_POST['place_of_residence'] . "',".
        "'" . $_POST['actual_residence'] . "',".
        $_POST['tax_numb'] . ',' .
        $_POST['ins_numb'] . ',' .
        $_POST['telephon_numb'] . ',' .
        "'" . $_POST['date_of_reseipt'] . "',".
        "'" . $_POST['date_of_dismissal'] . "',".
        $_POST['status'] . ',' .
        $_POST['division'] . ',' .
        $_POST['position'] . ',' .
        "'" . $_POST['second_name'] . "',".
        "'" . $_POST['patronymic']
        . "')";
=======
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
    $query = pg_query("INSERT INTO \"DOP\".employees(
        first_name, 
        date_of_birth, 
        pasport, 
        place_of_residence, 
        actual_residence, 
        tax_numb, 
        ins_numb, 
        telephon_numb, 
        date_of_reseipt, 
        date_of_dismissal, 
<<<<<<< HEAD
        status,
        division,
        position, 
=======
        status, 
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
        second_name, 
        patronymic) 
    VALUES (" .
        "'" . $_POST['first_name'] . "',".
        "'" . $_POST['date_of_birth'] . "',".
        "'" . $_POST['pasport'] . "',".
        "'" . $_POST['place_of_residence'] . "',".
        "'" . $_POST['actual_residence'] . "',".
        $_POST['tax_numb'] . ',' .
        $_POST['ins_numb'] . ',' .
        $_POST['telephon_numb'] . ',' .
        "'" . $_POST['date_of_reseipt'] . "',".
        (empty($_POST['date_of_dismissal']) ? "null," : "'" . $_POST['date_of_dismissal'] . "',").
        $_POST['status'] . ',' .
<<<<<<< HEAD
        $_POST['status'] . ',' .
        $_POST['status'] . ',' .
=======
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
        "'" . $_POST['second_name'] . "',".
        "'" . $_POST['patronymic']
        . "')");
    if ($query) {
        header("Location: /employees/list.php");
    }
endif;