<?php

/**
 * Plugin Name:       bb block boilerplate
 * Description:       a blank starting point using bb build tools
 * Version:           0.0.1
 * Requires at least: 5.5
 * Requires PHP:      7.4
 * Author:            Paul Ryder
 * License:           GPL v2 or later
 * Text Domain:       bb-block-boilerplate
 */

namespace Big_Bite\Block_Boilerplate;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
// Define a global path to the directory
if (!defined('BIG_BITE_BLOCK_BOILERPLATE_DIR')) {
    define('BIG_BITE_BLOCK_BOILERPLATE_DIR', rtrim(plugin_dir_path(__FILE__), '/'));
}

//Start composer autoloading
require_once BIG_BITE_BLOCK_BOILERPLATE_DIR . '/vendor/autoload_packages.php';

add_action('plugins_loaded', __NAMESPACE__ . '\\setup', 0);
