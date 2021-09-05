<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Services Shortcode
 *
 * @var array $attrs
 */

use Bookly\Lib;


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

$query = Lib\Entities\Service::query('s')
    ->select('c.name AS category_name, s.*')
    ->leftJoin('Category', 'c', 's.category_id = c.id')
    ->where('s.visibility', 'public')
    ->sortBy($sort_by)->order($order)->limit($limit);

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

require_once SBU_TMP_DIR . '/general/general-style.php';
require SBU_TMP_DIR . '/services/list.php';

do_action('sbu_shortcode_services_after');
