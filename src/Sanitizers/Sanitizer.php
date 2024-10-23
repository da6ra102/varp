<?php

namespace VarPlugin\Sanitizers;

if (!defined("ABSPATH")) {
      die();
}

class Sanitizer
{
      public static function sanitizeString(string $string): string
      {
            $string = strip_tags($string);
            return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
      }

      public static function sanitizeNumber(string|int|float $number): float
      {
            return (float)filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      }

      public static function sanitizeBoolean(mixed $boolean): bool
      {
            return filter_var($boolean, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null
                  ? (bool)$boolean : false;
      }

      function sanitizeArray(array $array): array
      {
            return array_map(function ($value) {
                  if (is_string($value)) {
                        return self::sanitizeString($value);
                  } elseif (is_numeric($value)) {
                        return self::sanitizeNumber($value);
                  } elseif (is_bool($value)) {
                        return self::sanitizeBoolean($value);
                  } elseif (is_array($value)) {
                        return self::sanitizeArray($value);
                  }
                  return null;
            }, $array);
      }
}
