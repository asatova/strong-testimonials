<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
include TC_CAF_PATH . 'includes/query-variables.php';
$i=0;
if ($qry->have_posts()): while ($qry->have_posts()): $qry->the_post();
        global $post;
        $i++;
        // <article>
        do_action('caf_article_container_start', $id);

        do_action("caf_after_article_container_start",$id,$i);
        
       // </article>
        do_action("caf_article_container_end", $id);

    endwhile;
/**** Pagination*****/
    if (isset($_POST["params"]["load_more"])) {
        //do something
    } else {
        $caf_pagination->caf_ajax_pager($qry, $page, $caf_post_layout, $caf_pagi_type, $filter_id);
    }
    $response = [
        'status' => 200,
        'found' => $qry->found_posts,
        'message' => 'ok',
    ];
    wp_reset_postdata();
else:
    
    // class='error-of-empty-result error-caf'
    do_action("caf_empty_result_error", $caf_empty_res);

    $response = [
        'status' => 201,
        'message' => 'No posts found',
        'content' => '',
    ];
endif;