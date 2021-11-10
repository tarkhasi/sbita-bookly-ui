<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$page_title = __('Settings', 'sbita');
$groups = apply_filters('sbu_options_groups', []);
$options = apply_filters('sbu_options', []);
$current = sanitize_text_field($_GET['tab'] ?? array_keys($groups)[0]) ;

include sbu_sbita_plugin_template(__FILE__,'header.php');
include sbu_sbita_plugin_template(__FILE__, 'tabs.php');

do_action("sbs_after_shortcode_group_{$current}");
?>


<div>
    <?php if (!$options || !is_array($options)) { ?>
        <p><?php _e('Not found any settings for this project!', 'sbita') ?></p>
    <?php } else { ?>

        <form method="post" action="options.php">
            <?php settings_fields('sbita'); ?>
            <?php do_shortcode("[sbita-settings group='$current']"); ?>
            <?php submit_button(); ?>
        </form>

    <?php } ?>
</div>
