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
        return ['sbita-bookly-ui'];
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
            'query',
            [
                'label' => __('Query', 'sbita-bookly-ui'),
            ]
        );

        $this->add_control(
            'sort_by',
            [
                'label' => __('Sort by', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'id' => __('Id', 'sbita-bookly-ui'),
                    'name' => __('Name', 'sbita-bookly-ui'),
                ],
                'default' => 'id',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'desc' => __('Desc', 'sbita-bookly-ui'),
                    'asc' => __('Asc', 'sbita-bookly-ui'),
                ],
                'default' => 'asc',
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => __('Limit', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => null,
                'max' => 1000,
                'step' => 5,
                'default' => null,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'item',
            [
                'label' => __('Items', 'sbita-bookly-ui'),
            ]
        );

        $this->add_control(
            'hide_title',
            [
                'label' => __('Hide title', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => false,
            ]
        );

        $this->add_control(
            'hide_image',
            [
                'label' => __('Hide image', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => false,
            ]
        );

        $this->add_control(
            'size',
            [
                'label' => __('Card Size', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => __('Small', 'plugin-name'),
                    'medium' => __('Medium', 'plugin-name'),
                    'big' => __('Big', 'plugin-name'),

                ],
                'default' => 'medium',
            ]
        );

        $this->add_control(
            'open_new_tab',
            [
                'label' => __('Open in new tab', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => '_blank',
                'default' => false,
            ]
        );
        $this->add_control(
            'item_class',
            [
                'label' => __('Custom class', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
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
        $array = array(
            'limit' => $settings['limit'],
            'sort_by' => $settings['sort_by'],
            'order' => $settings['order'],
            'link_attrs' => ' target="'.$settings['open_new_tab'].'" ',
            'size' => $settings['size'],
            'hide_image' => $settings['hide_image'],
            'hide_title' => $settings['hide_title'],
            'item_class' => $settings['item_class'],
        );

        $attrs = '';
        foreach ($array as $key => $setting){
            $attrs .= " $key='$setting' ";
        }

        echo do_shortcode("[sbita-bookly-ui-categories $attrs]");
    }


}