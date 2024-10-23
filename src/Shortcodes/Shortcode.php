<?php

namespace VarPlugin\Shortcodes;

use Exception;

if(!defined("ABSPATH")) {
      die();
}

class Shortcode {
      public $file;

      public function attributes() : array {
            return [];
      }

      public function render(array $attributes) {
            return "";
      }

      public function validateAttributes(array $passedAttributes) : bool {
            $attributes = $this->attributes();

            foreach($attributes as $key => $attribute) {
                  if($attribute['required'] && !isset($passedAttributes[$key])) {
                        throw new Exception("The $key attribute is required");
                  }

                  if(!isset($passedAttributes[$key])) {
                        continue;
                  }

                  if(isset($attribute['validation'])) {
                        $attribute['validation'][0]::validate($passedAttributes[$key], $attribute['validation'][1]);
                  }
            }

            return true;
      }

}