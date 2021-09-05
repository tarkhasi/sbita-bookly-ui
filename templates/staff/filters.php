<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff filters
 *
 * @var array $attrs
 * @var array $data
 */

// form url
$service_id = $_GET['service_id'] ?? null;

// form shortcode attrs
$service_id = $attrs['service_id'] ?? $service_id;

$service_id = apply_filters('sbu_shortcode_staff_service_id', $service_id, $attrs);


?>
<div class="sbu-services-filters">

    <?php

    if ($service_id) {
        require SBU_TMP_DIR . '/staff/filters-service.php';
    }
    ?>
</div>
