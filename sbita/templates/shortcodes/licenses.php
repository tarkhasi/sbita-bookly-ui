<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Licenses Shortcode
 * @var array $attr
 */



$page_title = __('Licenses', 'sbita');
$options = apply_filters('sbu_licenses', []);

foreach ($options as $option) {
    require SBITA_TMP_DIR. '/shortcodes/settings-item.php';
}