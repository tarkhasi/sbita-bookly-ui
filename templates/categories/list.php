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


<div class="sbu-categories-main">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/categories/item.php';
    } ?>

</div>
