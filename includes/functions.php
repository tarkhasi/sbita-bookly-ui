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