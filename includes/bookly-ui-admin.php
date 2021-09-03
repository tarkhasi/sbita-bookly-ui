<?php
// Sbita Bookly Ui Shortcodes

if (!class_exists('BooklyUiAdmin')) {
    class BooklyUiAdmin
    {
        /**
         * Main method
         */
        public static function main()
        {
            add_action('admin_init', array(__CLASS__, 'admin_init'));
        }

        /**
         * Admin init
         */
        public static function admin_init()
        {
            add_filter('plugin_action_links_' . sbita_plugin_dir_name(__FILE__) . '/main.php', array(__CLASS__, 'action_links'));
        }

        /**
         * Add links to plugins page
         *
         * @return mixed|string
         */
        public static function action_links($links)
        {

            array_unshift($links, '<a href="' . sbita_settings_url(BooklyUiSettings::$group_name) . '">Settings</a>');

            return $links;
        }

    }
}