<?php
    namespace BookManager\Admin;

    /**
 * Handles the rendering of the Book Manager admin page.
 */
    class BooksPage {
    /**
     * Render the Book Manager admin page.
     *
     * @return void
     */
    public function render(): void {
        $action = isset($_GET['action'])
            ? sanitize_text_field(wp_unslash($_GET['action']))
            : 'list';

        if ($action === 'new') {
            $form = new BookForm();

            $form->render();

            return;
        }

        $table = new BooksTable();

        $table->prepare_items();

        ?>

<div class="wrap">

    <h1 class="wp-heading-inline">
        <?php esc_html_e('Book Manager', 'book-manager'); ?>
    </h1>

    <a href="<?php echo esc_url(admin_url('admin.php?page=book-manager&action=new')); ?>" class="page-title-action">
        <?php esc_html_e('Add New', 'book-manager'); ?>
    </a>

    <hr class="wp-header-end">

    <?php $table->display(); ?>

</div>

<?php
}
}
