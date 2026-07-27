<?php
    namespace BookManager\Admin;

    use BookManager\Support\Flash;

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
        $flash = Flash::all();

        $errors  = $flash['errors'] ?? [];
        $old     = $flash['old'] ?? [];
        $success = $flash['success'] ?? '';

        Flash::clear();
        ?>

<div class="wrap">

    <h1><?php esc_html_e('Add New Book', 'book-manager'); ?></h1>

    <?php if (! empty($success)): ?>

    <div class="notice notice-success is-dismissible">
        <p><?php echo esc_html($success); ?></p>
    </div>

    <?php endif; ?>

    <?php if (! empty($errors)): ?>

    <div class="notice notice-error">

        <ul>

            <?php foreach ($errors as $error): ?>

            <li><?php echo esc_html($error); ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

    <?php endif; ?>

    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

        <table class="form-table">

            <tbody>

                <tr>

                    <th scope="row">

                        <label for="title">
                            <?php esc_html_e('Title', 'book-manager'); ?>
                        </label>

                    </th>

                    <td>

                        <input type="text" id="title" name="title" class="regular-text" value="<?php echo esc_attr($old['title'] ?? ''); ?>">

                    </td>

                </tr>

                <tr>

                    <th scope="row">

                        <label for="author">
                            <?php esc_html_e('Author', 'book-manager'); ?>
                        </label>

                    </th>

                    <td>

                        <input type="text" id="author" name="author" class="regular-text" value="<?php echo esc_attr($old['author'] ?? ''); ?>">

                    </td>

                </tr>

                <tr>

                    <th scope="row">

                        <label for="year">
                            <?php esc_html_e('Year', 'book-manager'); ?>
                        </label>

                    </th>

                    <td>

                        <input type="number" id="year" name="year" class="small-text" value="<?php echo esc_attr((string) ($old['year'] ?? '')); ?>">

                    </td>

                </tr>

            </tbody>

        </table>

        <input type="hidden" name="action" value="book_manager_store_book">

        <?php wp_nonce_field('book_manager_store_book'); ?>

        <?php submit_button(__('Save Book', 'book-manager')); ?>

    </form>

</div>

<?php
}
}
