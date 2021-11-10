<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>
<div>
    <style>
        .sbita-about-items-main {
            padding: 25px;
        }

        .sbita-about-items-main .sbita-about-item {
            padding: 15px;
            text-decoration: none;
            color: #202020;
            font-size: 13pt;
        }
    </style>
    <div style="margin: 150px auto 0; text-align: center">
        <img src="<?php echo esc_url(SbitaCore::url('assets/img/logo-large.png')) ?>"
             style="max-width: 100%; width: 350px; margin-bottom: 20px"/>
        <br/>
        <br/>
        <div>
            <b><?php _e('SbiTa is a core plugin for <a href="https://wpkok.com" target="_blank">WpKok</a> products', 'sbita') ?></b>
        </div>
        <div style="display: flex; justify-content: center;">
            <div class="sbita-about-items-main">
                <?php
                $array = [
//                'Home' => '/#Home',
//                'Über' => '/#intro',
//                'Leistung' => '/#work',
//                'Produkte' => '/#about',
//                'Arbeit' => '/#services',
//                'Kontakt' => 'mailto:webkoker@gmail.com',
                ];

                $array = apply_filters('sbu_about_items', $array);

                foreach ($array as $key => $value) {
                    echo sprintf("<a class='sbita-about-item' target='_blank' href='%s'>%s</a>", esc_url($value), esc_html($key));
                }
                ?>
            </div>
        </div>
    </div>
</div>
