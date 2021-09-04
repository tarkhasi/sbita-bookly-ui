<?php
/**
 * Category Item
 *
 * @var array $attrs
 * @var array $item
 */

if (!isset($item['name'])) return;

$url = apply_filters('sbu_category_item_url', '#', $item, $attrs);
$default_class = sbita_get_option('bu_default_category_item_class');

?>

<a href="<?php echo $url ?? '#' ?>" <?php echo $attrs['link_attrs'] ?? '' ?>
   class="<?php echo $attrs['item_class'] ?? $default_class ?>">
    <div>
        <?php echo $item['name']; ?>
        <div class="sbu-service-buttons">
            <?php do_action('sbu_category_button', $item); ?>
        </div>
    </div>
</a>