<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
$option_name = 'tc_caf_plugin_version';
delete_option($option_name);
global $wpdb;
