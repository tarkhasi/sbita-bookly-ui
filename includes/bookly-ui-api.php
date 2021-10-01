<?php

if (!class_exists('BooklyUiApi')) {
    class BooklyUiApi
    {
        public static $namespace = 'bookly-ui/v1';

        public static function main()
        {
//            add_action('rest_api_init', array(__CLASS__, 'register_rest_routes'));
        }

        /**
         * Function to register our new routes from the controller.
         */
        public static function register_rest_routes()
        {
            register_rest_route(self::$namespace, '/form', array(
                array(
                    'methods' => WP_REST_Server::READABLE,
                    'callback' => array(__CLASS__, 'get_form'),
                    'args' => array(),
                )
            ));
        }

        /**
         * Get bookly form
         */
        public static function get_form(WP_REST_Request $request)
        {
            try {
                $params = $request->get_params();
                $shortcode = BooklyUiShortcodes::$categories_shortcode;
                if (isset($params['cat_id']) && $params['cat_id']) $shortcode = BooklyUiShortcodes::$services_shortcode;
                if (isset($params['service_id']) && $params['service_id']) $shortcode = BooklyUiShortcodes::$staff_members_shortcode;
                $shortcode = apply_filters('sbu_api_form_shortcode', $shortcode);
                $data['html'] = preg_replace( '/ {2,}/', '',do_shortcode("[$shortcode]"));

                return new WP_REST_Response(['data' => $data]);
            } catch (Exception $e) {
                return new WP_Error('error', $e->getMessage(), array('status' => 404));
            }
        }

    }
}