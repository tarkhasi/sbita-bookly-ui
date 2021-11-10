<?php


if (!class_exists('SbitaCoreSettingsInputs')) {

    class SbitaCoreSettingsInputs
    {
        /**
         * Admin init adtions
         */
        public static function admin_init()
        {
            add_action('sbu_generate_option', array(__CLASS__, 'default_input_html'), 1, 3);
            add_action('sbu_generate_option__label', array(__CLASS__, 'option_label'), 2, 2);
            add_action('sbu_generate_option__description', array(__CLASS__, 'option_description'), 2, 2);
            add_action('sbu_generate_option_textarea', array(__CLASS__, 'text_area_html'), 2, 3);
            add_action('sbu_generate_option_wp_dropdown_pages', array(__CLASS__, 'dropdown_pages_input'), 10, 3);
            add_action('sbu_generate_option_checkbox', array(__CLASS__, 'checkbox_input'), 10, 3);
            add_action('sbu_generate_option_split', array(__CLASS__, 'split_input'), 10, 3);
            add_action('sbu_generate_option_licence', array(__CLASS__, 'licence_input'), 10, 3);
        }

        /**
         * Option label
         *
         * @param SbitaCoreOptionModel $option
         * @param $label
         */
        public static function option_label($option, $label)
        {
            echo sprintf('<div style="margin-bottom: 5px;"><label for="%s"><b>%s</b></label></div>', esc_attr($option->key), esc_html($label));
        }

        /**
         * Option description
         *
         * @param SbitaCoreOptionModel $option
         */
        public static function option_description($option)
        {
            echo sprintf('<div style="color:#616161 !important;">%s</div>', wp_kses_post_deep($option->description));
        }

        /**
         * Text area input
         *
         * @param SbitaCoreOptionModel $option
         * @param $value
         * @param $label
         */
        public static function text_area_html($option, $value, $label)
        {
            do_action('sbu_generate_option__label', $option, $label);
            echo sprintf('<div><textarea rows="9" id="%s" name="%s" style="width:100%%; max-width:650px" placeholder=\'%s\'>%s</textarea></div>',
                esc_attr($option->key),
                esc_attr($option->key),
                esc_attr($option->placeholder),
                esc_textarea($value)
            );
            do_action('sbu_generate_option__description', $option);
        }

        /**
         * Default input html
         *
         * @param SbitaCoreOptionModel $option
         */
        public static function default_input_html($option, $value, $label)
        {
            do_action('sbu_generate_option__label', $option, $label);
            echo sprintf('<input type="%s" id="%s" name="%s" placeholder=\'%s\' value="%s" style="width: 250px; max-width: 100%%"/>',
                esc_attr($option->input_type),
                esc_attr($option->key),
                esc_attr($option->key),
                esc_attr($option->placeholder),
                esc_attr($value)
            );
            do_action('sbu_generate_option__description', $option);
        }


        /**
         * Licence input html
         *
         * @param SbitaCoreOptionModel $option
         */
        public static function licence_input($option, $value, $label)
        {
            $verified = false;
            $product_id = null;
            if (isset($option->data['verified'])) $verified = $option->data['verified'];
            if (isset($option->data['product_id'])) $product_id = $option->data['product_id'];

            do_action('sbu_generate_option__label', $option, $label);
            echo sprintf('<input onchange="SbitaLicense.activation(%s)" onkeyup="SbitaLicense.activation(%s)" type="%s" id="%s" name="%s" placeholder=\'%s\' value="%s" style="width: 300px; max-width: 100%%"/>',
                esc_attr("'" . $option->key . "'"),
                esc_attr("'" . $option->key . "'"),
                esc_attr($option->input_type),
                esc_attr($option->key),
                esc_attr($option->key),
                esc_attr($option->placeholder),
                esc_attr($value)
            );
            echo sprintf('<input type="hidden" id="product_id_%s" name="product_id_%s" value="%s"/>',
                esc_attr($option->key),
                esc_attr($option->key),
                esc_attr($product_id ?? '')
            );
            echo sprintf("&nbsp;<span id='licence_result_%s' style='color:%s'>%s</span>",
                esc_attr__($option->key),
                $verified ? 'green' : 'black',
                $verified ? __('Activated!', 'sbita') : ($value ? __('Invalid!', 'sbita') : '')
            );
            do_action('sbu_generate_option__description', $option);
        }

        /**
         * Checkbox input html
         *
         * @param SbitaCoreOptionModel $option
         */
        public static function checkbox_input($option, $value, $label)
        {
            $id = 'checkbox_id_' . uniqid();
            echo sprintf('<input type="checkbox" id=" % s" name=" % s" value="1"  %s />',
                esc_attr($id),
                esc_attr($option->key),
                esc_html($value == '1' ? 'checked' : '')
            );
            echo sprintf('<label for=" % s"><b>%s</b></label>',
                esc_attr($id),
                esc_html($label)
            );
            do_action('sbu_generate_option__description', $option);

        }

        /**
         * Title for inputs
         *
         * @param SbitaCoreOptionModel $option
         */
        public static function split_input($option, $value, $label)

        {
            echo '<h3>' . esc_html($label) . '</h3>';
            do_action('sbu_generate_option__description', $option);
        }

        /**
         * Text area input for sbita settings
         *
         * @param SbitaCoreOptionModel $option
         */
        public static function dropdown_pages_input($option, $value, $label)
        {
            $array = [
                'name' => $option->key,
                'id' => $option->key,
                'echo' => 0,
                'show_option_none' => __('None', 'sbita'),
            ];

            // select value

            do_action('sbu_generate_option__label', $option, $label);
            $url = '';
            if ($value) {
                $array['selected'] = $value;
                $url = get_permalink($value);
                echo sprintf("<div>%s <a href='%s' target='_blank'> %s </a> </div> ", wp_dropdown_pages($array), esc_url($url), esc_html__('View', 'sbita-bookly-ui'));
            } else {
                echo sprintf("<div>%s </div> ", wp_dropdown_pages($array));
            }

            do_action('sbu_generate_option__description', $option);
        }

    }
}