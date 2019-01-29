<?php

class Image {

    //максимальный размер картинки ( 100 КБ)
    private $maxSize = 100000;

    //разрешенные типы для загрузки
    private $arrayTypes = ['image/jpeg','image/png'];

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // метод проверки нашей картинки на размер.
    public function checkUploadImageOnSize($file) {

        if ( ($file['size'] > $this->maxSize) || $file['size'] == 0) {
            return false;
        }else {
            return true;
        }
    }

    // метод проверки нашей картинки на тип.
    public function checkUploadImageOnType($file) {
        if (!in_array($file['type'],$this->arrayTypes)) {
            return false;
        } else {
            return true;
        }
    }

    public function uploadImage($file,$dir) {
        $randValue = time() . '' . rand(10,999999);
        $img_name = $randValue . '_' .$file['img']['name'];
        $destionation = $dir .'/' . $img_name;
        if(move_uploaded_file($file['img']['tmp_name'], $destionation)) {
            $sql = "INSERT INTO `images` VALUES (NULL,:path,:date)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':path',$img_name);
            $stm->bindValue(':date',date('Y-m-d H:i:s'));
            $stm->execute();
            return true;
        }else {
            return false;
        }
    }

    public static function getAllImages(PDO $pdo) {
        $sql = "SELECT * FROM `images`";
        $stm = $pdo->query($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function showImageCard($pathImg,$dateUpload,$idImg) {
        echo '<div class="col-md-3">';
        echo '<div class="card" style="width: 250px; height: 250px;">';
        echo '<img src="imgs/' . $pathImg . '" class="card-img-top rounded" alt="Picture">';
        echo '<div class="card-body">';
        echo '<p class="card-text">Дата загрузки: ' . $dateUpload . '</p>';
        echo '<a href="../deleteImg.php?id='. $idImg .'" class="btn btn-danger">Удалить</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    public static function deleteImage($id,PDO $pdo,$img_path) {
        if (unlink("{$_SERVER['DOCUMENT_ROOT']}/imgs/{$img_path}")) {
            $sql = "DELETE FROM `images` WHERE `id` =:id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id',$id);
            $stm->execute();
        }

    }

    public static function getImagePathById($id,PDO $pdo) {
        $sql = "SELECT `img_path` FROM `images` WHERE `id` =:id";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id',$id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>