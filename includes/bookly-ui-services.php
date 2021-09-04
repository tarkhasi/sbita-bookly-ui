<?php
// Sbita Bookly Ui Shortcodes

if (!class_exists('BooklyUiServices')) {
    class BooklyUiServices
    {
        public static function main()
        {
            add_action('sbu_service_button', array(__CLASS__, 'item_buttons'), 1, 2);
            add_action('sbu_services_list_before', array(__CLASS__, 'show_filters'), 1, 2);

            add_filter('sbu_service_url', array(__CLASS__, 'default_service_url'), 1, 3);

        }

        /**
         * Default service url
         *
         * @param $url
         * @param $item
         * @return mixed|string
         */
        public static function default_service_url($url, $item, $attrs)
        {
            // create item url by staff members page
            $page_id = sbita_get_option('bu_staff_members_page');
            if ($page_id) {
                $url = get_permalink($page_id);
                $url = $url . '?service_id=' . $item['id'];

                // params
                $category_id = $_GET['cat_id'] ?? null;
                $staff_id = $_GET['staff_id'] ?? null;
                $location_id = null;

                $category_id = $attrs['cat_id'] ?? $category_id;
                $staff_id = $attrs['staff_id'] ?? $staff_id;

                $location_id = apply_filters('sbu_shortcode_services_location_id', $location_id, $attrs);
                $staff_id = apply_filters('sbu_shortcode_services_staff_id', $staff_id, $attrs);
                $category_id = apply_filters('sbu_shortcode_services_category_id', $category_id, $attrs);

                if ($location_id) $url .= '&loc_id=' . $location_id;
                if ($staff_id) $url .= '&staff_id=' . $staff_id;
                if ($category_id) $url .= '&cat_id=' . $category_id;
            }
            return $url;
        }

        /**
         * Service item button
         *
         * @param $item
         * @param $attrs
         */
        public static function item_buttons($item, $attrs)
        {
            $url = apply_filters('sbu_service_url', null, $item, $attrs);
            if (!$url) return;
            $title = sbita_get_option('bu_service_next_button_title') ?? 'Next';

            echo '<a href="' . $url . '"  >
                        <button class="sub-btn sub-btn-success sbu-rounded sbu-bookly-bg-hover">' . __($title, 'sbita-bookly-ui') . '</button>
                </a>';
        }

        /**
         * Show services list filters
         *
         * @param $data
         * @param $attrs
         */
        public static function show_filters($data, $attrs)
        {
            require SBU_TMP_DIR . '/services/filters.php';
        }

    }
}