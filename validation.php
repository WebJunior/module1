<?
include 'libs/Validation.php';
if (isset($_POST['checky'])) {
    $data = [
        $_POST['field_name1'] => $_POST['field_value1'],
        $_POST['field_name2'] => $_POST['field_value2'],
        $_POST['field_name3'] => $_POST['field_value3']
    ];

    $validation = new Validation($data);
    $errors = $validation->checkData();
}

?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Валидация данных</title>
</head>
<body>
<a href="index.php" class="btn btn-success">На главную</a>
<div class="container">
    <h2>Валидация данных</h2>
    <form action="/validation.php" method="post">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Имя поля</th>
            <th>Значение</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="field_name1" id="field_name1" required value="title">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="field_value1" id="field_value1">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="field_name2" id="field_name2" required value="desc">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="field_value2" id="field_value2" >
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="field_name3" id="field_name3" required value="text">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="field_value3" id="field_value3">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="checky" class="btn btn-primary">Проверить</button>
            </td>
        </tr>
        </tbody>
    </table>
    </form>
</div>

<?php

if (!(empty($errors))) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
}

?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>