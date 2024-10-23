<?php

namespace VarPlugin\Wordpress;
use Dotenv\Dotenv;

if(!defined("ABSPATH")) {
      die();
}

class Plugin {
      private static ?Plugin $instance = null;
      public ?Dotenv $dotenv = null;

      private function __construct() {
            define("PLUGIN_PATH", dirname( __FILE__, 3));
            define("PLUGIN_FILE", PLUGIN_PATH . "/var.php");
            define("PLUGIN_URL", plugin_dir_url(PLUGIN_FILE));

            $this->initDotenv();
            ShortcodeManager::scanShortcodes();
      }

      private function initDotenv() {
            $this->dotenv = Dotenv::createImmutable(__DIR__ . "../../../");
            $this->dotenv->load();
      }

      public static function getInstance() : Plugin {
            if(self::$instance === null) {
                  self::$instance = new Plugin();
            }

            return self::$instance;
      }
}