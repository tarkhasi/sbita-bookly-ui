<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Service Image
 *
 * @var array $attrs
 * @var string|numeric $attachment_id
 */

if (!isset($attachment_id) || !$attachment_id) {
    $default_image = sbita_get_option('bu_default_service_image');
    $default_image = $default_image != null ? $default_image : sbita_plugin_asset_url(__FILE__, 'img/default-service.jpg');
    echo "<img src='$default_image' alt=''/>";
    return;
}

$image_style = !empty($attrs['image_style']) ? $attrs['image_style'] : false;

$image = wp_get_attachment_image_src($attachment_id, 'thumbnail');
?>

<!--<img src="--><?php //echo $image ? $image[0] : '' ?><!--" alt="">-->
<div style=" <?php echo $image ? 'background-image: url(' . $image[0] . ');' : '' ?> <?php echo $image_style ?>">
</div>