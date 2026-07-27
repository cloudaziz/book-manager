<?php
namespace BookManager;

use BookManager\Admin\Menu;
use BookManager\Controllers\BookController;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Main plugin class.
 */
class Plugin {
    /**
     * Runs on every request when the plugin is active.
     *
     * @return void
     */
    public function run(): void {
        error_log(__METHOD__);

        $menu = new Menu();
        $menu->register();

        $book_controller = new BookController();

        add_action(
            'admin_post_book_manager_store_book',
            [
                $book_controller,
                'store',
            ]
        );
    }

    /**
     * Runs once when the plugin is activated.
     *
     * @return void
     */
    public function activate(): void {
        error_log(__METHOD__);

        Database::activate();
    }

    /**
     * Runs once when the plugin is deactivated.
     *
     * @return void
     */
    public function deactivate(): void {
        error_log(__METHOD__);
    }
}
