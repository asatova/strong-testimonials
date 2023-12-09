<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$trm = '';
$caf_post_layout = 'post-layout1';
$caf_filter_layout = 'filter-layout1';
$caf_all_ed = 'enable';
//$caf_term_dy='enable';

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
if (get_post_meta($id, 'caf_filter_sec_color')) {
    $caf_filter_sec_color = get_post_meta($id, 'caf_filter_sec_color', true);
}
if (get_post_meta($id, 'caf_filter_sec_color2')) {
    $caf_filter_sec_color2 = get_post_meta($id, 'caf_filter_sec_color2', true);
}
if (get_post_meta($id, 'caf_post_layout')) {
    $caf_post_layout = get_post_meta($id, 'caf_post_layout', true);
}
if (get_post_meta($id, 'caf_col_opt')) {
    $caf_col_opt = get_post_meta($id, 'caf_col_opt', true);
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
if (get_post_meta($id, 'caf_empty_res')) {
    $caf_empty_res = get_post_meta($id, 'caf_empty_res', true);
}
if (get_post_meta($id, 'caf_link_target')) {
    $caf_link_target = get_post_meta($id, 'caf_link_target', true);
}
if (get_post_meta($id, 'caf_per_page')) {
    $caf_per_page = get_post_meta($id, 'caf_per_page', true);
}
/*---- TYPOGRAPHY TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($id, 'caf_post_title_font_size')) {
    $caf_post_title_font_size = get_post_meta($id, 'caf_post_title_font_size', true);
}
if (get_post_meta($id, 'caf_post_title_font_color')) {
    $caf_post_title_font_color = get_post_meta($id, 'caf_post_title_font_color', true);
}
if (get_post_meta($id, 'caf_post_desc_font_size')) {
    $caf_post_desc_font_size = get_post_meta($id, 'caf_post_desc_font_size', true);
}
if (get_post_meta($id, 'caf_post_desc_font_color')) {
    $caf_post_desc_font_color = get_post_meta($id, 'caf_post_desc_font_color', true);
}
/*---- ADVANCED TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($id, 'caf_special_post_class')) {
    $caf_special_post_class = get_post_meta($id, 'caf_special_post_class', true);
}
$flsr = '';
//var_dump($qry);
