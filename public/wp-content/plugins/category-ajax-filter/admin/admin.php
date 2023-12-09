<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
require_once TC_CAF_PATH . 'admin/functions.php';
new CAF_init();
new CAF_Embed_Admin_Css_Js;
new CAF_Meta_Boxes();
new CAF_load_scripts();
new CAF_shortcode();
require TC_CAF_PATH . 'admin/ajax-actions.php';
new CAF_admin_ajax();
