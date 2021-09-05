<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Services filters
 *
 * @var array $attrs
 * @var array $data
 */

// form url
$category_id = $_GET['cat_id'] ?? null;
$staff_id = $_GET['staff_id'] ?? null;

// form shortcode attrs
$category_id = $attrs['cat_id'] ?? $category_id;
$staff_id = $attrs['staff_id'] ?? $staff_id;

$staff_id = apply_filters('sbu_shortcode_services_staff_id', $staff_id, $attrs);
$category_id = apply_filters('sbu_shortcode_services_category_id', $category_id, $attrs);

?>
<div class="sbu-services-filters">

    <?php
    if ($category_id) {
        require SBU_TMP_DIR . '/services/filters-category.php';
    }

    if ($staff_id) {
        require SBU_TMP_DIR . '/services/filters-staff.php';
    }
    ?>
</div>
