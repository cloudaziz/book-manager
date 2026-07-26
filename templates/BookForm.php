<form method="post">

    <table class="form-table">

        <tr>
            <th>
                <label for="title">Title</label>
            </th>

            <td>
                <input type="text" id="title" name="title" class="regular-text">
            </td>
        </tr>

        <tr>
            <th>
                <label for="author">Author</label>
            </th>

            <td>
                <input type="text" id="author" name="author" class="regular-text">
            </td>
        </tr>

        <tr>
            <th>
                <label for="price">Price</label>
            </th>

            <td>
                <input type="number" id="price" name="price" step="0.01">
            </td>
        </tr>

    </table>

    <input type="hidden" name="action" value="book_manager_store_book">

    <?php submit_button('Save Book'); ?>

</form>
