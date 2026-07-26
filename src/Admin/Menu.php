<?php
namespace BookManager\Admin;

/**
 * Handles the registration of WordPress admin menus.
 */
class Menu {
    /**
     * Register all admin-related hooks.
     *
     * @return void
     */
    public function register(): void {
        add_action('admin_menu', [$this, 'register_menu']);
    }

    /**
     * Register the Book Manager admin menu.
     *
     * @return void
     */
    public function register_menu(): void {
        $page = new BooksPage();

        add_menu_page(
            'Book Manager',
            'Book Manager',
            'manage_options',
            'book-manager',
            [$page, 'render'],
            'dashicons-book',
            25
        );
    }
}
