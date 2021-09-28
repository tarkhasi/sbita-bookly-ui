<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Categories Shortcode
 *
 * @var array $attrs
 */

use Bookly\Lib;


// params or attrs for query
$sort_by = sanitize_text_field( $_GET['sort_by'] ?? 'position');
$order = sanitize_text_field( $_GET['order'] ?? 'asc');

$sort_by = $attrs['sort_by'] ?? $sort_by;
$order = $attrs['order'] ?? $order;
$limit = $attrs['limit'] ?? null;

// query
$data = sbu_get_categories_query()->sortBy($sort_by)->order($order)->limit($limit)->fetchArray();
$query = apply_filters('sbu_shortcode_categories', $data, $attrs);


// show list
do_action('sbu_shortcode_categories_before');

require_once SBU_TMP_DIR . '/general/general-style.php';
require SBU_TMP_DIR . '/categories/list.php';
do_action('sbu_shortcode_categories_after');
