<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff Members Item
 *
 * @var array $attrs
 * @var array $item
 */

if (!isset($item['id'])) return;


$url = apply_filters('sbu_staff_item_url', null, $item, $attrs);
$custom_html = apply_filters('sbu_staff_item_html', null, $item, $attrs, $url);
if ($custom_html) {
    echo wp_kses_post_deep($custom_html);
    return;
}

$attachment_id = $item['attachment_id'];
$default_class = sbu_get_option('bu_default_staff_item_class');
?>

<div title="<?php echo esc_attr($item['full_name']) ?? ''; ?>"
     class="<?php echo esc_attr($attrs['item_class'] ?? $default_class) ?>">

    <div class="sbu-staff-item-image">
        <?php if ($url) { ?>
            <a href="<?php echo esc_url($url) ?>">
                <?php require SBU_TMP_DIR . '/staff/image.php'; ?>
            </a>
        <?php } else { ?>
            <?php require SBU_TMP_DIR . '/staff/image.php'; ?>
        <?php } ?>
    </div>

    <div class="sbu-staff-item-content">
        <div class="sbu-staff-item-title" title="<?php echo esc_attr($item['full_name']) ?? ''; ?>">
            <?php echo esc_html($item['full_name']) ?>
        </div>
        <div class="sbu-staff-item-email" title="<?php echo esc_attr($item['email'] ?? ''); ?>">
            <?php echo esc_html($item['email'] ?? ''); ?>&nbsp;
        </div>
        <?php do_action('sbu_staff_info', $item, $attrs); ?>
    </div>

    <div class="sbu-staff-footer">
        <?php do_action('sbu_staff_button', $item, $attrs); ?>
    </div>

</div>