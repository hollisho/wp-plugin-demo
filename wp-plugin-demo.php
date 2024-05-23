<?php

/**
 * Plugin Name: Hollis WP Plugin Demo
 * Plugin URI:  https://www.1024plus.com
 * Description: Hollis WP Plugin Demo
 * Author: Hollis
 * Version: 0.0.1
 * Author URI: https://www.1024plus.com
 *
 * Requires at least: >=5.6
 * Requires PHP: >=7.0
 * WC requires at least: 5.6
 *
 * @package hollisho\wp\plugin\inc
 */

use hollisho\wp\plugin\inc\Base\Activate;
use hollisho\wp\plugin\inc\Base\Deactivate;
use hollisho\wp\plugin\inc\Init;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


if (class_exists('hollisho\wp\plugin\inc\Init')) {
    add_action( 'plugins_loaded', [Init::class, 'registerService'] );
}

register_activation_hook(__FILE__, function () {
    Activate::handler();
});

register_deactivation_hook(__FILE__, function () {
    Deactivate::handler();
});