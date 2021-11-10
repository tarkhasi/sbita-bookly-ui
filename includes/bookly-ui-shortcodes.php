<?php
// Sbita Bookly Ui Shortcodes

if (!class_exists('BooklyUiShortcodes')) {
    class BooklyUiShortcodes
    {
        public static $services_shortcode = 'sbita-bookly-ui-services';
        public static $staff_members_shortcode = 'sbita-bookly-ui-staff-members';
        public static $categories_shortcode = 'sbita-bookly-ui-categories';
        public static $form_shortcode = 'sbita-bookly-ui-form';

        public static function main()
        {
            try {
                add_shortcode(self::$services_shortcode, array(__CLASS__, 'services'));
                add_shortcode(self::$staff_members_shortcode, array(__CLASS__, 'staff_members'));
                add_shortcode(self::$categories_shortcode, array(__CLASS__, 'categories'));

            } catch (Exception $e) {
                sbu_show_admin_message($e->getMessage());
            }
        }

        public static function init()
        {
            //
        }

        public static function admin_init()
        {
            //
        }

        public static function services($attrs)
        {
            ob_start();
            include sbu_plugin_template(__FILE__, 'shortcodes/services.php');
            return ob_get_clean();
        }

        public static function staff_members($attrs)
        {
            ob_start();
            if (!sbu_check_licence()) {
                echo wp_kses_post(sbu_need_pro());
                return ob_get_clean();
            }

            include sbu_plugin_template(__FILE__, 'shortcodes/staff-members.php');
            return ob_get_clean();
        }

        public static function categories($attrs)
        {
            ob_start();
            if (!sbu_check_licence()) {
                echo wp_kses_post(sbu_need_pro());
                return ob_get_clean();
            }

            include sbu_plugin_template(__FILE__, 'shortcodes/categories.php');
            return ob_get_clean();
        }
    }
}