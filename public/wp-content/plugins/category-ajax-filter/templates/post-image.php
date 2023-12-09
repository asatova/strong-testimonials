<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (isset($image[0])) {
            echo "<a href='" . esc_url($link) . "' target='" . esc_attr($caf_link_target) . "' class='" . $a_class . "'><div class='caf-featured-img-box " . $img_box . "' style='background:url(" . esc_url($image[0]) . "
                    )'></div></a>";
        } else {
            $image = TC_CAF_URL . 'assets/img/unnamed.jpg';
            echo "<a href='" . esc_url($link) . "' target='" . esc_attr($caf_link_target) . "' class='" . $a_class . "'><div class='caf-featured-img-box " . $img_box . "' style='background:url(" . esc_url($image) . "
                    )'></div>
                    </a>";
        }