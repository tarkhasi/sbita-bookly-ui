<?php
/**
 * Staff Members List
 *
 * @var array $attrs
 * @var array $data
 */

if (!isset($data) || !$data) {
    echo '<div class="sbu-not-found">'.__('Not found any staff!', 'sbita-bookly-ui').'</div>';
    return;
}
?>

<div class="sbu-staff-main">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/staff/item.php';
    } ?>

</div>
