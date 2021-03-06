<?php
session_start();

if (!isset($_SESSION["session_username"])):
    header("location:login.php");
else:
    require_once("../connection.php");
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
        <title>Новый сотрудник</title>
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
                <form action="create.php" method="post">
                    <div class="form-group">
                        <label for="first_name">Имя</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="second_name">Фамилия</label>
                        <input type="text" class="form-control" id="second_name" name="second_name" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество</label>
                        <input type="text" class="form-control" id="patronymic" name="patronymic"/>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Дата рождения</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="pasport">Паспортные данные</label>
                        <input type="text" class="form-control" id="pasport" name="pasport" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="place_of_residence">Место прописки</label>
                        <input type="text" class="form-control" id="place_of_residence" name="place_of_residence" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="actual_residence">Место проживания</label>
                        <input type="text" class="form-control" id="actual_residence" name="actual_residence" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="tax_numb">ИНН</label>
                        <input type="text" class="form-control" id="tax_numb" name="tax_numb" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="ins_numb">СНИЛС</label>
                        <input type="text" class="form-control" id="ins_numb" name="ins_numb" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="telephon_numb">Контактный телефон</label>
                        <input type="text" class="form-control" id="telephon_numb" name="telephon_numb" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="date_of_reseipt">Дата приема</label>
                        <input type="date" class="form-control" id="date_of_reseipt" name="date_of_reseipt" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="date_of_dismissal">Дата увольнения</label>
                        <input type="date" class="form-control" id="date_of_dismissal" name="date_of_dismissal"/>
                    </div>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select type="text" class="form-control" id="status" name="status" required="required">
                            <?php foreach ($list as $value){
                                echo "<option value='" . $value['id_stat'] . "'>" . $value['name_stat'] . "</option>";
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="division">Отдел</label>
                        <select type="text" class="form-control" id="division" name="division" required="required">
                            <?php foreach ($list as $value){
                                echo "<option value='" . $value['id_div'] . "'>" . $value['name_div'] . "</option>";
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Должность</label>
                        <select type="text" class="form-control" id="position" name="position" required="required">
                            <?php foreach ($list as $value){
                                echo "<option value='" . $value['id_pos'] . "'>" . $value['name_pos'] . "</option>";
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
