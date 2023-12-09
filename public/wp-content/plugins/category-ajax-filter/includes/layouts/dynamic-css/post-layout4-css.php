<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
include TC_CAF_PATH.'includes/query-variables.php';
$target_div=".data-target-div".$b;
$post_css=" ";


if(class_exists("TC_CAF_PRO")){

include TC_CAF_PRO_PATH.'admin/tabs/variables.php';
if($caf_post_image=="hide") {
    $post_css.="".$target_div." .caf-post-layout4 #manage-post-area {width:100%;}";
}
if (get_post_meta($id, 'caf_post_desc_font')) {
    $caf_post_desc_font = get_post_meta($id, 'caf_post_desc_font', true);
}
if (get_post_meta($id, 'caf_post_desc_transform')) {
    $caf_post_desc_transform = get_post_meta($id, 'caf_post_desc_transform', true);
}
if (get_post_meta($id, 'caf_post_desc_font_size')) {
    $caf_post_desc_font_size = get_post_meta($id, 'caf_post_desc_font_size', true);
}
$post_css.="".$target_div." .caf-post-layout4 .caf-content {color: ".$caf_post_sec_color2.";font-family:".$caf_post_desc_font.";text-transform:".$caf_post_desc_transform.";font-size:".$caf_post_desc_font_size."px; }";
}
else {
$post_css.="".$target_div." .caf-meta-content, ".$target_div.".caf-post-layout4 .caf-content {color: ".$caf_post_sec_color2.";font-family:".$caf_post_font.";}" ;
}
//$line_height=$caf_post_title_font_size+3;
$post_css.="#caf-post-layout-container".$target_div.".post-layout4 {background-color: ".$caf_sec_bg_color." !important;}
".$target_div." .caf-post-layout4 .caf-post-title h2,".$target_div." .caf-post-layout4 .caf-post-title h2 a {color: ".$caf_post_primary_color.";font-family:".$caf_post_font.";text-transform:".$caf_post_title_transform.";font-size:".$caf_post_title_font_size."px;}
".$target_div." .caf-post-layout4 .caf-meta-content-cats li a {color: ".$caf_post_sec_color.";font-family:".$caf_post_font.";}
".$target_div." ul#caf-layout-pagination.post-layout4 li a,".$target_div." .prev-next-caf-pagination .caf-pagi-btn{background-color: ".$caf_post_primary_color.";color: ".$caf_post_sec_color.";font-family:".$caf_post_font.";}
".$target_div." ul#caf-layout-pagination.post-layout4 span.page-numbers.current {font-family:".$caf_post_font.";color: ".$caf_post_sec_color2.";background-color:".$caf_post_sec_color.";}
".$target_div." .caf-post-layout4 .caf-content {color: ".$caf_post_sec_color2.";font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout4 span.author,".$target_div." .caf-post-layout4 span.date,".$target_div." .caf-post-layout4 span.comment {
font-family:".$caf_post_font.";color:".$caf_post_primary_color.";}
".$target_div." .caf-post-layout4 a.caf-read-more {border-color: ".$caf_post_primary_color."; color: ".$caf_post_sec_color."; }
".$target_div." .caf-post-layout4 a.caf-read-more:hover {background-color: ".$caf_post_sec_color.";color: ".$caf_post_primary_color.";}
".$target_div." .error-caf{background-color: ".$caf_post_primary_color."; color: ".$caf_post_sec_color.";font-size:".$caf_post_title_font_size."px;font-family:".$caf_post_font.";}
".$target_div." .status i {color:".$caf_post_primary_color.";}";

wp_add_inline_style($handle,$post_css);



