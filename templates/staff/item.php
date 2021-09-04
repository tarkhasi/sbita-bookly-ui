<?php
/**
 * Staff Members Item
 *
 * @var array $attrs
 * @var array $item
 */

if (!isset($item['id'])) return;

$attachment_id = $item['attachment_id'];
$url = apply_filters('sbu_staff_item_url', null, $item, $attrs);
$default_class =  sbita_get_option('bu_default_staff_item_class');
?>

<div title="<?php echo $item['full_name'] ?? ''; ?>"
     class="<?php echo $attrs['item_class'] ?? $default_class ?>">

    <div class="sbu-staff-item-image">
        <?php if ($url) { ?>
            <a href="<?php echo $url ?>">
                <?php require SBU_TMP_DIR . '/staff/image.php'; ?>
            </a>
        <?php } else { ?>
            <?php require SBU_TMP_DIR . '/staff/image.php'; ?>
        <?php } ?>
    </div>

    <div class="sbu-staff-item-content">
        <div class="sbu-staff-item-title" title="<?php echo $item['full_name'] ?? ''; ?>">
            <?php echo $item['full_name']; ?>
        </div>
        <div class="sbu-staff-item-email" title="<?php echo $item['email'] ?? ''; ?>">
            <?php echo $item['email'] ?? ''; ?>&nbsp;
        </div>
        <?php do_action('sbu_staff_info', $item, $attrs); ?>
    </div>

    <div class="sbu-staff-footer">
        <?php do_action('sbu_staff_button', $item, $attrs); ?>
    </div>

</div>