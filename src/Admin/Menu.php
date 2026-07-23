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
        // error_log('Menu::register() called');
        add_menu_page(
            'Book Manager',
            'Book Manager',
            'manage_options',
            'book-manager',
            [$this, 'render'],
            'dashicons-book',
            65
        );
    }

    public function render(): void {
        echo '<h1>Book Manager</h1>';
    }
}
