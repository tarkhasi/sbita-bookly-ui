<?php
/**
 * Services Shortcode
 *
 * @var array $attrs
 */

use Bookly\Lib;


// form url
$category_id = $_GET['cat_id'] ?? null;
$staff_id = $_GET['staff_id'] ?? null;
$location_id = null;

// form shortcode attrs
$category_id = $attrs['cat_id'] ?? $category_id;
$staff_id = $attrs['staff_id'] ?? $staff_id;

$location_id = apply_filters('sbu_shortcode_services_location_id', $location_id, $attrs);
$staff_id = apply_filters('sbu_shortcode_services_staff_id', $staff_id, $attrs);
$category_id = apply_filters('sbu_shortcode_services_category_id', $category_id, $attrs);

$query = Lib\Entities\Service::query('s')
    ->select('c.name AS category_name, s.*')
    ->leftJoin('Category', 'c', 's.category_id = c.id')
    ->where('s.visibility', 'public');

// category
if ($category_id)
    $query = $query->where('c.id', $category_id);

// staff id
if ($staff_id) {
    $staff_services = new Bookly\Backend\Components\Dialogs\Staff\Edit\Forms\StaffServices();
    $staff_services->load($staff_id);
    $data = $staff_services->getServicesData();
    $services_ids = $data ? array_keys($data) : [];
    $query = $query->whereIn('s.id', $services_ids);
}

$query = apply_filters('sbu_shortcode_services_query', $query, $attrs);

$data = $query->fetchArray();


// show list

do_action('sbu_shortcode_services_before');

require SBU_TMP_DIR . '/general/general-style.php';
require SBU_TMP_DIR . '/services/list.php';

do_action('sbu_shortcode_services_after');
