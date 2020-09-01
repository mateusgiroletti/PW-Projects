<?php 

class ConnectionFactory{
    private static $host = "localhost";
    private static $db = "miniOlx";
    private static $db_user = "user";
    private static $db_password = "user";

    public static function getConnection(){
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db;

        return new PDO($dsn, self::$db_user, self::$db_password);
    }

}

?>