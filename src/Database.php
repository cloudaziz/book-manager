<?php
namespace BookManager;

class Database {
    /**
     * Run on plugin activation.
     *
     * @return void
     */
    public static function activate(): void {
        self::create_table();
    }

    /**
     * Create the books table.
     *
     * @return void
     */
    private static function create_table(): void {
        global $wpdb;

        $table_name = $wpdb->prefix . 'book_manager_books';

        $charset_collate = $wpdb->get_charset_collate();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $sql = "CREATE TABLE {$table_name} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            author VARCHAR(255) NOT NULL,
            year SMALLINT UNSIGNED NOT NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        dbDelta($sql);

        update_option(
            'book_manager_db_version',
            '0.1.2'
        );
    }

    /**
     * Insert a new book.
     *
     * @param string $title  Book title.
     * @param string $author Book author.
     * @param int    $year   Publication year.
     *
     * @return int|false
     */
    public static function insert_book(
        string $title,
        string $author,
        int $year
    ): int | false {
        global $wpdb;

        $table_name = $wpdb->prefix . 'book_manager_books';

        $result = $wpdb->insert(
            $table_name,
            [
                'title'      => $title,
                'author'     => $author,
                'year'       => $year,
                'created_at' => current_time('mysql'),
            ],
            [
                '%s',
                '%s',
                '%d',
                '%s',
            ]
        );

        if ($result === false) {
            return false;
        }

        return (int) $wpdb->insert_id;
    }

    /**
     * Retrieve all books.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function get_books(): array {
        global $wpdb;

        $table_name = $wpdb->prefix . 'book_manager_books';

        return $wpdb->get_results(
            "SELECT * FROM {$table_name} ORDER BY id DESC",
            ARRAY_A
        );
    }
}
