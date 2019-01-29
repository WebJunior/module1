<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 29.01.2019
 * Time: 21:06
 */

class Validation {

    private $array;

    public function __construct($data) {
        $this->array = $data;
    }

    public function checkData() {
        foreach ($this->array as $k => $v) {
            if (empty(trim($v))) {
                $arrayErrors[] = 'Поле <b>' . $k . '</b> обязательно для заполнения';
            }
        }
        return $arrayErrors;
    }

}