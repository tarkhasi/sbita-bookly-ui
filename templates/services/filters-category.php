<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Services filters category
 *
 * @var array $attrs
 * @var array $data
 * @var string|numeric $category_id
 * @var string|numeric $staff_id
 * @var string|numeric $location_id
 */

if (!$category_id) return;

$item = Bookly\Lib\Entities\Category::query('c')->where('id', $category_id)->fetchRow();
if (!$item) return;

?>
<div class="sbu-services-filters-item sbu-rounded sbu-nowrap" title="<?php echo esc_attr($item['name']) ?>">
    <?php echo __('Category :', 'sbita-bookly-ui') . ' ' . esc_html($item['name']); ?>
</div>
