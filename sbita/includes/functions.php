<?php

if (!function_exists('sbu_pre_key')) return;

/**
 * Pre key
 *
 * @return string
 */
function sbu_pre_key()
{
    return '_sbu_';
}

/**
 * Set request params
 */
function sbu_set_request_params()
{
    global $json_api;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        foreach ($params as $k => $val) {
            $json_api->query->$k = $val;
        }
    }
}

/**
 * Get a option value
 *
 * @param $key
 * @return null
 */
function sbu_get_option($key)
{
    try {
        return get_option(sbu_pre_key() . $key);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get settings page url
 *
 * @param null $tab
 * @return null
 */
function sbu_settings_url($tab = null)
{
    try {
        $url = esc_url(get_admin_url(null, 'admin.php?page=sbita-settings'));
        if (!$tab) return $url;
        return $url . '&tab=' . $tab;
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Update sbita option value
 *
 * @param $key
 * @param $value
 * @return null
 */
function sbu_update_option($key, $value)
{
    try {
        return update_option(sbu_pre_key() . $key, $value);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Found default value of option
 *
 * @param $key
 * @return null
 */
function sbu_get_option_default_value($key)
{
    try {
        $options = apply_filters('sbu_options', []);
        return $options[sbu_pre_key() . $key];
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get user by metadata
 *
 * @param $key
 * @param $value
 * @return null|string
 */
function sbu_find_user_by_metadata($key, $value)
{
    try {
        $args = array(
            'meta_query' => array(
                array(
                    'key' => $key,
                    'value' => $value,
                    'compare' => '='
                )
            )
        );

        $users = get_users($args);
        if (!$users || !is_array($users)) return null;

        return $users[0];
    } catch (Exception $e) {
        return null;
    }
}

/**
 * This method return a param value form a string
 *
 * @param $string
 * @param $param_name
 * @return null|string
 */
function sbu_get_param_form_string($string, $param_name)
{
    try {
        $result = preg_match("/{$param_name}=(\"|')(.*?)(\"|')/", $string, $value);
        $value = array_values(array_filter($value, function ($item) {
            return $item != '"';
        }));
        if ($result != 1) return '';
        return $value[1];
    } catch (Exception $e) {
        return '';
    }
}

/**
 * This method get a order staff list
 * of booking items. this method use Bookly plugin.
 *
 * @param $message
 * @param bool $success
 * @param string $plugin
 * @return null
 */
function sbu_show_admin_message($message, $success = false, $plugin = 'Sbita Core')
{
    try {
        add_action('admin_notices', function () use ($message, $success, $plugin) {
            if ($plugin) $plugin .= ':';
            echo sprintf("<div class='notice notice-%s is-dismissible'><p> %s %s </p></div>", esc_attr($success ? 'success' : 'error'), esc_html($plugin), esc_html($message));
        });
    } catch (Exception $e) {
        // log this error!
    }
}


/**
 * Get plugin dir name
 */
function sbu_plugin_dir_name($file)
{
    try {
        $start = "~plugins/";
        $end = '/~i';
        $split = '/';

        if (strpos($file, 'plugins\\') !== false) {
            $start = "~plugins\\\\";
            $end = '\\\\~i';
            $split = '\\';
        }

        preg_match("$start([^{]*)$end", $file, $match);
        if (count($match) < 2) throw new Exception('Not found!');
        $result = $match[1];

        if (strpos($file, $split) !== false) $result = explode($split, $result);

        return $result[0];
    } catch (Exception $e) {
        // todo
        return null;
    }
}

/**
 * Get plugin path
 */
function sbu_plugin_path($file)
{
    try {
        $dir_name = sbu_plugin_dir_name($file);
        if (!$dir_name) return null;
        return path_join(WP_PLUGIN_DIR, $dir_name);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get plugin template
 */
function sbu_plugin_template($file, $filename)
{
    try {
        $path = sbu_plugin_path($file);
        $path = path_join($path, 'templates');
        return path_join($path, $filename);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get plugin template
 */
function sbu_sbita_plugin_template($file, $filename)
{
    try {
        $path = path_join(sbu_plugin_path($file), 'sbita');
        $path = path_join($path, 'templates');
        return path_join($path, $filename);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get plugin asset dir
 */
function sbu_plugin_asset($file, $filename)
{
    try {
        $path = sbu_plugin_path($file);
        $path = path_join($path, 'asset');
        return path_join($path, $filename);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get plugin asset url
 */
function sbu_plugin_asset_url($file, $filename)
{
    try {
        $path = sbu_plugin_path($file);
        $path = path_join($path, 'main.php');
        $path = path_join(plugin_dir_url($path), 'assets');
        return path_join($path, $filename);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Get plugin asset url
 */
function sbu_sbita_plugin_asset_url($file, $filename)
{
    try {
        $path = path_join(sbu_plugin_path($file), 'sbita');
        $path = path_join($path, 'main.php');
        $path = path_join(plugin_dir_url($path), 'assets');
        return path_join($path, $filename);
    } catch (Exception $e) {
        return null;
    }
}


/**
 * Licence
 *
 * @param $licence
 * @param $product_id
 * @param string $action
 * @param null $licence_site
 * @return false|mixed
 */
function sbu_licence($licence, $product_id, $action = 'activate_license', $licence_site = null)
{
    try {
        if (empty($product_id) || empty($licence)) throw new Exception('Product id and licence required!');
        if (empty($licence_site)) $licence_site = get_site_url();

        $url = sbu_site_url();
        $url .= sprintf('?edd_action=%s&item_id=%s&license=%s&url=%s', $action, $product_id, $licence, $licence_site);
        $result = file_get_contents($url);
        $data = json_decode($result, true);
        if (!isset($data['success'])) throw new Exception('Connection error!');
        return $data['success'];
    } catch (Exception $exception) {
        return false;
    }
}

/**
 * Base url
 *
 * @return string
 */
function sbu_site_url()
{
    return 'https://wpkok.com/';
}
