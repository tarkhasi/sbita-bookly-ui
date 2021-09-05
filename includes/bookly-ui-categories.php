<?php
// Sbita Bookly Ui Shortcodes

if (!class_exists('BooklyUiCategories')) {
    class BooklyUiCategories
    {
        public static function main()
        {
            add_filter('sbu_category_item_url', array(__CLASS__, 'default_item_link'), 1, 3);
        }

        /**
         * Default link for item
         *
         * @param $url
         * @param $item
         * @param $attrs
         * @return mixed|string
         */
        public static function default_item_link($url, $item, $attrs)
        {
            // create item url by services page
            $page_id = sbita_get_option('bu_services_page');
            if (!$page_id) return $url;

            $url = get_permalink($page_id);
            $url = $url . '?cat_id=' . $item['id'];

            // staff id
            $staff_id = $_GET['staff_id'] ?? null;
            $staff_id = $attrs['staff_id'] ?? $staff_id;
            $staff_id = apply_filters('sbu_shortcode_categories_staff_id', $staff_id, $attrs);

            $url .= '&' . $staff_id;
            return $url;
        }

    }
}