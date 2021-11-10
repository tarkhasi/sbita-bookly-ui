<?php


if (!class_exists('SbitaCoreAjax')) {

    class SbitaCoreAjax
    {
        /**
         * Main
         */
        public static function main()
        {

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
            add_action('wp_ajax_sbu_active_license', array(__CLASS__, 'activate_license'));
        }

        /**
         * Active license ajax
         */
        public static function activate_license()
        {
            $edd_action = 'activate_license';
            $item_id = trim(sanitize_text_field($_GET['item_id']));
            $license = trim(sanitize_text_field($_GET['license']));
            $key = trim(sanitize_text_field($_GET['key']));

            if (!$key || !$item_id || !$license) wp_send_json_error(null);

            $result = sbu_licence($license, $item_id, $edd_action);
            if (!$result) {
                update_option($key, $license);
                update_option("{$key}_activated", false);
                wp_send_json_error(null);
            }

            update_option($key, $license);
            update_option("{$key}_activated", true);
            wp_send_json_success();
        }

    }

}