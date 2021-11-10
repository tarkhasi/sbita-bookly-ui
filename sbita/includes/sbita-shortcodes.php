<?php


if (!class_exists('SbitaCoreShortcodes')) {

    class SbitaCoreShortcodes
    {
        public static function init()
        {
            add_shortcode('sbita-settings', array(__CLASS__, 'settings'));
            add_shortcode('sbita-licenses', array(__CLASS__, 'licenses'));
        }

        /**
         * Settings shortcode
         */
        public static function settings($attr)
        {
            include SBITA_TMP_DIR . '/shortcodes/settings.php';
            do_action('sbu_before_settings_shortcode');
        }

        /**
         * Licenses shortcode
         */
        public static function licenses($attr)
        {
            include SBITA_TMP_DIR . '/shortcodes/licenses.php';
            do_action('sbu_before_licenses_shortcode');
        }
    }
}