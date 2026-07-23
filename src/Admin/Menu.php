<?php
namespace BookManager\Admin;

if (! defined('ABSPATH')) {
    exit;
}

class Menu {
    public function __construct() {
        add_action('admin_menu', [$this, 'register']);
    }

    public function register(): void {
        error_log('Menu::register() called');
    }
}
