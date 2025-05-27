<?php
// services/Database.php

class Database {
    public static function connect() {
        return new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
    }
}
?>
