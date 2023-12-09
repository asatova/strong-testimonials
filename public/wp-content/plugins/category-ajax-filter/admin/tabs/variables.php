<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $post;
$args = array(
    'public' => true,
);
$output = 'names';
$cpost_types = get_post_types($args, $output);
$pos = array_search('attachment', $cpost_types);
unset($cpost_types[$pos]);
$pos = array_search('popup', $cpost_types);
unset($cpost_types[$pos]);
$pos = array_search('post', $cpost_types);
unset($cpost_types[$pos]);
//$pos = array_search('product', $cpost_types);
//unset($cpost_types[$pos]);
ksort($cpost_types, SORT_ASC);
/*---- GENERAL TAB USED DEFAULT VARIABLES ----*/
$select = 'post';
$tax = 'category';
$terms_sel = array();
/*---- APPEARANCE TAB USED DEFAULT VARIABLES ----*/
$caf_sec_bg_color = "#ffffff00";
$caf_filter_status = 'on';
$caf_filter_layout = 'filter-layout1';
$caf_filter_primary_color = '#fff';
$caf_filter_sec_color = '#262626';
$caf_filter_sec_color2 = '#fcb040';
$caf_post_primary_color = '#262626';
$caf_post_sec_color = '#fcb040';
$caf_post_sec_color2 = '#262626';
$caf_post_layout = 'post-layout1';
$caf_col_opt = array("caf_col_desktop_large" => '3', "caf_col_desktop" => '3', "caf_col_tablet" => '2', "caf_col_mobile" => '1');
$caf_image_size = "large";
$caf_post_image_overlay_color = '#23282d';
$caf_post_animation = 'animate-off';
$caf_empty_res = "No Result.";
$caf_link_target = "new_window";
$caf_per_page = '3';
$caf_pagi_type = 'number';
/*---- TYPOGRAPHY TAB USED DEFAULT VARIABLES ----*/
$caf_filter_font = "inherit";
$caf_filter_transform = "capitalize";
$caf_filter_font_size = '12';
$caf_post_font = "inherit";
$caf_post_title_transform = "capitalize";
$caf_post_title_font_size = '12';
$caf_post_title_font_color = '#23282d';
$caf_post_desc_font_size = '12';
$caf_post_desc_font_color = '#23282d';
/*---- ADVANCED TAB USED DEFAULT VARIABLES ----*/
$caf_special_post_class = '';
$caf_special_security = 'disable';
/*---- GENERAL TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($post->ID, 'caf_cpt_value')) {
    $select = get_post_meta($post->ID, 'caf_cpt_value', true);
}
if (get_post_meta($post->ID, 'caf_taxonomy')) {
    $tax = get_post_meta($post->ID, 'caf_taxonomy', true);
    if (class_exists("TC_CAF_PRO")) {
        if (!empty($tax) && !is_array($tax)) {
            $tax = array($tax);
            if (get_post_meta($post->ID, 'caf_terms', true)) {
                $terms_sel = get_post_meta($post->ID, 'caf_terms', true);
                $terms_sel_def = $terms_sel;
                foreach ($terms_sel_def as $index => $trm) {
                    $terms_sel[] = get_post_meta($post->ID, 'caf_taxonomy', true) . "___" . $trm;
                }
                update_post_meta($post->ID, 'caf_taxonomy', $tax);
                $tax = get_post_meta($post->ID, 'caf_taxonomy', true);
                update_post_meta($post->ID, 'caf_terms', $terms_sel);
            }
        }
    }
}
if (get_post_meta($post->ID, 'caf_terms')) {
    $terms_sel = get_post_meta($post->ID, 'caf_terms', true);
}
/*---- APPEARANCE TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($post->ID, 'caf_sec_bg_color')) {
    $caf_sec_bg_color = get_post_meta($post->ID, 'caf_sec_bg_color', true);
}
if (get_post_meta($post->ID, 'caf_filter_status')) {
    $caf_filter_status = get_post_meta($post->ID, 'caf_filter_status', true);
}
if (get_post_meta($post->ID, 'caf_filter_layout')) {
    $caf_filter_layout = get_post_meta($post->ID, 'caf_filter_layout', true);
}
if (get_post_meta($post->ID, 'caf_filter_primary_color')) {
    $caf_filter_primary_color = get_post_meta($post->ID, 'caf_filter_primary_color', true);
}
if (get_post_meta($post->ID, 'caf_filter_sec_color')) {
    $caf_filter_sec_color = get_post_meta($post->ID, 'caf_filter_sec_color', true);
}
if (get_post_meta($post->ID, 'caf_filter_sec_color2')) {
    $caf_filter_sec_color2 = get_post_meta($post->ID, 'caf_filter_sec_color2', true);
}
if (get_post_meta($post->ID, 'caf_post_layout')) {
    $caf_post_layout = get_post_meta($post->ID, 'caf_post_layout', true);
}
if (get_post_meta($post->ID, 'caf_col_opt')) {
    $caf_col_opt = get_post_meta($post->ID, 'caf_col_opt', true);
}
if (get_post_meta($post->ID, 'caf_post_primary_color')) {
    $caf_post_primary_color = get_post_meta($post->ID, 'caf_post_primary_color', true);
}
if (get_post_meta($post->ID, 'caf_post_sec_color')) {
    $caf_post_sec_color = get_post_meta($post->ID, 'caf_post_sec_color', true);
}
if (get_post_meta($post->ID, 'caf_post_sec_color2')) {
    $caf_post_sec_color2 = get_post_meta($post->ID, 'caf_post_sec_color2', true);
}
if (get_post_meta($post->ID, 'caf_image_size')) {
    $caf_image_size = get_post_meta($post->ID, 'caf_image_size', true);
}
if (get_post_meta($post->ID, 'caf_post_animation')) {
    $caf_post_animation = get_post_meta($post->ID, 'caf_post_animation', true);
}
if (get_post_meta($post->ID, 'caf_empty_res')) {
    $caf_empty_res = get_post_meta($post->ID, 'caf_empty_res', true);
}
if (get_post_meta($post->ID, 'caf_link_target')) {
    $caf_link_target = get_post_meta($post->ID, 'caf_link_target', true);
}
if (get_post_meta($post->ID, 'caf_per_page')) {
    $caf_per_page = get_post_meta($post->ID, 'caf_per_page', true);
}
if (get_post_meta($post->ID, 'caf_pagination_type')) {
    $caf_pagi_type = get_post_meta($post->ID, 'caf_pagination_type', true);
}
/*---- TYPOGRAPHY TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($post->ID, 'caf_filter_font')) {
    $caf_filter_font = get_post_meta($post->ID, 'caf_filter_font', true);
}
if (get_post_meta($post->ID, 'caf_filter_transform')) {
    $caf_filter_transform = get_post_meta($post->ID, 'caf_filter_transform', true);
}
if (get_post_meta($post->ID, 'caf_filter_font_size')) {
    $caf_filter_font_size = get_post_meta($post->ID, 'caf_filter_font_size', true);
}
if (get_post_meta($post->ID, 'caf_post_font')) {
    $caf_post_font = get_post_meta($post->ID, 'caf_post_font', true);
}
if (get_post_meta($post->ID, 'caf_post_title_transform')) {
    $caf_post_title_transform = get_post_meta($post->ID, 'caf_post_title_transform', true);
}
if (get_post_meta($post->ID, 'caf_post_title_font_size')) {
    $caf_post_title_font_size = get_post_meta($post->ID, 'caf_post_title_font_size', true);
}
if (get_post_meta($post->ID, 'caf_post_title_font_color')) {
    $caf_post_title_font_color = get_post_meta($post->ID, 'caf_post_title_font_color', true);
}
if (get_post_meta($post->ID, 'caf_post_desc_font_size')) {
    $caf_post_desc_font_size = get_post_meta($post->ID, 'caf_post_desc_font_size', true);
}
if (get_post_meta($post->ID, 'caf_post_desc_font_color')) {
    $caf_post_desc_font_color = get_post_meta($post->ID, 'caf_post_desc_font_color', true);
}
/*---- ADVANCED TAB SUBMITTED VARIABLE VALUES ----*/
if (get_post_meta($post->ID, 'caf_special_post_class')) {
    $caf_special_post_class = get_post_meta($post->ID, 'caf_special_post_class', true);
}
if (get_post_meta($post->ID, 'caf_special_security')) {
    $caf_special_security = get_post_meta($post->ID, 'caf_special_security', true);
}
//echo "post type ".$select;
//echo "taxonomy ".$tax;
