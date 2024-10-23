<?php

/*** Var-plugins
 *
 * @package           VarPlugins
 * @author            da6ra102
 * @copyright         2024 Varkinia
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Var Plugins
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 * Requires Plugins:    
 */

use VarPlugin\Wordpress\Plugin;

require_once __DIR__ . '/vendor/autoload.php';

Plugin::getInstance();

add_action("wp_footer", function () {
      echo do_shortcode("[var_test_shortcode name='asdfsfaASDASDASDADASasdasdas']");
});