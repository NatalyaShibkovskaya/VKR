<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
    $query = pg_query('SELECT * FROM "DOP".employees WHERE id_empl=' . $_GET['id']);
    $employee = pg_fetch_assoc($query);
    $query = pg_query('SELECT * FROM "DOP".statuses');
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
                <h2>Сотрудник <?= $employee['first_name'] . ' ' . $employee['second_name']; ?></h2>
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="first_name">имя</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="<?= $employee['first_name']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="second_name">фамилия</label>
                        <input type="text" class="form-control" id="second_name" name="second_name"
                               value="<?= $employee['second_name']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="patronymic">отчество</label>
                        <input type="text" class="form-control" id="patronymic" name="patronymic"
                               value="<?= $employee['patronymic']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">дата рождения</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                               value="<?= $employee['date_of_birth']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="pasport">паспортные данные</label>
                        <input type="text" class="form-control" id="pasport" name="pasport"
                               value="<?= $employee['pasport']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="place_of_residence">место прописки</label>
                        <input type="text" class="form-control" id="place_of_residence" name="place_of_residence"
                               value="<?= $employee['place_of_residence']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="actual_residence">место проживания</label>
                        <input type="text" class="form-control" id="actual_residence" name="actual_residence"
                               value="<?= $employee['actual_residence']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="tax_numb">ИНН</label>
                        <input type="text" class="form-control" id="tax_numb" name="tax_numb"
                               value="<?= $employee['tax_numb']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="ins_numb">СНИЛС</label>
                        <input type="text" class="form-control" id="ins_numb" name="ins_numb"
                               value="<?= $employee['ins_numb']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="telephon_numb">контактный телефон</label>
                        <input type="text" class="form-control" id="telephon_numb" name="telephon_numb"
                               value="<?= $employee['telephon_numb']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="date_of_reseipt">дата приема</label>
                        <input type="date" class="form-control" id="date_of_reseipt" name="date_of_reseipt"
                               value="<?= $employee['date_of_reseipt']; ?>" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="date_of_dismissal">дата увольнения</label>
                        <input type="date" class="form-control" id="date_of_dismissal" name="date_of_dismissal"
                               value="<?= $employee['date_of_dismissal']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="status">статус</label>
                        <select type="text" class="form-control" id="status" name="status" required="required">
                            <?php foreach ($list as $value) {
                                if ($value['id_stat'] == $employee['status']) {
                                    echo "<option selected value='" . $value['id_stat'] . "'>" . $value['name_stat'] . "</option>";
                                } else {
                                    echo "<option value='" . $value['id_stat'] . "'>" . $value['name_stat'] . "</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <a href="list.php" class="btn btn-warning">Назад</a>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $employee['id_empl']; ?>"/>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php endif; ?>
