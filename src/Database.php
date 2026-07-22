<?php
namespace BookManager;

class Database {

    public static function activate() {
        self::create_tables();
    }

    private static function create_tables() {

        global $wpdb;

        $table_name = $wpdb->prefix . 'book_manager_books';

        $charset_collate = $wpdb->get_charset_collate();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $sql = "CREATE TABLE {$table_name} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            author VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        dbDelta($sql);

        add_option('book_manager_db_version', '0.0.4');

    }

}
