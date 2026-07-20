<?php
/**
 * Plugin Name: Book Manager
 * Description: A WordPress CRUD Plugin built to learn WordPress Core.
 * Version: 0.0.2
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use BookManager\Plugin;

$plugin = new Plugin();

register_activation_hook(
    __FILE__,
    [$plugin, 'activate']
);

register_deactivation_hook(
    __FILE__,
    [$plugin, 'deactivate']
);

$plugin->run();
