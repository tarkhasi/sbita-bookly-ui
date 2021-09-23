<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Services List
 *
 * @var array $attrs
 * @var array $data
 */

do_action('sbu_services_list_before', $data, $attrs);

if (!isset($data) || !$data) {
    echo '<div class="sbu-not-found">'.__('Not found any service!', 'sbita-bookly-ui').'</div>';
    return;
}

$style = !empty($attrs['list_style']) ? $attrs['list_style'] : '';
$class = !empty($attrs['list_class']) ? $attrs['list_class'] : 'sbu-services-main';

?>


<div class="<?php echo esc_attr($class) ?>" style="<?php echo esc_attr($style) ?>">
    <?php
    foreach ($data as $item) {
        require SBU_TMP_DIR . '/services/item.php';
    } ?>

</div>

<?php do_action('sbu_services_list_after', $data, $attrs); ?>