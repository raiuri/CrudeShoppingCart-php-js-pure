<?php

namespace App\Models;

class Conexao {

    private static $instance;

    public static function getConnection() {

        if (!isset(self::$instance)):
           self::$instance = new PDO('mysql:host=localhost;dbname=store;charset=utf8', 'root', ''); 
        endif;
        
        return self::$instance;
    }

}