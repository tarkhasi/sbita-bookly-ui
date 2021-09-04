<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/*
Plugin Name: SbiTa Bookly Ui (Add-on)
Description: SbiTa Bookly Ui add-on x allows you to have a better ui of services, staffs and categories in the Bookly plugin.
Version: 1.0.0
Author: WebKok
Author URI:
Domain Path: /languages
Text Domain: sbita-bookly-ui
*/

if (!class_exists('SbitaBooklyUi')) {

    define('SBU_TMP_DIR', path_join(plugin_dir_path(__FILE__), 'templates'));

    require_once ABSPATH . 'wp-admin/includes/plugin.php';

    include plugin_dir_path(__FILE__) . '/includes/functions.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-shortcodes.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-settings.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-pages.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-services.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-categories.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-staff-members.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-admin.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-form.php';
    include plugin_dir_path(__FILE__) . '/includes/bookly-ui-api.php';


    class SbitaBooklyUi
    {
        /**
         * Main Method
         */
        public static function main()
        {
            $result = is_plugin_active('sbita/main.php') && is_plugin_active('bookly-addon-pro/main.php');
            if (!$result) return self::need_core_message();

            add_action('wp_enqueue_scripts', array(__CLASS__, 'add_script'));
            add_action('plugins_loaded', array(__CLASS__, 'textdomain'));
            add_action('init', array(__CLASS__, 'init'));
            register_activation_hook(__FILE__, array(__CLASS__, 'activation'));

            BooklyUiApi::main();
            BooklyUiAdmin::main();
            BooklyUiShortcodes::main();
            BooklyUiSettings::main();
            BooklyUiCategories::main();
            BooklyUiForm::main();
        }

        /**
         * Init plugin
         */
        public static function init()
        {
            BooklyUiServices::init();
            BooklyUiStaffMembers::init();
            BooklyUiShortcodes::init();
            BooklyUiForm::init();
        }


        /**
         * Load textdomain
         *
         * @return void
         */
        public static function textdomain()
        {
            load_plugin_textdomain('sbita-bookly-ui', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }

        /**
         * Core message
         *
         */
        public static function need_core_message()
        {
            add_action('admin_notices', function () {
                echo "
                <div class='notice notice-error is-dismissible'>
                        <p>SbiTa Bookly Ui: Need `SbiTa`  and 
                        <a href='https://wordpress.org/plugins/bookly-responsive-appointment-booking-tool/'>Bookly</a>
                        plugins!</p>
                </div>";
            });
            return null;
        }

        /**
         * Activation
         */
        public static function activation()
        {
            BooklyUiPages::activation();
        }


        /**
         * Add scripts
         */
        public static function add_script()
        {
            wp_enqueue_style('bookly-ui', plugin_dir_url(__FILE__) . 'assets/css/bookly-ui-main.css', false, '1.0', 'all');
        }

    }

    SbitaBooklyUi::main();
}
