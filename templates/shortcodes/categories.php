<?php
/**
 * Categories Shortcode
 *
 * @var array $attrs
 */

use Bookly\Lib;


// form url
$staff_id = $_GET['staff_id'] ?? null;
$sort_by = $_GET['sort_by'] ?? 'position';

// form shortcode attrs
$staff_id = $attrs['staff_id'] ?? $staff_id;
$sort_by = $attrs['sort_by'] ?? $sort_by;

$staff_id = apply_filters('sbu_shortcode_categories_staff_id', $staff_id, $attrs);

$query = Lib\Entities\Category::query('c');

// staff id
if ($sort_by) {
    $query->sortBy($sort_by);
}

$query = apply_filters('sbu_shortcode_categories_query', $query, $attrs);

$data = $query->fetchArray();


// show list
do_action('sbu_shortcode_categories_before');

require SBU_TMP_DIR . '/general/general-style.php';
require SBU_TMP_DIR . '/categories/list.php';
do_action('sbu_shortcode_categories_after');
