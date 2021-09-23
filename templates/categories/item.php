<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Category Item
 *
 * @var array $attrs
 * @var array $item
 */

if (!isset($item['name'])) return;

$url = apply_filters('sbu_category_item_url', '#', $item, $attrs);

$custom_html = apply_filters('sbu_category_item_html', null, $item, $attrs, $url);
if ($custom_html) {
    echo wp_kses_post_deep($custom_html);
    return;
}

$style = !empty($attrs['style']) ? $attrs['style'] : '';
$hide_image = !empty($attrs['hide_image']) ? $attrs['hide_image'] : false;
$hide_title = !empty($attrs['hide_title']) ? $attrs['hide_title'] : false;
$link_attrs = !empty($attrs['link_attrs']) ? $attrs['link_attrs'] : '';
$default_class = sbita_get_option('bu_default_category_item_class');
$class = !empty($attrs['item_class']) ? $attrs['item_class'] : $default_class;

$image_url = sbu_service_category_image_url($item['id']);
if ($image_url && !$hide_image) {
    if (!$hide_title) $class .= ' sbu-by-image';
    $style = 'background-image: url(' . $image_url . ');';
}

?>

<a href="<?php echo esc_url($url) ?? '#' ?>"
   class="<?php echo esc_attr($class) ?>"
   style="<?php echo esc_attr($style) ?>"
   title="<?php echo esc_attr($item['name']) ?>"
    <?php echo esc_attr($link_attrs) ?>
>
    <div class="sbu-overly sbu-nowrap">
        <?php echo esc_html(!$hide_title ? $item['name'] : ''); ?>
        <div class="sbu-service-buttons">
            <?php do_action('sbu_category_button', $item); ?>
        </div>
    </div>
</a>