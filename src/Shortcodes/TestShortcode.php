<?php

namespace VarPlugin\Shortcodes;

use VarPlugin\Validators\StringValidator;

if(!defined("ABSPATH")) {
      die();
}

class TestShortcode extends Shortcode {
      public function attributes(): array {
            return [
                  "name" => [
                        "required" => true,
                        "validation" => [StringValidator::class, ["notEmpty", "minLength" => 5, "maxLength" => 10]]
                  ]
            ];
      }

      public function render(array $attributes) {
            $this->validateAttributes($attributes);

            echo "asd";
      }
}