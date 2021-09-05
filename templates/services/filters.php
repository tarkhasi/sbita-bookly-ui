<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Services filters
 *
 * @var array $attrs
 * @var array $data
 */

$sort_by = $_GET['sort_by'] ?? 'position';
$order = $_GET['order'] ?? 'asc';
$category_id = $_GET['cat_id'] ?? null;
$staff_id = $_GET['staff_id'] ?? null;
$location_id = null;


$sort_by = !empty($attrs['sort_by']) ? $attrs['sort_by'] : $sort_by;
$order = !empty($attrs['order']) ? $attrs['order'] : $order;
$limit = !empty($attrs['limit']) ? $attrs['limit'] : null;
$category_id = !empty($attrs['cat_id']) ? $attrs['cat_id'] : $category_id;
$staff_id = !empty($attrs['staff_id']) ? $attrs['staff_id'] : $staff_id;

$location_id = apply_filters('sbu_shortcode_services_location_id', $location_id, $attrs);
$staff_id = apply_filters('sbu_shortcode_services_staff_id', $staff_id, $attrs);
$category_id = apply_filters('sbu_shortcode_services_category_id', $category_id, $attrs);

?>
<div class="sbu-services-filters" style=" margin-bottom: 10px;">

    <?php
    if ($category_id) {
        require SBU_TMP_DIR . '/services/filters-category.php';
    }

    if ($staff_id) {
        require SBU_TMP_DIR . '/services/filters-staff.php';
    }
    ?>
</div>
