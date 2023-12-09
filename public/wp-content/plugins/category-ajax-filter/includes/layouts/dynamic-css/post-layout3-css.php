<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
include TC_CAF_PATH.'includes/query-variables.php';
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
    $post_css.="".$target_div." .caf-post-layout3 .caf-content {font-family:".$caf_post_desc_font.";text-transform:".$caf_post_desc_transform.";font-size:".$caf_post_desc_font_size."px;}";
}
$post_css.="".$target_div." .error-caf {font-family:".$caf_post_font.";background-color: ".$caf_post_sec_color."; color: ".$caf_post_primary_color.";font-size:".$caf_post_title_font_size."px;}
".$target_div." .caf-post-layout3 .caf-post-title h2 a {font-family:".$caf_post_font.";text-transform:".$caf_post_title_transform.";font-size:".$caf_post_title_font_size."px;}
".$target_div." .caf-post-layout3 .caf-meta-content-cats li a {font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout3 span.author, ".$target_div." .caf-post-layout3 span.date, ".$target_div." .caf-post-layout3 span.comment {font-family:".$caf_post_font.";color: ".$caf_post_primary_color.";}
".$target_div." ul#caf-layout-pagination.post-layout3 li a,".$target_div." .prev-next-caf-pagination .caf-pagi-btn {font-family:".$caf_post_font.";background-color: ".$caf_post_sec_color2.";color:".$caf_post_sec_color.";}
".$target_div." ul#caf-layout-pagination.post-layout3 span.page-numbers.current {font-family:".$caf_post_font.";color: ".$caf_post_sec_color2.";background-color:".$caf_post_sec_color.";}
#caf-post-layout-container".$target_div.".post-layout3 {background-color: ".$caf_sec_bg_color.";}
".$target_div." .caf-post-layout3 .caf-post-title h2 a:hover, ".$target_div." .caf-post-layout3 span.date {color: ".$caf_post_primary_color.";}
".$target_div." .caf-post-layout3 .caf-post-title h2 a,  ".$target_div." .caf-post-layout3 .caf-meta-content-cats li a {color: ".$caf_post_sec_color.";}
".$target_div." .caf-post-layout3 .caf-meta-content-cats li a {background-color: ".$caf_post_primary_color.";}
".$target_div." .caf-meta-content{color: ".$caf_post_sec_color2.";}
".$target_div." .caf-post-layout3 .caf-content{color: ".$caf_post_sec_color.";}
".$target_div." .caf-post-layout3 a.caf-read-more{color: ".$caf_post_sec_color.";background-color: ".$caf_post_primary_color.";}
".$target_div." .status i {color:".$caf_post_primary_color.";}";

wp_add_inline_style($handle,$post_css);



