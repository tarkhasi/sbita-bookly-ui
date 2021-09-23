<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Categories List
 *
 * @var array $attrs
 * @var array $data
 */


if (!isset($data) || !$data) {
    echo '<div class="sbu-not-found">' . __('Not found any category!', 'sbita-bookly-ui') . '</div>';
    return;
}

$class = $attrs['list_class'] ?? 'sbu-categories-main ';
$size = $attrs['size'] ?? 'medium';
$class .= " sbu-$size "
?>


<?php do_action('sbu_categories_list_before', $data, $attrs); ?>

<div class="<?php echo esc_attr($class) ?>">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/categories/item.php';
    } ?>
</div>

<?php do_action('sbu_categories_list_after', $data, $attrs); ?>
