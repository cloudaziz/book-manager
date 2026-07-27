<?php
namespace BookManager\Controllers;

use BookManager\Database;
use BookManager\Support\Flash;

/**
 * Handles book-related actions.
 */
class BookController {
    /**
     * Store a new book.
     *
     * @return void
     */
    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        check_admin_referer('book_manager_store_book');

        if (! current_user_can('manage_options')) {
            wp_die(
                esc_html__(
                    'You are not allowed to perform this action.',
                    'book-manager'
                )
            );
        }

        $title = isset($_POST['title'])
            ? sanitize_text_field(wp_unslash($_POST['title']))
            : '';

        $author = isset($_POST['author'])
            ? sanitize_text_field(wp_unslash($_POST['author']))
            : '';

        $year = isset($_POST['year'])
            ? absint(wp_unslash($_POST['year']))
            : 0;

        $errors = [];

        if ($title === '') {
            $errors[] = __('Title is required.', 'book-manager');
        }

        if ($author === '') {
            $errors[] = __('Author is required.', 'book-manager');
        }

        if ($year <= 0) {
            $errors[] = __('Year must be a valid number.', 'book-manager');
        }

        if (! empty($errors)) {

            Flash::put([
                'errors' => $errors,
                'old'    => [
                    'title'  => $title,
                    'author' => $author,
                    'year'   => $year,
                ],
            ]);

            wp_safe_redirect(
                admin_url(
                    'admin.php?page=book-manager&action=new'
                )
            );

            exit;
        }

        $book_id = Database::insert_book(
            $title,
            $author,
            $year
        );

        if ($book_id === false) {

            Flash::put([
                'errors' => [
                    __('Failed to save the book.', 'book-manager'),
                ],
                'old'    => [
                    'title'  => $title,
                    'author' => $author,
                    'year'   => $year,
                ],
            ]);

            wp_safe_redirect(
                admin_url(
                    'admin.php?page=book-manager&action=new'
                )
            );

            exit;
        }

        Flash::put([
            'success' => __('Book created successfully.', 'book-manager'),
        ]);

        wp_safe_redirect(
            admin_url(
                'admin.php?page=book-manager&action=new'
            )
        );

        exit;
    }
}
