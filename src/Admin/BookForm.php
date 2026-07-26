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

        <?php submit_button('Save Book'); ?>

    </form>
</div>
<?php
}
}
