<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div id="caf-filter-layout1" class='caf-filter-layout data-target-div<?php echo esc_attr($b) . " " . esc_attr($flsr); ?>'>
<ul class="caf-filter-container caf-filter-layout1">
<?php
if ($terms_sel) {
    $total_terms = count($terms_sel);
    $total_terms_1 = $total_terms - 1;
    $terms_sel = apply_filters('tc_caf_filter_order_by', $terms_sel, $id);
    if (class_exists("TC_CAF_PRO")) {
        $trm1 = implode(',', $terms_sel_tax);
    } else {
        $trm1 = implode(',', $terms_sel);
    }
    //echo "flayout".$caf_default_term;
    $all_text = "All";
    $all_text = apply_filters('tc_caf_filter_all_text', $all_text, $id);
    if (!class_exists("TC_CAF_PRO")) {
        $cl = 'active';
    } else {
        if ($caf_default_term == 'all') {
            $cl = 'active';
        }
    }
    if ($caf_all_ed == 'enable') {
        echo '<li class="caf-mb-4"><a href="#" data-id="' . esc_attr($trm1) . '" data-main-id="flt" class=" abc ' . esc_attr($cl) . '" data-target-div="data-target-div' . esc_attr($b) . '">' . esc_attr($all_text) . '</a></li>';
    }
    foreach ($terms_sel as $key => $term) {
        $term_data = get_term($term);
        if ($term_data) {
            if (class_exists("TC_CAF_PRO")) {
                if ($caf_filter_more_btn == "on") {
                    $more_link_val = $caf_filter_more_val;
                    if ($key == $more_link_val) {
                        echo "<li class='caf-mb-4 more'><span>";
                        $more_text = "More +";
                        $more_text = apply_filters('tc_caf_filter_more_text', $more_text, $id);
                        echo $more_text;
                        echo "</span><ul>";
                    }
                }
                if ($caf_default_term == $term_data->taxonomy . "___" . $term_data->term_id) {$cl = 'active';} else { $cl = '';}
            } else {
                $cl = '';
            }
            if (class_exists("TC_CAF_PRO")) {
                $data_id = esc_attr($term_data->taxonomy) . "___" . esc_attr($term_data->term_id);
            } else {
                $data_id = esc_attr($term_data->term_id);
            }

            $ic = '';
            if (isset($trc)) {
                if (isset($trc[$term_data->term_id])) {
                    $ic = $trc[$term_data->term_id];
                }
            }
            echo "<li class='caf-mb-4'><a href='#' data-id='" . esc_attr($data_id) . "' data-main-id='flt' data-target-div='data-target-div" . esc_attr($b) . "' class='" . esc_attr($cl) . "'>";
            if (class_exists("TC_CAF_PRO") && isset($ic) && $ic != 'undefined') {
                echo "<i class='$ic caf-front-ic'></i>";
            }
            echo esc_html($term_data->name) . "</a></li>";
            if (class_exists("TC_CAF_PRO")) {
                if ($caf_filter_more_btn == "on") {
                    if ($key == $total_terms_1) {
                        echo "</ul></li>";
                    }
                }
            }
        }
    }
}
do_action("caf_after_filter_layout", $id, $b);
?>
</ul>
</div>