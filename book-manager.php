<?php
/**
 * Plugin Name: Book Manager
 * Plugin URI:  https://github.com/cloudaziz/book-manager
 * Description: A WordPress CRUD Plugin built to learn WordPress Core.
 * Version:     0.0.1
 * Requires at least: 6.0
 * Requires PHP: 8.1
 * Author:       Md Abdul Aziz
 * License:      GPL-2.0-or-later
 * Text Domain:  book-manager
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use BookManager\Plugin;

$plugin = new Plugin();

$plugin->run();
