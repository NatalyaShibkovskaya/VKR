<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('SELECT * FROM "DOP".employees');
    $employees = [];
    while ($row = pg_fetch_assoc($query)) {
        $employees[] = $row;
    }
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Новый табель</title>
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
                <form action="create.php" method="post">
                    <div class="form-group">
                        <label for="specification">Норма по производственному календарю</label>
                        <input type="text" class="form-control" id="specification" name="specification" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="actual">Количество реально отработанных часов</label>
                        <input type="text" class="form-control" id="actual" name="actual" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="year">Год</label>
                        <input type="text" class="form-control" id="year" name="year" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="month">Месяц</label>
                        <select type="text" class="form-control" id="month" name="month" required="required">
                            <option value="1">Январь</option>
                            <option value="2">Февраль</option>
                            <option value="3">Март</option>
                            <option value="4">Апрель</option>
                            <option value="5">Май</option>
                            <option value="6">Июнь</option>
                            <option value="7">Июль</option>
                            <option value="8">Август</option>
                            <option value="9">Сентябрь</option>
                            <option value="10">Октябрь</option>
                            <option value="11">Ноябрь</option>
                            <option value="12">Декабрь</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_empl">Сотрудник</label>
                        <select type="text" class="form-control" id="id_empl" name="id_empl" required="required">
                            <?php foreach ($employees as $value){
                                echo "<option value='" . $value['id_empl'] . "'>" . $value['first_name'] ." " .$value['second_name'] . "</option>";
                            }?>
                        </select>
                    </div>
                    <a href="list.php" class="btn btn-warning">Назад</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php endif; ?>
