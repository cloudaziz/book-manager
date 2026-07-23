<?php
/**
 * Plugin Name: Book Manager
 * Description: A WordPress CRUD Plugin built to learn WordPress Core.
 * Version: 0.0.5
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

define('BOOK_MANAGER_PATH', plugin_dir_path(__FILE__));
define('BOOK_MANAGER_URL', plugin_dir_url(__FILE__));
define('BOOK_MANAGER_FILE', __FILE__);

use BookManager\Plugin;

$plugin = new Plugin();

register_activation_hook(
    BOOK_MANAGER_FILE,
    [$plugin, 'activate']
);

register_deactivation_hook(
    BOOK_MANAGER_FILE,
    [$plugin, 'deactivate']
);

$plugin->run();
