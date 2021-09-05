<?php

namespace BooklyUiElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined('ABSPATH') || die();

/**
 * BooklyUiElementorCategories widget class.
 *
 * @since 1.0.0
 */
class BooklyUiElementorCategories extends Widget_Base
{
    /**
     * Class constructor.
     *
     * @param array $data Widget data.
     * @param array $args Widget arguments.
     */
    public function __construct($data = array(), $args = null)
    {
        parent::__construct($data, $args);
    }

    /**
     * Retrieve the widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_name()
    {
        return 'bookly-ui-categories';
    }

    /**
     * Retrieve the widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_title()
    {
        return __('Bookly Ui Categories', 'sbita-bookly-ui');
    }

    /**
     * Retrieve the widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @return array Widget categories.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_categories()
    {
        return array('general', 'bookly-ui');
    }

    /**
     * Enqueue styles.
     */
    public function get_style_depends()
    {
        return [ 'sbita-bookly-ui' ];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'link',
            [
                'label' => __( 'Link', 'sbita-bookly-ui' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Open in new tab', 'sbita-bookly-ui' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => false,
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo do_shortcode('[sbita-bookly-ui-categories size="small"]');
    }

}