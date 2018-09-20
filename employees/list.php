<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
<<<<<<< HEAD
    $query = pg_query('SELECT * FROM "DOP".employees e 
        LEFT JOIN "DOP".statuses s ON e.status = s.id_stat
        LEFT JOIN "DOP".divisions d ON e.division = d.id_div
        LEFT JOIN "DOP".positions p ON e.position = p.id_pos');
=======
    $query = pg_query('SELECT * FROM "DOP".employees e LEFT JOIN "DOP".statuses s ON e.status = s.id_stat');
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
    $list = [];
    while ($row = pg_fetch_assoc($query)) {
        $list[] = $row;
    }
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Сотрудники</title>
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
                <li class="nav-item"><a class="nav-link" href="/time_sheet/list.php">Табель</a></li>
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
                <h2>Сотрудники</h2>
                <a href="new.php" class="btn btn-success">Добавить</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
<<<<<<< HEAD
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отчество</th>
                        <th>Дата рождения</th>
                        <th>Паспортные данные</th>
                        <th>Место прописки</th>
                        <th>Место проживания</th>
                        <th>Телефон</th>
                        <th>ИНН</th>
                        <th>СНИЛС</th>
                        <th>Статус</th>
                        <th>Отдел</th>
                        <th>Должность</th>
=======
                        <th>имя</th>
                        <th>фамилия</th>
                        <th>отчество</th>
                        <th>дата рождения</th>
                        <th>паспортные данные</th>
                        <th>ИНН</th>
                        <th>статус</th>
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($list as $value) {
                            echo "<tr>".
                                "<td>".$value['id_empl']."</td>".
                                "<td>".$value['first_name']."</td>".
                                "<td>".$value['second_name']."</td>".
                                "<td>".$value['patronymic']."</td>".
                                "<td>".$value['date_of_birth']."</td>".
                                "<td>".$value['pasport']."</td>".
<<<<<<< HEAD
                                "<td>".$value['place_of_residence']."</td>".
                                "<td>".$value['actual_residence']."</td>".
                                "<td>".$value['telephon_numb']."</td>".
                                "<td>".$value['tax_numb']."</td>".
                                "<td>".$value['ins_numb']."</td>".
                                "<td>".$value['name_stat']."</td>".
                                "<td>".$value['name_div']."</td>".
                                "<td>".$value['name_pos']."</td>".
=======
                                "<td>".$value['tax_numb']."</td>".
                                "<td>".$value['name_stat']."</td>".
>>>>>>> d02e9ead2fc2925b78f1818ead7fdef5f4cba99c
                                "<td>
                                    <a href='/employees/read.php?id=".$value['id_empl']."'><span class='oi oi-pencil'></span></a>
                                    <a href='/employees/delete.php?id=".$value['id_empl']."'><span class='oi oi-trash'></span></a>
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
