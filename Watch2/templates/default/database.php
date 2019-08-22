<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    class Database{
        private static $db;
        private static $dsn = "mysql:host=localhost;dbname=watch";
        private static $username = 'root';
        private static $password = '';
        public static function connect(){
            if(!isset(self::$db)){
                try {
                    self::$db = new PDO(self::$dsn, self::$username, self::$password);
                    self::$db->exec('set names utf-8');
                    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                return self::$db;
            }else{
                return self::$db;
            }
        }
        public static function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
    }
?>