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
            // Title
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputType('split');
            $whc_option->setLabel(__('Pages', 'sbita-bookly-ui'));
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

            // Line
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputHtml('<hr/>');
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Title
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputType('split');
            $whc_option->setLabel(__('Services', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();


            // Default Service Image
            $whc_option = new SbitaCoreOptionModel('bu_default_service_image');
            $whc_option->setDefaultValue(null);
            $whc_option->setDescription(__('Default image url for service', 'sbita-bookly-ui'));
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Default Service Image', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Item class
            $whc_option = new SbitaCoreOptionModel('bu_default_service_item_class');
            $whc_option->setDefaultValue('sbu-service-item sbu-box-shadow sbu-rounded sbu-border');
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Service Item Class', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Next button label
            $whc_option = new SbitaCoreOptionModel('bu_service_next_button_title');
            $whc_option->setDefaultValue('Next');
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Service Next Button Title', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();


            // Line
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputHtml('<hr/>');
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Title
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputType('split');
            $whc_option->setLabel(__('Staff Members', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Default Staff Image
            $whc_option = new SbitaCoreOptionModel('bu_default_staff_image');
            $whc_option->setDefaultValue(__('', 'sbita-bookly-ui'));
            $whc_option->setDescription(__('Default image url for staff members', 'sbita-bookly-ui'));
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Default Staff Image', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Item class
            $whc_option = new SbitaCoreOptionModel('bu_default_staff_item_class');
            $whc_option->setDefaultValue('sbu-staff-item sbu-box-shadow sbu-rounded sbu-border');
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Staff Item Class', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Next button label
            $whc_option = new SbitaCoreOptionModel('bs_service_next_button_title');
            $whc_option->setDefaultValue('Next');
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Service Next Button Title', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Line
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputHtml('<hr/>');
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Title
            $whc_option = new SbitaCoreOptionModel(null);
            $whc_option->setInputType('split');
            $whc_option->setLabel(__('Categories', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();

            // Categories item class
            $whc_option = new SbitaCoreOptionModel('bu_default_category_item_class');
            $whc_option->setDefaultValue('sbu-category-item sbu-box-shadow sbu-rounded  sbu-border');
            $whc_option->setInputType('text');
            $whc_option->setLabel(__('Category Item Class', 'sbita-bookly-ui'));
            $whc_option->setGroup(self::$group_name);
            $whc_option->add();


        }


    }
}