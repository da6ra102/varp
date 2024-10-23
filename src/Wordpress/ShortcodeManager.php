<?php

namespace VarPlugin\Wordpress;
use VarPlugin\Shortcodes\Shortcode;

if(!defined("ABSPATH")) {
      die();
}

class ShortcodeManager {
      public static function scanShortcodes() {
            $dirPath = PLUGIN_PATH . "\\src\\Shortcodes\\";
            $files = scandir($dirPath);

            foreach($files as $file) {
                  if($file === "." || $file === "..") {
                        continue;
                  }      

                  if(is_file($dirPath . $file) && pathinfo($file, PATHINFO_EXTENSION) === "php") {
                        $shortcodeName = "var_" . self::camelToSnake(pathinfo($file, PATHINFO_FILENAME));
  
                        error_log($shortcodeName);
                        add_shortcode($shortcodeName, function ($attributes) use ($shortcodeName, $file, $dirPath) {
                              self::runShortcode(pathinfo($file, PATHINFO_FILENAME), $attributes);
                        });
                  }
            }
      }

      public static function runShortcode(string $name, array $attributes) {
            $name = "VarPlugin\Shortcodes\\" . $name;
            $shortcode = new $name;
            $shortcode->render($attributes);

      }

      private static function camelToSnake($camelCase) { 
            $result = ''; 
      
            for ($i = 0; $i < strlen($camelCase); $i++) { 
                  $char = $camelCase[$i]; 
      
                  if (ctype_upper($char)) { 
                        $result .= '_' . strtolower($char); 
                  } else { 
                        $result .= $char; 
                  } 
            } 
      
            return ltrim($result, '_'); 
      } 
}