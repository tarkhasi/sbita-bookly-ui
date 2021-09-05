<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff Members Shortcode
 *
 * @var array $attrs
 */

// form url
$service_id = $_GET['service_id'] ?? null;

// form shortcode attrs
$service_id = $attrs['service_id'] ?? $service_id;

$service_id = apply_filters('sbu_shortcode_staff_service_id', $service_id, $attrs);


use Bookly\Lib;


$query = Lib\Entities\Staff::query('staff')
    ->where('staff.visibility', 'public');

// staff id
if ($service_id) {
    $query->innerJoin('StaffService', 'ss', 'ss.staff_id = staff.id')
    ->where('ss.service_id', $service_id);
}

$query = apply_filters('sbu_shortcode_staff_members_query', $query, $attrs);

$data = $query->fetchArray();



// show list

do_action('sbu_shortcode_staff_before');

require_once SBU_TMP_DIR . '/general/general-style.php';
require SBU_TMP_DIR . '/staff/list.php';

do_action('sbu_shortcode_staff_after');
