<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff Members Image
 *
 * @var array $attrs
 * @var string|numeric $attachment_id
 */
if (!isset($attachment_id) || !$attachment_id) {
    $default_image = sbu_get_option('bu_default_staff_image');
    $default_image = $default_image != null ? $default_image : sbu_plugin_asset_url(__FILE__, 'img/default-staff.jpg');
    echo sprintf("<img src='%s' alt=''/>", esc_url($default_image));
    return;
}

$image = wp_get_attachment_image_src($attachment_id, 'thumbnail')
?>

<div <?php echo $image ? 'style="background-image: url(' . esc_url($image[0]) . ');"' : '' ?>>
</div>