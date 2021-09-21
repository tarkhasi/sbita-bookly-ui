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

/**
 * Get staff members
 *
 * @return mixed|string
 */

function sbu_get_staff_members($service_id = null)
{
    try {
        $query = Bookly\Lib\Entities\Staff::query('staff')
            ->where('staff.visibility', 'public');

        if ($service_id) {
            $query->innerJoin('StaffService', 'ss', 'ss.staff_id = staff.id')
                ->where('ss.service_id', $service_id);
        }

        return $query->fetchArray();
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get staff members options
 *
 * @return mixed|string
 */
function sbu_get_staff_members_options($service_id = null)
{
    try {
        $options = array();
        $staff_members = sbu_get_staff_members();
        foreach ($staff_members as $staff) {
            $options[$staff['id']] = $staff['full_name'];
        }
        return $options;
    } catch (Exception $e) {
        return null;
    }
}


/**
 * Get categories query
 *
 * @return mixed|string
 */
function sbu_get_categories_query()
{
    try {
        return \Bookly\Lib\Entities\Category::query('c');
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get categories
 *
 * @return mixed|string
 */
function sbu_get_categories()
{
    try {
        return sbu_get_categories_query()->fetchArray();
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get categories options
 *
 * @return mixed|string
 */
function sbu_get_categories_options()
{
    try {
        $options = array();
        $categories = sbu_get_categories();
        foreach ($categories as $staff) {
            $options[$staff['id']] = $staff['name'];
        }
        return $options;
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Check license
 */
function sbu_check_licence($from_server = false)
{
    try {
        $licence = sbita_get_option('bu_licence');
        $product_id = sbu_get_product_id();
        $local = sbita_get_option('bu_licence_activated');
        if ($local !== null && $from_server == false) return $local;

        $result = sbita_licence($licence, $product_id);
        sbita_update_option('bu_licence_activated', $result);
        return $result;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Get Product id
 */
function sbu_get_product_id()
{
    return '3632';
}

/**
 * Need pro message
 */
function sbu_need_pro($message = null)
{
    if ($message == null) $message = __('You need the Pro version. ', 'sbita-bookly-ui');
    return sprintf(__('<div>%s <a href="https://wpkok.com/downloads/bookly-ui/" target="_blank">Sbita Bookly Ui Pro (Add-on)</a>!</div>', 'sbita-bookly-ui'), $message);
}