<?php
/**
 * Category Item
 *
 * @var array $attrs
 * @var array $item
 */

if (!isset($item['name'])) return;

$url = apply_filters('sbu_category_item_url', '#', $item, $attrs);
?>

<a href="<?php echo $url ?? '#' ?>" <?php echo $attrs['link_attrs'] ?? '' ?> class="<?php echo $attrs['item_class'] ?? 'sbu-category-item sbu-box-shadow sbu-rounded'?>">
    <div>
        <?php echo $item['name']; ?>
        <div class="sbu-service-buttons">
            <?php do_action('sbu_category_button', $item); ?>
        </div>
    </div>
</a>