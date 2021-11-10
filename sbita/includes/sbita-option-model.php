<?php


if (!class_exists('SbitaCoreOptionModel')) {

    class SbitaCoreOptionModel
    {
        public $key;
        public $label;
        public $group;
        public $default_value;
        public $input_html;
        public $input_type;
        public $description;
        public $placeholder;
        public $data = [];


        public function __construct($key)
        {
            $this->key = sbu_pre_key() . $key;
            $this->group = 'General';
            $this->input_type = 'text';
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }

        /**
         * @param string $input_type
         */
        public function setInputType($input_type)
        {
            $this->input_type = $input_type;
        }

        /**
         * @param mixed $default_value
         */
        public function setDefaultValue($default_value)
        {
            $this->default_value = $default_value;
        }

        /**
         * @param mixed $label
         */
        public function setLabel($label)
        {
            $this->label = $label;
        }

        /**
         * @param mixed $placeholder
         */
        public function setPlaceholder($placeholder)
        {
            $this->placeholder = $placeholder;
        }

        /**
         * @param mixed $input_html
         */
        public function setInputHtml($input_html)
        {
            $this->input_html = $input_html;
        }

        /**
         * @param mixed $data
         */
        public function setData($data = array())
        {
            $this->data = $data;
        }

        /**
         * @param string $group
         */
        public function setGroup($group)
        {
            $this->group = $group;
        }

        /**
         * Add option to settings
         */
        public function add($filter = 'sbu_options', $group_filter = 'sbu_options_groups')
        {
            if (!empty($filter)) {
                add_filter($filter, function ($array) {
                    $array[] = $this;
                    return $array;
                });
            }

            if (!empty($group_filter)) {
                add_filter('sbu_options_groups', function ($array) {
                    $group = $this->group ?? 'Main';
                    $array[$group] = isset($array[$group]) ? $array[$this->group] + 1 : 1;
                    return $array;
                });
            }

        }

        public function generate()
        {
            if (!empty($this->input_html)) {
                echo wp_kses_post_deep($this->input_html);
                return;
            }


            $value = get_option($this->key, $this->default_value);
            $label = !$this->label ? str_replace('_', ' ', $this->key) : $this->label;

            $action = "sbu_generate_option_{$this->input_type}";
            if (!has_action($action)) $action = 'sbu_generate_option';
            do_action("sbu_after_generate_input_{$this->key}", $this, $value, $label);
            do_action($action, $this, $value, $label);
            do_action("sbu_before_generate_input_{$this->key}", $this, $value, $label);

        }
    }

}