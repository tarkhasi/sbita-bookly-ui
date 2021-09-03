<?php
$script_src = sbita_plugin_asset_url(__FILE__, 'js/bookly-ui-from.js');
$script_url = apply_filters('sbu_form_script_src', $script_src);

require SBU_TMP_DIR . '/general/general-style.php';
?>
<script src="<?php echo $script_url?>"></script>
<div id="bookly-ui-form"></div>