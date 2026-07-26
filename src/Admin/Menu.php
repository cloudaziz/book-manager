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
        add_menu_page(
            'Book Manager',
            'Book Manager',
            'manage_options',
            'book-manager',
            [$this, 'render_page'],
            'dashicons-book',
            25
        );
    }

    /**
     * Render the Book Manager admin page.
     *
     * @return void
     */
    public function render_page(): void {
        echo '<div class="wrap">';
        echo '<h1>Book Manager</h1>';
        echo '<p>Welcome to Book Manager Plugin.</p>';
        echo '</div>';
    }
}
