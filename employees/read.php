<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('SELECT * FROM "DOP".employees');
    $list = [];
    while ($row = pg_fetch_assoc($query)) {
        $list[] = $row;
    }
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Карточка сотрудника</title>
        <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="/employees/list.php">Сотрудники</a></li>
                <li class="nav-item"><a class="nav-link" href="/">Табель</a></li>
                <li class="nav-item"><a class="nav-link" href="/">Пропуски</a></li>
                <li class="nav-item"><a class="nav-link" href="/">Документы</a></li>
            </ul>
            <ul class="navbar-nav n">
                <li class="nav-item">
                    <a class="nav-link" href="/logout.php">Выход</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Сотрудники</h2>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php endif; ?>
