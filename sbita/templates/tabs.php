<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!isset($groups)) $groups = array();
if (!isset($current)) $current = '';
?>

<!-- generate tabs -->
<div>
    <?php

    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<div class="nav-tab-wrapper">';
    foreach ($groups as $tab => $settings_count) {
        if ($settings_count == 0) continue;
        $class = ($tab == $current) ? ' nav-tab-active' : '';
        echo sprintf("<a class='nav-tab %s' href='?page=sbita-settings&tab=%s'>%s</a>", esc_attr($class), esc_html($tab), esc_html($tab));
    }
    echo sprintf("<a class='nav-tab' href='?page=sbita-licenses'>%s</a>", __('Licenses', 'sbita'));
    echo '</div>';
    ?>
    <br/>
</div>