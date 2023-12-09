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
    $post_css.="".$target_div." .caf-post-layout2 .caf-content {font-family:".$caf_post_desc_font.";text-transform:".$caf_post_desc_transform.";font-size:".$caf_post_desc_font_size."px;}";
if($caf_post_image=="hide") {
    $post_css=" ".$target_div." .caf-post-layout2 #manage-post-area {top:0}";    
}
}
$post_css.=" ".$target_div." .error-caf {font-family:".$caf_post_font.";background-color: ".$caf_post_sec_color."; color: ".$caf_post_primary_color.";font-size:".$caf_post_title_font_size."px;}
#caf-post-layout-container".$target_div.".post-layout2 {background-color: ".$caf_sec_bg_color."; font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout2 .caf-post-title h2 {font-family:".$caf_post_font.";font-size:".$caf_post_title_font_size."px;text-transform:".$caf_post_title_transform.";}
".$target_div." .caf-post-layout2 .caf-meta-content-cats li a {font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout2 span.author,".$target_div." .caf-post-layout2 span.date,".$target_div." .caf-post-layout2 span.comment,".$target_div." #caf-post-layout2 .caf-content,".$target_div." #caf-post-layout2 a.caf-read-more {font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout2 .caf-meta-content-cats li a,".$target_div." .caf-post-layout2 #manage-post-area:hover h2, ".$target_div." #caf-post-layout2 span.date,".$target_div." #caf-post-layout2 span.author,".$target_div." #caf-post-layout2 span.comment {color: ".$caf_post_primary_color.";}
".$target_div." .caf-post-layout2 .caf-meta-content,".$target_div." .caf-post-layout2 .caf-content,".$target_div." .caf-post-layout2 #manage-post-area h2,".$target_div." .caf-post-layout2 #manage-post-area h2 a {color: ".$caf_post_sec_color.";}
".$target_div." .caf-post-layout2 .error-caf{background-color: ".$caf_post_primary_color."; color: ".$caf_post_sec_color2.";font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout2 #manage-post-area {background-color: ".$caf_post_sec_color2.";border: 3px solid ".$caf_post_sec_color.";}
".$target_div." .caf-post-layout2 .caf-featured-img-box {border:4px solid ".$caf_post_sec_color2."}
".$target_div." ul#caf-layout-pagination.post-layout2 li span.current { background: ".$caf_post_sec_color.";color: ".$caf_post_sec_color2.";font-family:".$caf_post_font.";}
".$target_div." ul#caf-layout-pagination.post-layout2 li a,".$target_div." .prev-next-caf-pagination .caf-pagi-btn {background-color: ".$caf_post_sec_color2.";color:".$caf_post_primary_color.";font-family:".$caf_post_font.";}
".$target_div." .caf-post-layout2 a.caf-read-more{color: ".$caf_post_sec_color2.";background-color:".$caf_post_primary_color.";}

".$target_div." .status i {color:".$caf_post_primary_color.";}";

wp_add_inline_style($handle,$post_css);



