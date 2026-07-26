<?php
    namespace BookManager\Admin;

    /**
 * Handles the rendering of the Book Manager admin page.
 */
    class BooksPage {
    /**
     * Validation errors.
     *
     * @var array
     */
    private array $errors = [];

    /**
     * Render the Book Manager admin page.
     *
     * @return void
     */
    public function render(): void {
        $this->handle_form_submission();

        $action = $_GET['action'] ?? 'list';

        if ($action === 'new') {
            $form = new BookForm($this->errors);

            $form->render();

            return;
        }

        $table = new BooksTable();

        $table->prepare_items();
        ?>

<div class="wrap">

    <h1 class="wp-heading-inline">Book Manager</h1>

    <a href="<?php echo esc_url(admin_url('admin.php?page=book-manager&action=new')); ?>" class="page-title-action">
        Add New
    </a>

    <hr class="wp-header-end">

    <?php $table->display(); ?>

</div>

<?php
    }

    /**
     * Handle the Add Book form submission.
     *
     * @return void
     */
    private function handle_form_submission(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (
            ! isset($_POST['action']) ||
            $_POST['action'] !== 'book_manager_store_book'
        ) {
            return;
        }

        if (
            ! isset($_POST['_wpnonce']) ||
            ! wp_verify_nonce(
                sanitize_text_field(
                    wp_unslash($_POST['_wpnonce'])
                ),
                'book_manager_store_book'
            )
        ) {
            wp_die('Security check failed.');
        }

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
            ? absint($_POST['year'])
            : 0;

        $this->errors = [];

        if ($title === '') {
            $this->errors[] = __('Title is required.', 'book-manager');
        }

        if ($author === '') {
            $this->errors[] = __('Author is required.', 'book-manager');
        }

        if ($year <= 0) {
            $this->errors[] = __('Year must be a valid number.', 'book-manager');
        }

        if (! empty($this->errors)) {
            return;
        }

        // Step 6:
        // Database Insert
    }
}
