<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="tab-pane tab-pad active" id="general" role="tabpanel" aria-labelledby="general-tab">
	<div class="manage-top-dash general-tab text">
		<?php echo esc_html__('General Settings', 'category-ajax-filter'); ?></div>
	<div id="tabs-panel">
	<!---- START QUERY OPTIONS TOGGLE ---->
	<div class="tab-panel query">
		<div class="tab-header active" data-content="query"><i class="fa fa-check-square-o left" aria-hidden="true"></i> <?php echo esc_html__('Query Options', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
		<div class="tab-content query active">
<?php do_action("tc_caf_before_custom_post_type_select_row");?>

	<!---- START FULL ROW CUSTOM POST TYPE ---->
	<div class='col-sm-12 row-bottom'>
	<!-- FORM GROUP -->
	<div class="form-group row">
    <label for="custom-post-type-select" class="col-sm-12 col-form-label"><?php echo esc_html__('Custom Post Type', 'category-ajax-filter'); ?><span class="info">
       <?php echo esc_html__('Select your post type to filter. Default: Post', 'category-ajax-filter'); ?>
        </span></label>
    <div class="col-sm-12">
    <select class="form-control tc_caf_object_field tc_caf_select" data-field-type='select' id="custom-post-type-select" name="custom-post-type-select">
	<option value="post"><?php echo esc_html__('Post', 'category-ajax-filter'); ?></option>
    <?php
foreach ($cpost_types as $cpost_type) {
    if ($select == $cpost_type) {$sel = 'selected';} else { $sel = '';}
    echo "<option value='" . $cpost_type . "' $sel>" . esc_html($cpost_type) . "</option>";
}
?>
    </select>
	</div>
	</div>
    <!-- FORM GROUP -->

    </div>
	<!---- END FULL ROW CUSTOM POST TYPE ---->
  <?php do_action("tc_caf_after_caf_post_type_row");?>

	<!---- START FULL ROW TAXONOMY ---->
	<div class='col-sm-12 row-bottom'>
	<!---- FORM GROUP ---->
  <?php
if (class_exists("TC_CAF_PRO") && TC_CAF_PRO_PLUGIN_VERSION > '4.4.1') {
    $taxo = get_object_taxonomies($select);
    do_action("tc_caf_post_multiple_taxonomies", $taxo, $tax, $select);
} else {
    ?>
	<div class="form-group row">
    <label for="caf-taxonomy" class="col-sm-12 col-form-label"><?php echo esc_html__('Taxonomy', 'category-ajax-filter'); ?><span class="info"><?php echo esc_html__('Select your taxonomy from dropdown. Default: Category', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12">
    <select class="form-control tc_caf_object_field tc_caf_select" data-field-type='select' id="caf-taxonomy" name="caf-taxonomy">
	<?php
$taxo = get_object_taxonomies($select);
    if ($taxo) {
        foreach ($taxo as $tax1) {
            if ($tax == $tax1) {$sl = "selected";} else { $sl = "";}
            echo "<option value='" . $tax1 . "' id='hide' $sl>" . esc_html($tax1) . "</option>";
        }
    }
    ?>
 </select>
	</div>
	</div>
  <?php
}
?>
    <!---- FORM GROUP ---->
 </div>
	<!---- END FULL ROW TAXONOMY ---->
<?php do_action("tc_caf_after_caf_post_tax_row");?>
	<!---- START FULL ROW TERMS ---->
  <?php
$terms = get_terms(array('taxonomy' => $tax, 'hide_empty' => false));
if (class_exists("TC_CAF_PRO") && TC_CAF_PRO_PLUGIN_VERSION > '4.4.1') {
    $taxo = get_object_taxonomies($select);
    do_action("tc_caf_post_multiple_taxonomies_terms", $tax, $terms_sel);
} else {
    ?>
	<div class='col-sm-12 row-bottom'>
	<!---- FORM GROUP TERMS ---->
	<div class="form-group row">
    <label for="caf-terms" class="col-sm-12 col-form-label"><?php echo esc_html__('Terms', 'category-ajax-filter'); ?><span class="info"><?php echo esc_html__('Select Terms that you want to show on frontend. Default: 5/ASC ORDER', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12 ">
	<ul class="category-lists">
	<li id="all-cat"><input name='all-select' class='category-list-all check' id='category-all-btn' type='checkbox' onClick="selectAllCats(event)"><label for='category-all-btn' class='category-list-all-label'><?php echo esc_html__('All', 'category-ajax-filter'); ?></label></li>
	<?php
//var_dump($tax);
    $terms = get_terms(array('taxonomy' => $tax, 'hide_empty' => false));
    //var_dump($terms);
    if ($terms) {
        foreach ($terms as $term) {
            $sl1 = '';
            if (is_array($terms_sel)) {

                if (count($terms_sel) > 0) {
//var_dump($terms_sel);
                    if (in_array($term->term_id, $terms_sel)) {$sl1 = 'checked';} else { $sl1 = '';}}}

            echo "<li><input name='category-list[]' class='category-list check' id='category-list-id$term->term_id' type='checkbox' value='" . $term->term_id . "' $sl1><label for='category-list-id$term->term_id' class='category-list-label'>" . esc_html($term->name) . "</label></li>";
        }
    }
    ?>
	</ul>
	</div>
	</div>
    <!---- FORM GROUP ---->
    </div>
   <?php
}
?>
	<!---- END FULL ROW TERMS ---->
   <?php do_action("tc_caf_after_caf_post_terms_row", $terms);?>
	</div>


	</div>
  <?php do_action("tc_caf_after_caf_query_tab");?>
	<!---- END QUERY OPTIONS TOGGLE ---->

	</div>
	</div>