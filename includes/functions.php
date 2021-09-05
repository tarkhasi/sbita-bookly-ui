<?php
if (function_exists('sbu_duration')) return;

function sbu_duration($duration)
{
    try {
        return Bookly\Lib\Utils\DateTime::secondsToInterval($duration);
    } catch (Exception $e) {
        return $duration;
    }
}

/**
 * Get price currency
 *
 * @param $price
 * @return mixed|string
 */
function sbu_price($price)
{
    try {
        $currencies = Bookly\Lib\Utils\Price::getCurrencies();
        return $currencies[get_option('bookly_pmt_currency')]['symbol'] . ' ' . $price;
    } catch (Exception $e) {
        return $price;
    }
}

/**
 * Get service category image url
 *
 * @param $category_id
 * @return mixed|string
 */
function sbu_service_category_image_url($category_id)
{
    try {
        $json = sbita_get_option('bu_categories_images');
        $array = json_decode($json, true);

        if (!$array || !isset($array[$category_id])) return null;

        $result = $array[$category_id];

        if (!$result) return null;
        if (is_numeric($result)) $url = get_attachment_link($result);
        else $url = $result;

        return apply_filters('sbu_service_category_image_url', $url);
    } catch (Exception $e) {
        return null;
    }
}


