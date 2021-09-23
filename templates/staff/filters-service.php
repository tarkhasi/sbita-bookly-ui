<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Staff filters   service
 *
 * @var array $attrs
 * @var array $data
 * @var string|numeric $service_id
 */

if (!$service_id) return;

$item = Bookly\Lib\Entities\Service::query('s')->where('id', $service_id)->fetchRow();
if (!$item || !isset($item['title'])) return;
?>

<div class="sbu-services-filters-item sbu-rounded sbu-nowrap" title="<?php echo esc_attr($item['title']) ?>">
    <?php echo __('Service :','sbita-bookly-ui').' '.esc_html($item['title']); ?>
</div>
