<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>
<div style="justify-content: space-between; width: 100%; display: flex;">
    <div><h1 class="wp-heading-inline" style="font-weight: normal"><?php esc_html_e($page_title ?? '') ?></h1></div>
    <div style="padding: 25px">
        <img src="<?php echo esc_url(SbitaCore::url('assets/img/logo-large.png')) ?>" width="160"/>
    </div>
</div>
