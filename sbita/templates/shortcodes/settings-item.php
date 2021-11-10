<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Item for Settings Shortcode
 * @var array $attr
 * @var SbitaCoreOptionModel $option
 * @var $group
 */

if (!is_a($option, 'SbitaCoreOptionModel')) return;

?>

<div style="display: <?php esc_attr_e(empty($group) || $option->group == $group ? 'block' : 'none'); ?>">
    <div class="row" style="margin-bottom: 25px">
        <?php $option->generate() ?>
    </div>
</div>