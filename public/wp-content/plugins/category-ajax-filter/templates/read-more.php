<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$rd_more = esc_html('Read More');
            if ($caf_post_layout == 'post-layout7') {
                echo "<div class='caf-content-read-more'><a class='caf-read-more' href='" . esc_url($link) . "' target='" . esc_attr($caf_link_target) . "'><i class='fa fa-file-text-o'></i>" . apply_filters('tc_caf_post_layout_read_more', $rd_more, $id) . "</a></div>";
            } else {
                echo "<div class='caf-content-read-more'><a class='caf-read-more' href='" . esc_url($link) . "' target='" . esc_attr($caf_link_target) . "'>" . apply_filters('tc_caf_post_layout_read_more', $rd_more, $id) . "</a></div>";
            }