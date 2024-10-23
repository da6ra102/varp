<?php

namespace VarPlugin\Database;

use Medoo\Medoo;

if(!defined("ABSPATH")) {
      die();
}

class Database {
      private static $connection = null;


      public static function getConnection() {
            if(self::$connection === null) {
                  self::$connection = new Medoo([
                        'type' => "mysql",
                        'host' => DB_HOST,
                        'database' => DB_NAME,
                        'username' => DB_USER,
                        'password' => DB_PASSWORD,
                        'prefix' => 'wp_',
                        'charset' => DB_CHARSET,
                        'collation' => DB_COLLATE
                  ]);
            }

            return self::$connection;
      }
}