<?php
session_start();
include 'libs/constants.php';
include 'libs/Connection.php';
include 'libs/Image.php';

$images = Image::getAllImages(Connection::make(CONFIG_CONNECT_TO_DB));

// сколько будет картинок в строке
$imageRowCount = IMAGE_ROW_COUNT;

// сколько будет строк
$imageColumnCount = ceil(count($images) / $imageRowCount);

?>


<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Галерея</title>
</head>
<body>
<a href="index.php" class="btn btn-success">На главную</a>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="/add_image.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="img">Выберете картинку:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
                    <input type="file" class="form-control" name="img" id="img">
                    <span>Максимальный размер файла 100 КБ</span><br/>
                    <span style="color:red;">
                        <?php
                        if(isset($_SESSION['imageErrorUpload'])) {
                            echo $_SESSION['imageErrorUpload'];
                        }
                        ?>
                    </span><br/>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Загрузить</button>
            </form>
            <br/>
        </div>
    </div>
</div>

<div class="container">
    <?php
    // цикл , который выводит по N картинок в ряд ( задается в константах )
    // Рахим, я потратил на эти 10 строчек 1.5 часа оО . Зато без гугла :D
    $j = 0;
        for ($i = 0 ; $i < $imageColumnCount; $i++) {
            echo '<div class="row">';
            while ($imageRowCount != 0) {
                if($images[$j]['img_path'] == null) {
                    break;
                }
                Image::showImageCard($images[$j]['img_path'], $images[$j]['img_date_upload'], $images[$j]['id']);
                $j++;
                $imageRowCount--;
            }
            echo '</div><br /><br /><br /><br /><br /><br />';
            $imageRowCount = IMAGE_ROW_COUNT;
        }
    ?>
</div>


</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_SESSION['imageErrorUpload'])) {
    unset($_SESSION['imageErrorUpload']);
}

?>
