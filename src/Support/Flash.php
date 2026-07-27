<?php
namespace BookManager\Support;

/**
 * Flash message helper.
 */
class Flash {
    /**
     * Flash meta key.
     */
    private const META_KEY = '_book_manager_flash';

    /**
     * Store flash data.
     *
     * @param array<string, mixed> $data
     *
     * @return void
     */
    public static function put(array $data): void {
        update_user_meta(
            get_current_user_id(),
            self::META_KEY,
            $data
        );
    }

    /**
     * Get all flash data.
     *
     * @return array<string, mixed>
     */
    public static function all(): array {
        $data = get_user_meta(
            get_current_user_id(),
            self::META_KEY,
            true
        );

        if (! is_array($data)) {
            return [];
        }

        return $data;
    }

    /**
     * Get one flash value.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function get(
        string $key,
        mixed $default = null
    ): mixed {
        $data = self::all();

        return $data[$key] ?? $default;
    }

    /**
     * Remove flash data.
     *
     * @return void
     */
    public static function clear(): void {
        delete_user_meta(
            get_current_user_id(),
            self::META_KEY
        );
    }
}
