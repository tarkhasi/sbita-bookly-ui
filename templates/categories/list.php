<?php
/**
 * Categories List
 *
 * @var array $attrs
 * @var array $data
 */


if (!isset($data) || !$data) {
    echo '<div class="sbu-not-found">'.__('Not found any category!', 'sbita-bookly-ui').'</div>';
    return;
}

?>


<?php do_action('sbu_categories_list_before', $data, $attrs); ?>

<div class="sbu-categories-main">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/categories/item.php';
    } ?>

</div>

<?php do_action('sbu_categories_list_after', $data, $attrs); ?>
