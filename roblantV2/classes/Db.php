<?php

    class Db{
        private static $conn;

        public static function getConnection(){
            if(self::$conn === null){
                self::$conn = new PDO('mysql:host=localhost;dbname=hazuktr389_roblant', "hazuktr389_masa", "roblant2709");
                return self::$conn;
            }else{
                return self::$conn;
            }
        }
    }