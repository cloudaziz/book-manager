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
        ?>
<div class="wrap">
    <h1 class="wp-heading-inline">Book Manager</h1>

    <a href="#" class="page-title-action">
        Add New
    </a>

    <hr class="wp-header-end">

    <p>Welcome to Book Manager Plugin.</p>
</div>
<?php
}
}
