<?php

namespace VarPlugin\Validators;

use Exception;

if(!defined("ABSPATH")) {
      die();
}

class StringValidator extends Validator {
      public static function validate(mixed $value, array $validations) : bool {

            if(!is_string($value)) {
                  throw new Exception("The value must be a string, provided: ", gettype($value));
            }

            if(isset($validations['notEmpty'])) {
                  self::notEmpty($value);
            }

            if(isset($validations['minLength'])) {
                  self::minLength($value, $validations['minLength']);
            }

            return true;
      }

      private static function notEmpty(string $value) : bool {
            if(empty($value)) {
                  throw new Exception("The string must not be empty");
            }

            return true;
      }

      private static function minLength(string $value, int $length) : bool {
            if(strlen($value) < $length) {
                  throw new Exception("The string must be at least $length characters long");
            }

            return true;
      }

      private static function maxLength(string $value, int $length) : bool {
            if(strlen($value) > $length) {
                  throw new Exception("The string must be at most $length characters long");
            }
            
            return true;
      }
}
