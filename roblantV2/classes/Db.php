<?php

    class Db{
        private static $conn;

        public static function getConnection(){
            if(self::$conn === null){
                self::$conn = new PDO('mysql:host=localhost;dbname=hazuktr389_roblant', "user", "password");
                return self::$conn;
            }else{
                return self::$conn;
            }
        }
    }
