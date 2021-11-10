<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
$script_src = sbu_plugin_asset_url(__FILE__, 'js/bookly-ui-from.js');
$script_url = apply_filters('sbu_form_script_src', $script_src);

require_once SBU_TMP_DIR . '/general/general-style.php';
?>
<script src="<?php echo esc_url($script_url)?>"></script>
<div id="bookly-ui-form"></div>