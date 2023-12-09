<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ($caf_post_layout == 'post-layout1') {
                echo "<span class='author caf-col-md-4 caf-pl-0'><i class='fa fa-user' aria-hidden='true'></i> " . get_the_author() . "</span>";
            } else if ($caf_post_layout == 'post-layout3') {
                echo "<b><span class='author caf-pl-0'>By " . get_the_author() . " - </span></b>";
            } else if ($caf_post_layout == 'post-layout6' || $caf_post_layout == 'post-layout7') {
                echo "<span class='author caf-pl-0'>By " . get_the_author() . "</span>";
            } else {
                echo "<b><span class='author caf-pl-0'>" . get_the_author() . " - </span></b>";
            }