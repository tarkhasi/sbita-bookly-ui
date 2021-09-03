<?php
/**
 * Services List
 *
 * @var array $attrs
 * @var array $data
 */


if (!isset($data) || !$data) {
    echo '<div class="sbu-not-found">'.__('Not found any service!', 'sbita-bookly-ui').'</div>';
    return;
}

?>

<?php do_action('sbu_services_list_before'); ?>

<div class="sbu-services-main">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/services/item.php';
    } ?>

</div>

<?php do_action('sbu_services_list_after'); ?>