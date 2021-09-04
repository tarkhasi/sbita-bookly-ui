<?php
// Sbita Bookly Ui Shortcodes

if (!class_exists('BooklyUiStaffMembers')) {
    class BooklyUiStaffMembers
    {
        public static function main()
        {
            add_action('sbu_staff_button', array(__CLASS__, 'item_buttons'), 1, 2);
            add_action('sbu_staff_members_list_before', array(__CLASS__, 'show_filters'), 1, 2);

            add_filter('sbu_staff_item_url', array(__CLASS__, 'default_item_link'), 1, 3);

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
            $page_id = sbita_get_option('bu_bookly_page');
            if (!$page_id) return $url;

            $url = get_permalink($page_id);
            $url = $url . '?staff_id=' . $item['id'];

            // params
            $service_id = $_GET['service_id'] ?? null;
            $category_id = $_GET['cat_id'] ?? null;
            $location_id = $_GET['loc_id'] ?? null;

            $service_id = $attrs['service_id'] ?? $service_id;
            $category_id = $attrs['cat_id'] ?? $category_id;
            $location_id = $attrs['loc_id'] ?? $location_id;

            $service_id = apply_filters('sbu_shortcode_staff_service_id', $service_id, $attrs);

            if ($service_id) $url .= '&service_id='.$service_id;
            if ($location_id) $url .= '&loc_id='.$location_id;
            if ($category_id) $url .= '&cat_id='.$category_id;

            return $url;
        }

        /**
         * Staff item button
         *
         * @param $item
         * @param $attrs
         */
        public static function item_buttons($item, $attrs)
        {
            $url = apply_filters('sbu_staff_item_url', null, $item, $attrs);
            if (!$url) return;
            $title = sbita_get_option('bu_staff_next_button_title') ?? 'Next';

            echo '<a href="' . $url . '"  >
                        <button class="sub-btn sub-btn-success sbu-rounded sbu-bookly-bg-hover">' . __($title, 'sbita-bookly-ui') . '</button>
                </a>';
        }

        /**
         * Show services list filters
         *
         * @param $data
         * @param $attrs
         * @return null
         */
        public static function show_filters($data, $attrs)
        {
            require SBU_TMP_DIR . '/staff/filters.php';
        }

    }
}