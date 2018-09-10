<?php
session_start();
require_once("connection.php");


if (isset($_SESSION["session_username"])) {
    header("Location: intropage.php");
}
if (isset($_POST["login"])) {
    if (!empty($_POST['name_log']) && !empty($_POST['pwd_hash'])) {
        $username = htmlspecialchars($_POST['name_log']);
        $password = md5(htmlspecialchars($_POST['pwd_hash']));
        $query = pg_query('SELECT * FROM "DOP".logins WHERE name_log =\'' . $username . '\'');
        $numrows = pg_num_rows($query);

        if ($numrows != 0) {
            while ($row = pg_fetch_assoc($query)) {
                $dbusername = $row['name_log'];
                $dbpassword = $row['pwd_hash'];
            }
            if ($username == $dbusername && $password == $dbpassword) {
                $_SESSION['session_username'] = $username;
                header("Location: intropage.php");
            } else {
                echo "Invalid username or password!";
            }
        }
    } else {
        $message = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Вход в личный кабинет</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="/index.php" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name_log" placeholder="Имя пользователя"/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="pwd_hash" placeholder="Пароль"/>
                </div>
                <div class="form-group text-center">
                    <input name="login" type="submit" value="Отправить" class="btn btn-success"/>
                    <input type="reset" value="Очистить" class="btn btn-warning"/>
                </div>
            </form>
        </div>
    </div>
     
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p>&copy; Все права защищены</p>
    </footer>
</div>
</body>
</html>