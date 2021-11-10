<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Service Item
 *
 * @var array $attrs
 * @var array $item
 */


if (!isset($item['title'])) return;


$url = apply_filters('sbu_service_url', null, $item, $attrs);
$custom_html = apply_filters('sbu_service_item_html', null, $item, $attrs, $url);
if ($custom_html) {

    echo wp_kses_post_deep($custom_html);
    return;
}

$style = !empty($attrs['style']) ? $attrs['style'] : '';
$hide_image = !empty($attrs['hide_image']) ? $attrs['hide_image'] : false;
$hide_buttons = !empty($attrs['hide_buttons']) ? $attrs['hide_buttons'] : false;
$hide_duration = !empty($attrs['hide_duration']) ? $attrs['hide_duration'] : false;
$hide_price = !empty($attrs['hide_price']) ? $attrs['hide_price'] : false;
$link_attrs = !empty($attrs['link_attrs']) ? $attrs['link_attrs'] : '';
$default_class = sbu_get_option('bu_default_service_item_class');
$class = !empty($attrs['item_class']) ? $attrs['item_class'] : $default_class;
$attachment_id = $item['attachment_id'];
?>

<div class="<?php echo esc_attr($class) ?>"
     title="<?php echo esc_attr($item['title']); ?>"
     style="<?php echo esc_attr($style); ?>"
>

    <div class="sbu-service-item-image">
        <?php if (!$hide_image) { ?>
            <?php if ($url) { ?>
                <a href="<?php echo esc_url($url) ?>" <?php echo esc_attr($link_attrs) ?>>
                    <?php require SBU_TMP_DIR . '/services/image.php'; ?>
                </a>
            <?php } else { ?>
                <?php require SBU_TMP_DIR . '/services/image.php'; ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="sbu-service-item-content">
        <div class="sbu-service-item-title">
            <?php echo esc_html($item['title']); ?>
        </div>
        <div class="sbu-service-item-category" title="<?php _e('Category', 'sbita-bookly-ui'); ?>">
            <?php echo esc_html($item['category_name']); ?>
        </div>
        <div class="sub-flex">
            <?php if (!$hide_duration) { ?>
                <div class="sbu-service-item-duration sbu-nowrap" title="<?php _e('Duration', 'sbita-bookly-ui'); ?>">
                    <?php echo esc_html(sbu_duration($item['duration'])); ?>
                </div>
            <?php } ?>
            <?php if (!$hide_price) { ?>
                <div class="sbu-service-item-price sbu-nowrap" title="<?php _e('Price', 'sbita-bookly-ui'); ?>">
                    <?php echo esc_html(apply_filters('sbu_service_price', sbu_price($item['price']), $item)); ?>
                </div>
            <?php } ?>

        </div>
    </div>

    <?php if (!$hide_buttons) { ?>
        <div class="sbu-service-footer">
            <?php do_action('sbu_service_button', $item, $attrs); ?>
        </div>
    <?php } ?>
</div>