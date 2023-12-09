<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div id="caf-filter-layout2" class='caf-filter-layout data-target-div<?php echo esc_attr($b) . " " . esc_attr($flsr); ?>'>
<div class="selectcont caf-filter-container">
<?php
if ($terms_sel) {

    if (class_exists("TC_CAF_PRO")) {
        $trm1 = implode(',', $terms_sel_tax);
    } else {
        $trm1 = implode(',', $terms_sel);
    }
    echo '<div class="selectcont">
	<ul class="dropdown">
    <li class="init" value="1000"><span>';
    echo apply_filters('tc_caf_add_custom_span_before_filter', array($caf_filter, 'tc_caf_add_custom_span_before_filter'), $id);
    echo '</span><span class="result">';
    echo apply_filters('tc_caf_add_custom_list_before_filter', array($caf_filter, 'tc_caf_add_custom_list_before_filter'), $id);
    echo '</span><span class="arrow-down"><i class="fa fa-angle-down" aria-hidden="true"></i></span><span class="arrow-up" style="display: none;"><i class="fa fa-angle-up" aria-hidden="true"></i></span><ul>';
    if ($caf_all_ed == 'enable') {
        echo '<li><a href="#" data-id="' . esc_attr($trm1) . '" data-main-id="flt" class="caf-mb-3 active dfl" data-target-div="data-target-div' . esc_attr($b) . '">';
        echo apply_filters('tc_caf_add_custom_list_before_filter', 'tc_caf_add_custom_list_before_filter', $id);
        echo '</a></li>';
    }
    $terms_sel = apply_filters('tc_caf_filter_order_by', $terms_sel, $id);
    foreach ($terms_sel as $term) {
        $term_data = get_term($term);
        $ic = '';
        if (isset($trc)) {
            if (isset($trc[$term_data->term_id])) {
                $ic = $trc[$term_data->term_id];
            }
        }
        if ($term_data) {
            if (class_exists("TC_CAF_PRO")) {
                $data_id = esc_attr($term_data->taxonomy) . "___" . esc_attr($term_data->term_id);
            } else {
                $data_id = esc_attr($term_data->term_id);
            }
            echo "<li class='caf-mb-3'><a href='#' data-id='" . esc_attr($data_id) . "' data-main-id='flt' data-target-div='data-target-div" . esc_attr($b) . "'>";
            if (class_exists("TC_CAF_PRO") && $ic && $ic != 'undefined') {
                echo "<i class='$ic caf-front-ic'></i>";
            }
            echo esc_html($term_data->name) . "</a></li>";
        }
    }
    echo '</ul></li>';
    echo '</ul>';
    do_action("caf_after_filter_layout", $id, $b);
    echo '</div>';
}
?>
</ul>
</div>
</div>
