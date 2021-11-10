<?php
// Sbita Bookly Ui Shortcodes

if (!class_exists('BooklyUiPages')) {
    class BooklyUiPages
    {
        /**
         * Create page in activation
         */
        public static function activation()
        {
            $check = get_option('sbu_created_pages');

            $result = apply_filters('sbu_create_pages', !$check);
            if (!$result) return;

            self::create();

            update_option('sbu_created_pages', true);
        }

        /**
         * Create default page
         */
        public static function create()
        {
            try {
                $pages = [
                    array(
                        'settings_key' => 'bu_services_page',
                        'post_title' => __('Services', 'sbita-bookly-ui'),
                        'post_content' => '[sbita-bookly-ui-services]',
                        'post_status' => 'publish',
                        'post_type' => 'page'
                    ),
                    array(
                        'settings_key' => 'bu_categories_page',
                        'post_title' => __('Categories', 'sbita-bookly-ui'),
                        'post_content' => '[sbita-bookly-ui-categories]',
                        'post_status' => 'publish',
                        'post_type' => 'page'
                    ),
                    array(
                        'settings_key' => 'bu_staff_members_page',
                        'post_title' => __('Staff Members', 'sbita-bookly-ui'),
                        'post_content' => '[sbita-bookly-ui-staff-members]',
                        'post_status' => 'publish',
                        'post_type' => 'page'
                    ),
                    array(
                        'settings_key' => 'bu_bookly_page',
                        'post_title' => __('Booking Page', 'sbita-bookly-ui'),
                        'post_content' => '[bookly-form hide="categories,services,staff_members,date,week_days,time_range"]',
                        'post_status' => 'publish',
                        'post_type' => 'page'
                    )
                ];

                $pages = apply_filters('sbu_default_pages', $pages);

                foreach ($pages as $page){
                    $post_id = wp_insert_post($page);
                    if (!$post_id) continue;
                    if (isset($page['settings_key'])) sbu_update_option($page['settings_key'], $post_id);
                }

                do_action('sbu_after_create_pages', $pages);
            } catch (Exception $e) {

            }
        }
    }
}