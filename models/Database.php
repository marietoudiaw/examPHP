<?php
class Database {
    public static function getConnection() {
        return new PDO("mysql:host=localhost;dbname=gestion_restaurant;charset=utf8", "root", "");
    }
}