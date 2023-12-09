<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
echo "<span class='comment caf-col-md-3 caf-pl-0'><i class='fa fa-comment' aria-hidden='true'></i> " . get_comments_number() . "</span>";