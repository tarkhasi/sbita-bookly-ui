<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff Members List
 *
 * @var array $attrs
 * @var array $data
 */

do_action('sbu_staff_members_list_before', $data, $attrs);

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

<?php do_action('sbu_staff_members_list_after', $data, $attrs); ?>
