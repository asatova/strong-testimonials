<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$caf_post_date_format = apply_filters('tc_caf_post_date_format', $caf_post_date_format, $id);
            if ($caf_post_layout == 'post-layout1' || $caf_post_layout == 'post-layout11') {
                echo "<span class='date caf-col-md-6 caf-pl-0'><i class='fa fa-calendar' aria-hidden='true'></i> " . get_the_date($caf_post_date_format) . "</span>";
            } else {
                echo "<span class='date caf-pl-0'><i class='fa fa-calendar' aria-hidden='true'></i> " . get_the_date($caf_post_date_format) . "</span>";
            }