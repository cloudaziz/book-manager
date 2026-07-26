<?php
    namespace BookManager\Admin;

    /**
 * Handles the rendering of the Book Manager form.
 */
    class BookForm {
    /**
     * Render the add new book form.
     *
     * @return void
     */
    public function render(): void {
        ?>
<div class="wrap">
    <h1>Add New Book</h1>

    <form method="post">

        <table class="form-table">
            <tbody>

                <tr>
                    <th scope="row">
                        <label for="title">Title</label>
                    </th>

                    <td>
                        <input type="text" id="title" name="title" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="author">Author</label>
                    </th>

                    <td>
                        <input type="text" id="author" name="author" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="year">Year</label>
                    </th>

                    <td>
                        <input type="number" id="year" name="year" class="small-text">
                    </td>
                </tr>

            </tbody>
        </table>

        <input type="hidden" name="action" value="book_manager_store_book">

        <?php wp_nonce_field('book_manager_store_book'); ?>

        <?php submit_button('Save Book'); ?>

    </form>
    <?php
        if (! empty($_POST)) {
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';
                }
            ?>
</div>
<?php
}
}
