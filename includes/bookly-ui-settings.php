<?php
// Sbita Bookly Ui Settings

if (!class_exists('BooklyUiSettings')) {
    class BooklyUiSettings
    {
        public static $group_name = 'Bookly Ui';

        public static function main()
        {
            add_action('admin_init', array(__CLASS__, 'admin_init'));

        }


        public static function admin_init()
        {
            self::add_settings();
        }

        private static function add_settings()
        {
            // Default Staff Image
            $whc_option = new SbitaCoreOptionModel('bu_default_staff_image');
            $whc_option->setDefaultValue(__('', 'sbita-bookly-ui'));
            $whc_option->setDescription(__('Default image url for staff members', 'sbita-bookly-ui'));
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Default Staff Image', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Default Service Image
            $whc_option = new SbitaCoreOptionModel('bu_default_service_image');
            $whc_option->setDefaultValue(__('', 'sbita-bookly-ui'));
            $whc_option->setDescription(__('Default image url for service', 'sbita-bookly-ui'));
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Default Service Image', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Categories Page
            $whc_option = new SbitaCoreOptionModel('bu_categories_page');
            $whc_option->setDefaultValue(null);
            $whc_option->setDescription(__('This page must contain of `[sbita-bookly-ui-categories]` shortcode','sbita-bookly-ui'));
            $whc_option->setInputType('wp_dropdown_pages');
            $whc_option->setLabel(__('Categories Page', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Services Page
            $whc_option = new SbitaCoreOptionModel('bu_services_page');
            $whc_option->setDefaultValue(null);
            $whc_option->setDescription(__('This page must contain of `[sbita-bookly-ui-services]` shortcode','sbita-bookly-ui'));
            $whc_option->setInputType('wp_dropdown_pages');
            $whc_option->setLabel(__('Services Page', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Staff members
            $whc_option = new SbitaCoreOptionModel('bu_staff_members_page');
            $whc_option->setDefaultValue(null);
            $whc_option->setDescription(__('This page must contain of `[sbita-bookly-ui-staff-members]` shortcode','sbita-bookly-ui'));
            $whc_option->setInputType('wp_dropdown_pages');
            $whc_option->setLabel(__('Staff Members Page', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Bookly page
            $whc_option = new SbitaCoreOptionModel('bu_bookly_page');
            $whc_option->setDefaultValue(null);
            $whc_option->setDescription(__('This page must contain of `[bookly-form]` shortcode','sbita-bookly-ui'));
            $whc_option->setInputType('wp_dropdown_pages');
            $whc_option->setLabel(__('Bookly Page', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

        }


    }
}