<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$caf_pagination = new CAF_ajax_pagination();
$caf_content_length = new CAF_content_length();
if (isset($filter_id)) {
    $id = $filter_id;
}
$caf_pagi_type = 'number';
if (get_post_meta($id, 'caf_pagination_type')) {
    $caf_pagi_type = get_post_meta($id, 'caf_pagination_type', true);
}
$trm = '';
$caf_desktop_col = '4';
$caf_tablet_col = '6';
$caf_mobile_col = '2';
$caf_desktop_col_val = '3';
$caf_tablet_col_val = '2';
$caf_mobile_col_val = '1';
$caf_post_author = "show";
$caf_post_date = "show";
$caf_post_comments = "show";
$caf_post_cats = "show";
$caf_post_rd = "show";
$caf_post_dsc = "show";
$caf_post_title = "show";
$caf_post_image = "show";
$caf_post_date_format = "d, M Y";
if (class_exists("TC_CAF_PRO")) {
    if (get_post_meta($id, 'caf_post_date_format')) {
        $caf_post_date_format = get_post_meta($id, 'caf_post_date_format', true);
    }
}
if (get_post_meta($id, 'caf_cpt_value')) {
    $caf_cpt_value = get_post_meta($id, 'caf_cpt_value', true);
}
if (get_post_meta($id, 'caf_taxonomy')) {
    $tax = get_post_meta($id, 'caf_taxonomy', true);
}
if (get_post_meta($id, 'caf_terms')) {
    $terms_sel = get_post_meta($id, 'caf_terms', true);
    if ($terms_sel) {
        $trm = implode(',', $terms_sel);
//echo $trm;
    }
}
/*---- APPEARANCE TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($id, 'caf_sec_bg_color')) {
    $caf_sec_bg_color = get_post_meta($id, 'caf_sec_bg_color', true);
}
if (get_post_meta($id, 'caf_filter_status')) {
    $caf_filter_status = get_post_meta($id, 'caf_filter_status', true);
}
if (get_post_meta($id, 'caf_filter_layout')) {
    $caf_filter_layout = get_post_meta($id, 'caf_filter_layout', true);
}
if (get_post_meta($id, 'caf_filter_font')) {
    $caf_filter_font = get_post_meta($id, 'caf_filter_font', true);
}
if (get_post_meta($id, 'caf_filter_transform')) {
    $caf_filter_transform = get_post_meta($id, 'caf_filter_transform', true);
}
if (get_post_meta($id, 'caf_filter_font_size')) {
    $caf_filter_font_size = get_post_meta($id, 'caf_filter_font_size', true);
}
if (get_post_meta($id, 'caf_filter_primary_color')) {
    $caf_filter_primary_color = get_post_meta($id, 'caf_filter_primary_color', true);
}
if (get_post_meta($id, 'caf_post_layout')) {
    $caf_post_layout = get_post_meta($id, 'caf_post_layout', true);
}
if (get_post_meta($id, 'caf_col_opt')) {
    $caf_col_opt = get_post_meta($id, 'caf_col_opt', true);
}
if ($caf_col_opt['caf_col_desktop']) {
    $caf_desktop_col = 12 / $caf_col_opt['caf_col_desktop'];
    $caf_desktop_col_val = $caf_col_opt['caf_col_desktop'];
}
if ($caf_col_opt['caf_col_tablet']) {
    $caf_tablet_col = 12 / $caf_col_opt['caf_col_tablet'];
    $caf_tablet_col_val = $caf_col_opt['caf_col_tablet'];
}
if ($caf_col_opt['caf_col_mobile']) {
    $caf_mobile_col = 12 / $caf_col_opt['caf_col_mobile'];
    $caf_mobile_col_val = $caf_col_opt['caf_col_mobile'];
}
if (get_post_meta($id, 'caf_post_primary_color')) {
    $caf_post_primary_color = get_post_meta($id, 'caf_post_primary_color', true);
}
if (get_post_meta($id, 'caf_post_sec_color')) {
    $caf_post_sec_color = get_post_meta($id, 'caf_post_sec_color', true);
}
if (get_post_meta($id, 'caf_post_sec_color2')) {
    $caf_post_sec_color2 = get_post_meta($id, 'caf_post_sec_color2', true);
}
if (get_post_meta($id, 'caf_image_size')) {
    $caf_image_size = get_post_meta($id, 'caf_image_size', true);
}
if (get_post_meta($id, 'caf_post_animation')) {
    $caf_post_animation = get_post_meta($id, 'caf_post_animation', true);
}
if (get_post_meta($id, 'caf_empty_res')) {
    $caf_empty_res = get_post_meta($id, 'caf_empty_res', true);
}
if (get_post_meta($id, 'caf_post_author')) {
    $caf_post_author = get_post_meta($id, 'caf_post_author', true);
}
if (get_post_meta($id, 'caf_post_date')) {
    $caf_post_date = get_post_meta($id, 'caf_post_date', true);
}
if (get_post_meta($id, 'caf_post_comments')) {
    $caf_post_comments = get_post_meta($id, 'caf_post_comments', true);
}
if (get_post_meta($id, 'caf_post_cats')) {
    $caf_post_cats = get_post_meta($id, 'caf_post_cats', true);
}
if (get_post_meta($id, 'caf_post_rd')) {
    $caf_post_rd = get_post_meta($id, 'caf_post_rd', true);
}
if (get_post_meta($id, 'caf_post_dsc')) {
    $caf_post_dsc = get_post_meta($id, 'caf_post_dsc', true);
}
if (get_post_meta($id, 'caf_post_title')) {
    $caf_post_title = get_post_meta($id, 'caf_post_title', true);
}
if (get_post_meta($id, 'caf_post_image')) {
    $caf_post_image = get_post_meta($id, 'caf_post_image', true);
}
if (get_post_meta($id, 'caf_link_target')) {
    $caf_link_target = get_post_meta($id, 'caf_link_target', true);
    if ($caf_link_target == "new_window") {$caf_link_target = '_blank';} else if ($caf_link_target == "same_window") {$caf_link_target = '_parent';} else if ($caf_link_target == "popup") {$caf_link_target = 'popup';} else { $caf_link_target = '_parent';}
}
if (get_post_meta($id, 'caf_per_page')) {
    $caf_per_page = get_post_meta($id, 'caf_per_page', true);
}

/*---- TYPOGRAPHY TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($id, 'caf_post_font')) {
    $caf_post_font = get_post_meta($id, 'caf_post_font', true);
}
if (get_post_meta($id, 'caf_post_title_transform')) {
    $caf_post_title_transform = get_post_meta($id, 'caf_post_title_transform', true);
}
if (get_post_meta($id, 'caf_post_title_font_size')) {
    $caf_post_title_font_size = get_post_meta($id, 'caf_post_title_font_size', true);
}
/*---- ADVANCED TAB SUBMITTED VARIABLE VALUES ----*/

if (get_post_meta($id, 'caf_special_post_class')) {
    $caf_special_post_class = get_post_meta($id, 'caf_special_post_class', true);
}