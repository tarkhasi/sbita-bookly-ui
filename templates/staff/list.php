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

<?php do_action('sbu_staff_members_list_before', $data, $attrs); ?>

<div class="sbu-staff-main">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/staff/item.php';
    } ?>

</div>

<?php do_action('sbu_staff_members_list_after', $data, $attrs); ?>
