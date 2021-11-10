<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/*
SbiTa
Version: 1.1.1
*/

if (!class_exists('SbitaCore')) {

    define('SBITA_DIR', plugin_dir_path(__FILE__));
    define('SBITA_TMP_DIR', path_join(SBITA_DIR, 'templates'));

    include plugin_dir_path(__FILE__) . '/includes/functions.php';
    include plugin_dir_path(__FILE__) . '/includes/sbita-settings.php';
    include plugin_dir_path(__FILE__) . '/includes/sbita-settings-inputs.php';
    include plugin_dir_path(__FILE__) . '/includes/sbita-option-model.php';
    include plugin_dir_path(__FILE__) . '/includes/sbita-admin.php';
    include plugin_dir_path(__FILE__) . '/includes/sbita-shortcodes.php';
    include plugin_dir_path(__FILE__) . '/includes/sbita-ajax.php';


    class SbitaCore
    {
        /**
         * Main method
         */
        public static function main()
        {
            add_action('plugins_loaded', array(__CLASS__, 'textdomain'));
            add_action('init', array(__CLASS__, 'init'));
            add_action('admin_init', array(__CLASS__, 'admin_init'));

            SbitaCoreAdmin::main();
        }

        /**
         * Init plugin
         */
        public static function init()
        {
            self::add_script();

            SbitaCoreAdmin::init();
            SbitaCoreShortcodes::init();

        }

        /**
         * Admin init plugin
         */
        public static function admin_init()
        {
            SbitaCoreAjax::admin_init();

        }

        /**
         * Add scripts
         */
        private static function add_script()
        {
            // licenses scripts
            if (is_admin() && isset($_GET['page']) && $_GET['page'] == 'sbita-licenses'){
                wp_enqueue_script('sbita-js-license', plugin_dir_url(__FILE__) . 'assets/js/license.js', false, '1.0', false);
            }
        }

        /**
         * Load textdomain
         *
         * @return void
         */
        public static function textdomain()
        {
            load_plugin_textdomain('sbita', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }

        /**
         * Get assets url
         *
         * @param $path
         * @return string
         */
        public static function url($path)
        {
            return path_join(plugin_dir_url(__FILE__), $path);
        }

    }

    SbitaCore::main();
}
