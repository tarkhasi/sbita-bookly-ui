<?php

namespace BooklyUiElementor;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets
{

    /**
     * Instance
     *
     * @since 1.0.0
     * @access private
     * @static
     *
     * @var Plugin The single instance of the class.
     */
    private static $instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @return Plugin An instance of the class.
     * @since 1.0.0
     * @access public
     *
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Include Widgets files
     *
     * Load widgets files
     *
     * @since 1.0.0
     * @access private
     */
    private function include_widgets_files()
    {
        require_once 'widgets/class-services.php';
        require_once 'widgets/class-categories.php';
    }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since 1.0.0
     * @access public
     */
    public function register_widgets($elements_manager)
    {
        // It's now safe to include Widgets files.
        $this->include_widgets_files();

        // Register the plugin widget classes.
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\BooklyUiElementorServices());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\BooklyUiElementorCategories());
    }

    /**
     * Add new categories
     *
     * @since 1.0.0
     * @access public
     */
    public function register_categories($elements_manager)
    {
        $elements_manager->add_category(
            'bookly-ui',
            [
                'title' => __('Bookly Ui', 'sbita-bookly-ui'),
                'icon' => 'fa fa-plug',
            ]
        );
    }


    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct()
    {
        // Register the widgets.
        add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
        add_action('elementor/elements/categories_registered', array($this, 'register_categories'));

    }
}

// Instantiate the Widgets class.
Widgets::instance();