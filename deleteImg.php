<?php
include 'libs/constants.php';
include 'libs/Connection.php';
include 'libs/Image.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $res = Image::getImagePathById($id,Connection::make(CONFIG_CONNECT_TO_DB));
    $img_path = $res[0]['img_path'];
    Image::deleteImage($id,Connection::make(CONFIG_CONNECT_TO_DB),$img_path);

    header('Location: gallery.php');
}