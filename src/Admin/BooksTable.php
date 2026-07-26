<?php
namespace BookManager\Admin;

if (! class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
use BookManager\Database;

/**
 * Handles the Book Manager list table.
 */
class BooksTable extends \WP_List_Table {
    /**
     * Create a new BooksTable instance.
     */
    public function __construct() {
        parent::__construct([
            'singular' => 'book',
            'plural'   => 'books',
            'ajax'     => false,
        ]);
    }

    /**
     * Prepare the table items.
     *
     * @return void
     */
    /**
     * Prepare the table items.
     *
     * @return void
     */
    public function prepare_items(): void {
        $this->_column_headers = [
            $this->get_columns(),
            [],
            [],
        ];

        $this->items = Database::get_books();
    }

    /**
     * Return the table columns.
     *
     * @return array<string, string>
     */
    public function get_columns(): array {
        return [
            'title'      => 'Title',
            'author'     => 'Author',
            'created_at' => 'Year',
        ];
    }

    /**
     * Render the default column output.
     *
     * @param array  $item        Current item.
     * @param string $column_name Current column name.
     *
     * @return string
     */
    public function column_default($item, $column_name): string {
        return $item[$column_name] ?? '';
    }
}
