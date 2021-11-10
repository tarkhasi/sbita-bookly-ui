<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$page_title = __('Licenses', 'sbita');
$items = apply_filters('sbu_licenses', []);

include sbu_sbita_plugin_template(__FILE__,'header.php');

?>
<script>
    window.SBITA_LOADING_URL = '<?php echo esc_url(sbu_sbita_plugin_asset_url(__FILE__, 'img/loading.gif'))?>';
</script>
<div>
    <div id="test_result"></div>
    <?php if (!$items || !is_array($items)) { ?>
        <p><?php _e('Not found any license for this project!', 'sbita') ?></p>
    <?php } else { ?>
        <?php do_shortcode("[sbita-licenses]"); ?>
        <div>
            <a href=""><button> <?php _e('Reload', 'sbita') ?></button></a>
        </div>
    <?php } ?>
</div>

