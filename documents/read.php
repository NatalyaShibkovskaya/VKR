<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('SELECT * FROM "DOP".documents WHERE id_doc=' . $_GET['id']);
    $document = pg_fetch_assoc($query);

    $query = pg_query('SELECT * FROM "DOP".actions');
    $actions = [];
    while ($row = pg_fetch_assoc($query)) {
        $actions[] = $row;
    }

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
        <title>Документ</title>
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
                <li class="nav-item"><a class="nav-link" href="/time_sheet/list.php">Табель</a></li>
                <li class="nav-item active"><a class="nav-link" href="/documents/list.php">Документы</a></li>
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
                <h2>Документ №<?=$document['doc_number'] . ' от ' . $document['date_doc']; ?></h2>
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="doc_number">Номер документа</label>
                        <input type="text" class="form-control" id="doc_number" name="doc_number" required="required" value="<?= $document['doc_number'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="date_doc">Дата документа</label>
                        <input type="date" class="form-control" id="date_doc" name="date_doc" required="required" value="<?= $document['date_doc'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="action">Действие</label>
                        <select type="text" class="form-control" id="action" name="action" required="required">
                            <?php foreach ($actions as $value) {
                                if ($value['id_act'] == $document['action']) {
                                    echo "<option selected value='" . $value['id_act'] . "'>" . $value['name_act'] . "</option>";
                                } else {
                                    echo "<option value='" . $value['id_act'] . "'>" . $value['name_act'] . "</option>";
                                }
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_empl">Сотрудник</label>
                        <select type="text" class="form-control" id="id_empl" name="id_empl" required="required">
                            <?php foreach ($employees as $value) {
                                if ($value['id_empl'] == $document['id_empl']) {
                                    echo "<option selected value='" . $value['id_empl'] . "'>" . $value['first_name'] . " " . $value['second_name'] . "</option>";
                                } else {
                                    echo "<option value='" . $value['id_empl'] . "'>" . $value['first_name'] . " " . $value['second_name'] . "</option>";
                                }
                            }?>
                        </select>
                    </div>
                    <a href="list.php" class="btn btn-warning">Назад</a>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$document['id_doc'];?>"/>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php endif; ?>
