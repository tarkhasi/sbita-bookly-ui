<?php
/**
 * Service Item
 *
 * @var array $attrs
 * @var array $item
 */


if (!isset($item['title'])) return;

$attachment_id = $item['attachment_id'];
$url = apply_filters('sbu_service_url', null, $item, $attrs);
$default_class =  sbita_get_option('bu_default_service_item_class');
?>

<div class="<?php echo $attrs['item_class'] ?? $default_class ?>"
     title="<?php echo $item['title']; ?>"
>

    <div class="sbu-service-item-image">
        <?php if ($url) { ?>
            <a href="<?php echo $url ?>">
                <?php require SBU_TMP_DIR . '/services/image.php'; ?>
            </a>
        <?php } else { ?>
            <?php require SBU_TMP_DIR . '/services/image.php'; ?>
        <?php } ?>
    </div>

    <div class="sbu-service-item-content">
        <div class="sbu-service-item-title">
            <?php echo $item['title']; ?>
        </div>
        <div class="sbu-service-item-category" title="<?php _e('Category', 'sbita-bookly-ui'); ?>">
            <?php echo $item['category_name']; ?>
        </div>
        <div class="sub-flex">
            <div class="sbu-service-item-duration" title="<?php _e('Duration', 'sbita-bookly-ui'); ?>">
                <?php echo sbu_duration($item['duration']); ?>
            </div>
            <div class="sbu-service-item-price" title="<?php _e('Price', 'sbita-bookly-ui'); ?>">
                <?php echo apply_filters('sbu_service_price', sbu_price($item['price']), $item); ?>
            </div>
        </div>
    </div>

    <div class="sbu-service-footer">
        <?php do_action('sbu_service_button', $item, $attrs); ?>
    </div>
</div>