<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Settings Shortcode
 * @var array $attr
 */

$page_title = __('Settings', 'sbita');
$groups = apply_filters('sbu_options_groups', []);
$options = apply_filters('sbu_options', []);
$group = sanitize_text_field($attr['group']) ?? null;


foreach ($options as $option) {
    require SBITA_TMP_DIR. '/shortcodes/settings-item.php';
}