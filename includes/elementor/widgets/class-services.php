<?php

namespace BooklyUiElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

defined('ABSPATH') || die();

/**
 * BooklyUiElementorServices widget class.
 *
 * @since 1.0.0
 */
class BooklyUiElementorServices extends Widget_Base
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
        return 'bookly-ui-services';
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
        return __('Bookly Ui Services', 'sbita-bookly-ui');
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
        return [];
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
            'item',
            [
                'label' => __('Items', 'sbita-bookly-ui'),
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
            'hide_duration',
            [
                'label' => __('Hide duration', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => false,
            ]
        );

        $this->add_control(
            'hide_price',
            [
                'label' => __('Hide price', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => false,
            ]
        );

        $this->add_control(
            'hide_buttons',
            [
                'label' => __('Hide buttons', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => false,
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => __( 'Width', 'sbita-bookly-ui' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 260,
                ],
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => __( 'Height', 'sbita-bookly-ui' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'  ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label' => __('Button label', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        $this->add_control(
            'button_class',
            [
                'label' => __('Button class', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
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

        $this->add_control(
            'open_new_tab',
            [
                'label' => __('Open in new tab', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => '_blank',
                'default' => false,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'query',
            [
                'label' => __('Query', 'sbita-bookly-ui'),
            ]
        );

        $options = sbu_get_categories_options();
        $options[''] = __('All', 'sbita-bookly-ui');

        $this->add_control(
            'cat_id',
            [
                'label' => __('Category', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
                'default' => '',
            ]
        );

        $options = sbu_get_staff_members_options();
        $options[''] = __('All', 'sbita-bookly-ui');

        $this->add_control(
            'staff_id',
            [
                'label' => __('Staff member', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $options,
                'default' => '',
            ]
        );

        $this->add_control(
            'sort_by',
            [
                'label' => __('Sort by', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'id' => __('Id', 'sbita-bookly-ui'),
                    'title' => __('Title', 'sbita-bookly-ui'),
                    'price' => __('Price', 'sbita-bookly-ui'),
                    'duration' => __('Duration', 'sbita-bookly-ui'),
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

        $this->add_control(
            'hide_filters',
            [
                'label' => __('Hide filters', 'sbita-bookly-ui'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'default' => false,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'list',
            [
                'label' => __('List', 'sbita-bookly-ui'),
            ]
        );

        $this->add_control(
            'list_class',
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

        $width = $settings['width']['size'] . $settings['width']['unit'];
        $style = "grid-template-columns: repeat(auto-fill, minmax($width, 1fr)) !important;";

        $image_height = $settings['image_height']['size'] . $settings['image_height']['unit'];
        $image_style = "height: $image_height !important;";

        $array = array(
            'limit' => $settings['limit'],
            'sort_by' => $settings['sort_by'],
            'order' => $settings['order'],
            'link_attrs' => ' target="' . $settings['open_new_tab'] . '" ',
            'hide_image' => $settings['hide_image'],
            'hide_buttons' => $settings['hide_buttons'],
            'hide_duration' => $settings['hide_duration'],
            'hide_price' => $settings['hide_price'],
            'item_class' => $settings['item_class'],
            'cat_id' => $settings['cat_id'],
            'staff_id' => $settings['staff_id'],
            'hide_filters' => $settings['hide_filters'],
            'button_label' => $settings['button_label'],
            'button_class' => $settings['button_class'],
            'list_class' => $settings['list_class'],
            'list_style' => $style,
            'image_style' => $image_style,
        );

        $attrs = '';
        foreach ($array as $key => $setting) {
            $attrs .= " $key='$setting' ";
        }

        echo do_shortcode("[sbita-bookly-ui-services $attrs]");
    }

}