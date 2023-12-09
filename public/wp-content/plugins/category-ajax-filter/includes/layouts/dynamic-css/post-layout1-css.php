<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
include TC_CAF_PATH.'includes/query-variables.php';
//include TC_CAF_PRO_PATH.'includes/query-variables.php';
$target_div=".data-target-div".$b;
$post_css="";
if(class_exists("TC_CAF_PRO")){
    if (get_post_meta($id, 'caf_post_desc_font')) {
        $caf_post_desc_font = get_post_meta($id, 'caf_post_desc_font', true);
    }
    if (get_post_meta($id, 'caf_post_desc_transform')) {
        $caf_post_desc_transform = get_post_meta($id, 'caf_post_desc_transform', true);
    }
    if (get_post_meta($id, 'caf_post_desc_font_size')) {
        $caf_post_desc_font_size = get_post_meta($id, 'caf_post_desc_font_size', true);
    }
$post_css.="".$target_div." .caf-post-layout1 .caf-content {font-family:".$caf_post_desc_font.";text-transform:".$caf_post_desc_transform.";font-size:".$caf_post_desc_font_size."px;}";
}
else {
$post_css.="".$target_div." .caf-post-layout1 .caf-content {font-family:".$caf_post_font.";}" ;
}
$line_height=$caf_post_title_font_size+3;
$post_css.="#caf-post-layout-container".$target_div.".post-layout1 {background-color: ".$caf_sec_bg_color.";font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout1 .caf-post-title {background-color: ".$caf_post_primary_color.";}
".$target_div." .caf-post-layout1 .caf-post-title h2 ,".$target_div." .caf-post-layout1 .caf-post-title h2 a{color: ".$caf_post_sec_color.";font-family:".$caf_post_font.";text-transform:".$caf_post_title_transform.";font-size:".$caf_post_title_font_size."px;font-weight:bold;line-height:".$line_height."px}
".$target_div." .caf-post-layout1 .caf-meta-content i {color:".$caf_post_sec_color2.";}
".$target_div." .caf-meta-content-cats li a {background-color: ".$caf_post_sec_color.";color:".$caf_post_sec_color2.";font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout1 span.author,".$target_div." .caf-post-layout1 span.date,".$target_div." .caf-post-layout1 span.comment {
font-family:".$caf_post_font.";}
".$target_div." ul#caf-layout-pagination.post-layout1 li a,".$target_div." .prev-next-caf-pagination .caf-pagi-btn {font-family:".$caf_post_font.";color: ".$caf_post_primary_color.";background-color:".$caf_post_sec_color."}
".$target_div." ul#caf-layout-pagination.post-layout1 li span.current { color: ".$caf_post_sec_color.";background-color: ".$caf_post_primary_color.";font-family:".$caf_post_font.";}
".$target_div." .error-caf {background-color: ".$caf_post_primary_color."; color: ".$caf_post_sec_color.";font-family:".$caf_post_font.";font-size:".$caf_post_title_font_size."px;}
".$target_div." .caf-post-layout1 .caf-meta-content,".$target_div." .caf-post-layout1 .caf-content {color: ".$caf_post_sec_color2.";}
".$target_div." .caf-post-layout1 a.caf-read-more {font-family:".$caf_post_font.";border-color: ".$caf_post_primary_color."; color: ".$caf_post_primary_color.";background-color: ".$caf_post_sec_color.";}
".$target_div." .caf-post-layout1 a.caf-read-more:hover {background-color: ".$caf_post_primary_color.";}
".$target_div." .status i {color:".$caf_post_primary_color.";background-color: ".$caf_post_sec_color.";}
".$target_div." .caf-post-layout1 .caf-meta-content-cats li a  {background-color:".$caf_post_primary_color.";color: ".$caf_post_sec_color.";}";

wp_add_inline_style($handle,$post_css);



