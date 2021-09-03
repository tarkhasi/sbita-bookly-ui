<?php
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
$image = wp_get_attachment_image_src($attachment_id, 'thumbnail');
?>

<!--<img src="--><?php //echo $image ? $image[0] : '' ?><!--" alt="">-->
<div <?php echo $image ? 'style="width: 100%;max-width:300px;height: 300px;background-image: url(' . $image[0] . '); background-size: cover;"' : '' ?>>
</div>