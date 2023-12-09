<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
echo "<div class='caf-meta-content-cats'>";
            echo "<ul class='caf-mb-0'>";
            if (is_array($cats)) {
                foreach ($cats as $index => $cat) {
                    $clink = get_category_link($cat->term_id);
                    echo "<li><a href='" . esc_url($clink) . "' target='_blank'>" . esc_html($cat->name) . "</a></li>";
                }
            }
            echo "</ul>";
            echo "</div>";