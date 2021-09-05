<?php
if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}
if (!class_exists('BooklyUiRelations')) {
    class BooklyUiRelations
    {


        /**
         * Minimum Elementor Version
         *
         * @since 1.0.0
         * @var string Minimum Elementor version required to run the plugin.
         */
        const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

        /**
         * Minimum PHP Version
         *
         * @since 1.0.0
         * @var string Minimum PHP version required to run the plugin.
         */
        const MINIMUM_PHP_VERSION = '7.0';


        /**
         * Main method
         */
        public static function main()
        {
            add_action('plugins_loaded', array(__CLASS__, 'load'));
        }

        /**
         * Admin init
         */
        public static function load()
        {

            // Check if Elementor installed and activated.
            if (!did_action('elementor/loaded')) {
                add_action('admin_notices', array(__CLASS__, 'admin_notice_missing_main_plugin'));
                return;
            }

            // Check for required Elementor version.
            if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
                add_action('admin_notices', array(__CLASS__, 'admin_notice_minimum_elementor_version'));
                return;
            }

            // Check for required PHP version.
            if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
                add_action('admin_notices', array(__CLASS__, 'admin_notice_minimum_php_version'));
                return;
            }

            // Once we get here, We have passed all validation checks so we can safely include our widgets.
            require_once 'elementor/widgets.php';
        }


        /**
         * Admin notice
         *
         * Warning when the site doesn't have Elementor installed or activated.
         *
         * @since 1.0.0
         * @access public
         */
        public static function admin_notice_missing_main_plugin()
        {
            deactivate_plugins(sbita_plugin_dir_name(__FILE__));

            return sprintf(
                wp_kses(
                    '<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> to be installed and activated.</p></div>',
                    array(
                        'div' => array(
                            'class' => array(),
                            'p' => array(),
                            'strong' => array(),
                        ),
                    )
                ),
                'Elementor Awesomesauce',
                'Elementor'
            );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required Elementor version.
         *
         * @since 1.0.0
         * @access public
         */
        public static function admin_notice_minimum_elementor_version()
        {
            deactivate_plugins(sbita_plugin_dir_name(__FILE__));

            return sprintf(
                wp_kses(
                    '<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> version %3$s or greater.</p></div>',
                    array(
                        'div' => array(
                            'class' => array(),
                            'p' => array(),
                            'strong' => array(),
                        ),
                    )
                ),
                'Elementor Awesomesauce',
                'Elementor',
                self::MINIMUM_ELEMENTOR_VERSION
            );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required PHP version.
         *
         * @since 1.0.0
         * @access public
         */
        public static function admin_notice_minimum_php_version()
        {
            deactivate_plugins(sbita_plugin_dir_name(__FILE__));

            return sprintf(
                wp_kses(
                    '<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> version %3$s or greater.</p></div>',
                    array(
                        'div' => array(
                            'class' => array(),
                            'p' => array(),
                            'strong' => array(),
                        ),
                    )
                ),
                'Elementor Awesomesauce',
                'Elementor',
                self::MINIMUM_ELEMENTOR_VERSION
            );
        }

    }
}