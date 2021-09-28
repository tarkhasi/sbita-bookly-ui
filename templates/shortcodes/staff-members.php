<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff Members Shortcode
 *
 * @var array $attrs
 */

// form url
$service_id = sanitize_text_field( $_GET['service_id'] ?? null);

// form shortcode attrs
$service_id = $attrs['service_id'] ?? $service_id;

$service_id = apply_filters('sbu_shortcode_staff_service_id', $service_id, $attrs);

$data = sbu_get_staff_members($service_id);

$data = apply_filters('sbu_shortcode_staff_members', $data, $attrs);


// show list

do_action('sbu_shortcode_staff_before');

require_once SBU_TMP_DIR . '/general/general-style.php';
require SBU_TMP_DIR . '/staff/list.php';

do_action('sbu_shortcode_staff_after');
