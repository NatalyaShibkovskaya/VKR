<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('SELECT * FROM "DOP".time_sheet t 
        LEFT JOIN "DOP".employees e ON t.id_empl = e.id_empl
        LEFT JOIN "DOP".causes c ON t.time_causes = c.caus_name
        LEFT JOIN "DOP".absence a ON t.time_absence = a.absence');
    $list = [];
    while ($row = pg_fetch_assoc($query)) {
        $list[] = $row;
    }
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Табель</title>
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
                <li class="nav-item"><a class="nav-link" href="/employees/list.php">Сотрудники</a></li>
                <li class="nav-item active"><a class="nav-link" href="/time_sheet/list.php">Табель</a></li>
                <li class="nav-item"><a class="nav-link" href="/documents/list.php">Документы</a></li>
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
                <h2>Табель</h2>
                <a href="new.php" class="btn btn-success">Добавить</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Норма по производственному календарю</th>
                        <th>Количество реально отработанных часов</th>
                        <th>Количество пропущенных часов</th>
                        <th>Причина</th>
                        <th>Период</th>
                        <th>Сотрудник</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($list as $value) {
                            echo "<tr>".
                                "<td>".$value['id_time']."</td>".
                                "<td>".$value['specification']."</td>".
                                "<td>".$value['actual']."</td>".
                                "<td>".$value['absence']."</td>".
                                "<td>".$value['caus_name']."</td>".
                                "<td>".$value['month']."</td>".
                                "<td>".$value['first_name']." " . $value['second_name'] . "</td>".
                                "<td>
                                    <a href='/time_sheet/read.php?id=".$value['id_time']."'><span class='oi oi-pencil'></span></a>
                                    <a href='/time_sheet/delete.php?id=".$value['id_time']."'><span class='oi oi-trash'></span></a>
                                </td>".
                            "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php endif; ?>
