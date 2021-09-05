<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * General styles
 *
 * @var array $attrs
 */

$color = get_option('bookly_app_color') ?? '#388E3C';

?>
<style>
    .sbu-bookly-bg-color {
        background: <?php echo $color ?> !important;
    }

    .sbu-bookly-bg-hover:hover {
        background: <?php echo $color ?> !important;
    }

    .sbu-color-white-hover:hover {
        color:white !important;
    }

    .sbu-bookly-color {
        color: <?php echo $color ?> !important;
    }
    .sbu-bookly-color-hover:hover {
        color: <?php echo $color ?> !important;
    }

    .sbu-bookly-border {
        border-color: <?php echo $color ?> !important;
    }
    .sbu-bookly-border-hover:hover {
        border-color: <?php echo $color ?> !important;
    }
</style>
