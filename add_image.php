<?php
session_start();
include 'libs/constants.php';
include 'libs/Connection.php';
include 'libs/Image.php';

if (isset($_POST['submit'])) {

    // var_dump($_FILES);die();
    //var_dump(DIRECTORY_FOR_IMAGES);die();

    $img = new Image(Connection::make(CONFIG_CONNECT_TO_DB));

    if (!$img->checkUploadImageOnSize($_FILES['img'])) {
        $_SESSION['imageErrorUpload'] = 'Превышен максимальный размер файла в 100 КБ';
        header('Location: gallery.php');
        return false;
    }

    if (!$img->checkUploadImageOnType($_FILES['img'])) {
        $_SESSION['imageErrorUpload'] = 'Недопустимый тип файла. Разрешено только jpg или png';
        header('Location: gallery.php');
        return false;
    }

    if(!$img->uploadImage($_FILES,DIRECTORY_FOR_IMAGES)) {
        $_SESSION['imageErrorUpload'] = 'Что-то пошло не так.';
        header('Location: gallery.php');
        return false;
    }else {
        header('Location: gallery.php');
    }



}
?>