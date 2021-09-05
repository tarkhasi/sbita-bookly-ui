<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Services filters staff
 *
 * @var array $attrs
 * @var array $data
 * @var string|numeric $category_id
 * @var string|numeric $staff_id
 * @var string|numeric $location_id
 */

if (!$staff_id) return;

$item = Bookly\Lib\Entities\Staff::query('s')->where('s.visibility', 'public')->where('id', $staff_id)->fetchRow();

if (!$item || !isset($item['full_name'])) return;


?>

<div class="sbu-services-filters-item sbu-rounded sbu-nowrap" title="<?php echo $item['full_name'] ?>">
    <?php echo __('Staff :','sbita-bookly-ui').' '.$item['full_name']; ?>
</div>
