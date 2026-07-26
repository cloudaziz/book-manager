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
        $action = $_GET['action'] ?? 'list';

        if ($action === 'new') {
            $form = new BookForm();

            $form->render();

            return;
        }

        $table = new BooksTable();

        $table->prepare_items();
        ?>
<div class="wrap">
    <h1 class="wp-heading-inline">Book Manager</h1>

    <a href="<?php echo admin_url('admin.php?page=book-manager&action=new'); ?>" class="page-title-action">
        Add New
    </a>

    <hr class="wp-header-end">

    <?php $table->display(); ?>
</div>
<?php
}
}
