<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $post;
$cats_class='';
$caf_post_id = get_the_ID();
$title = get_the_title();
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $caf_image_size);
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
$link = get_the_permalink();
$caf_content = $post->post_excerpt;
if (empty($caf_content)) {
    $caf_content = $post->post_content;
}
$html_support=false;
if(class_exists("TC_CAF_PRO")) {
$html_support=apply_filters("caf_content_support_html",false,$id);
}
if($html_support==false) {
$caf_content = preg_replace('#\[[^\]]+\]#', '', $caf_content);
$c_length = apply_filters('tc_caf_excerpt_length', 30, $id);
$caf_content = wp_trim_words($caf_content, $c_length);
}
