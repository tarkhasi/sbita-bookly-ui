<?php


if (!class_exists('SbitaCoreSettings')) {

    class SbitaCoreSettings
    {
        /**
         * Admin init
         */
        public static function admin_init()
        {
            self::register();
        }

        /**
         * Register options
         */
        public static function register()
        {
            $array = array();
            $options = apply_filters('sbu_options', $array);
            if (!$options || !is_array($options)) return;

            foreach ($options as $input) {
                self::register_option($input);
            }
        }

        /**
         * Register option item
         *
         * @param $option
         */
        private static function register_option($option)
        {
            try {
                if (!is_a($option, 'SbitaCoreOptionModel')) return;

                // register setting and create option
                if ($option->key != null) {
                    add_option($option->key, $option->default_value);
                    register_setting('sbita', $option->key);
                }
            } catch (Exception $e) {
                // log
            }
        }
    }
}