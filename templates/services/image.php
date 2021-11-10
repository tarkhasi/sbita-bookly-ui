<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Service Image
 *
 * @var array $attrs
 * @var string|numeric $attachment_id
 */

if (!isset($attachment_id) || !$attachment_id) {
    $default_image = sbu_get_option('bu_default_service_image');
    $default_image = $default_image != null ? $default_image : sbu_plugin_asset_url(__FILE__, 'img/default-service.jpg');
    echo sprintf("<img src='%s' alt=''/>", esc_url($default_image));
    return;
}

$image_style = !empty($attrs['image_style']) ? $attrs['image_style'] : false;

$image = wp_get_attachment_image_src($attachment_id, 'thumbnail');
?>

<div style=" <?php echo $image ? 'background-image: url(' . esc_url($image[0]) . ');' : '' ?> <?php echo esc_html($image_style) ?>">
</div>