<?php
namespace BookManager;

class Plugin {

    /**
     * Runs on every request when the plugin is active.
     */
    public function run(): void {
        error_log(__METHOD__);
    }

    /**
     * Runs once when the plugin is activated.
     */
    public function activate(): void {

        error_log(__METHOD__);

        Database::activate();
    }

    /**
     * Runs once when the plugin is deactivated.
     */
    public function deactivate(): void {
        error_log(__METHOD__);
    }

}
