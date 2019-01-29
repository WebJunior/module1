<?php

class Connection {
    public static function make($config) {
        return new PDO("{$config['host']};dbname={$config['database']};charset=utf8;",
            $config['userDB'],
            $config['passwordDB']
        );
    }
}