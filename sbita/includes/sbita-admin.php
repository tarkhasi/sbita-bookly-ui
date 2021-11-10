<?php


if (!class_exists('SbitaCoreAdmin')) {

    class SbitaCoreAdmin
    {
        /**
         * Main
         */
        public static function main()
        {
            add_action('admin_menu', array(__CLASS__, 'admin_menu'));
            add_action('admin_init', array(__CLASS__, 'admin_init'));
        }

        /**
         * Run
         */
        public static function init()
        {

        }

        /**
         * Admin init
         */
        public static function admin_init()
        {
            self::register_settings_options();
        }

        /**
         * Add links to plugins page
         *
         * @return mixed|string
         */
        public static function action_links($links)
        {

            array_unshift($links, '<a href="' . sbu_settings_url() . '">'.__('Settings','sbita').'</a>');

            return $links;
        }

        /**
         * Register a custom menu page.
         */
        public static function admin_menu()
        {
            add_menu_page(
                __('Bookly Ui', 'sbita'),
                __('Bookly Ui', 'sbita'),
                null,
                'sbita',
                null,
                plugins_url('sbita/assets/img/logo-icon.png'),
                80
            );
            add_submenu_page(
                'sbita',
                __('Settings', 'sbita'),
                __('Settings', 'sbita'),
                'manage_options',
                'sbita-settings',
                array(__CLASS__, 'settings_page')
            );
            add_submenu_page(
                'sbita',
                __('Licenses', 'sbita'),
                __('Licenses', 'sbita'),
                'manage_options',
                'sbita-licenses',
                array(__CLASS__, 'licenses_page')
            );
            add_submenu_page(
                'sbita',
                __('About', 'sbita'),
                __('About', 'sbita'),
                'manage_options',
                'sbita-about',
                array(__CLASS__, 'dashboard_page')
            );
        }

        /**
         * Settings page
         */
        public static function settings_page()
        {
            require sbu_sbita_plugin_template(__FILE__, 'settings.php');
        }

        /**
         * Display a custom menu page
         */
        public static function dashboard_page()
        {
            require sbu_sbita_plugin_template(__FILE__, 'about.php');
        }

        /**
         * Licenses page
         */
        public static function licenses_page()
        {
            require sbu_sbita_plugin_template(__FILE__, 'licenses.php');
        }

        /**
         * Register all sbita options
         */
        public static function register_settings_options()
        {
            SbitaCoreSettings::admin_init();
            SbitaCoreSettingsInputs::admin_init();
        }


    }

}