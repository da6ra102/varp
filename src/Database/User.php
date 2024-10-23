<?php

namespace VarPlugin\Database;

if(!defined("ABSPATH")) {
      die();
}

class User {
      public static function createNewUser(string $email, string $password): ?string
      {
            // whatever
            $database = Database::getConnection();
            
            $database->insert("wp_users", [
                  "user_email" => $email,
                  "user_pass" => $password
            ]);

            return $database->id();
      }
}