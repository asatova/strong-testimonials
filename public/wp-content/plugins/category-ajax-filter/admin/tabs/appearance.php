<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="tab-pane" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
	<div class="manage-top-dash general-tab text"> <?php echo esc_html__('Appearance', 'category-ajax-filter'); ?></div>
	<div id="tabs-panel">
    <!---- START SECTION BACKGROUND TOGGLE ---->
	<div class="tab-panel custom-meta">
	<div class="tab-header" data-content="section-background"><i class="fa fa-sign-in left" aria-hidden="true"></i> <?php echo esc_html__('Section Background', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
	<div class="tab-content section-background">
	<!---- START ENABLE/DISABLE FILTER FORM GROUP ROW ---->
	<div class='col-sm-12 section-background row-bottom'>
	<!---- FORM GROUP META FIELD ---->
	<div class="form-group row">
   <label for="caf-sec-bg-color" class='col-sm-12 bold-span-title'><?php echo esc_html__('Background Color', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select background color for main section.', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12 ">
    <input id="caf-sec-bg-color" type="text" value="<?php echo esc_attr($caf_sec_bg_color); ?>" class="my-color-field caf_import" data-import='caf_section_bg_color' name='caf-sec-bg-color' data-default-color="#ffffff00" />
	</div>
	</div>
    <!---- FORM GROUP ---->
    </div>
	<!---- END ENABLE/DISABLE FILTER FORM GROUP ROW ---->
  <?php do_action("tc_caf_after_caf_section_bg_row");?>
	</div>
	</div>
	<!---- END SECTION BACKGROUND TOGGLE ---->
		<?php do_action("tc_caf_after_caf_section_bg_tab");?>

	<!---- START POST ELEMENTS TOGGLE ---->
	<div class="tab-panel post-elements">

	<div class="tab-header" data-content="post-elements"><i class="fa fa-building left" aria-hidden="true"></i> <?php echo esc_html__('Post Elements', 'category-ajax-filter'); ?><i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content post-elements">

	<!---- START IMAGE SELECT GROUP ROW ---->

	<div class="col-sm-12 row-bottom">

	<div class="form-group row">

    <label for="caf-post-image" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Post Image', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Set featured image or first image of the post.', 'category-ajax-filter'); ?></span></label>

    <div class="col-sm-12">

    <select class="form-control" id="caf-post-image" name="caf-post-image">

	<option value="featured"><?php echo esc_html__('Featured Image', 'category-ajax-filter'); ?></option>

    </select>

	</div>

	</div>

	</div>
<?php do_action("tc_caf_after_caf_post_image_row");?>
	<!---- END IMAGE SELECT GROUP ROW ---->

	<!---- START IMAGE SIZE GROUP ROW ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">

    <label for="caf-post-image-size" class='col-sm-12 bold-span-title'><?php echo esc_html__('Image Size', 'category-ajax-filter'); ?> <span class='info'><?php echo esc_html__('Set image thumbnail size.', 'category-ajax-filter'); ?></span></label>

    <div class="col-sm-12">

		<?php

$thumb = caf_get_image_sizes('thumbnail');

$thumb = "Thumbnail (" . $thumb['width'] . "X" . $thumb['height'] . ")";

$med = caf_get_image_sizes('medium');

$med = "Medium (" . $med['width'] . "X" . $med['height'] . ")";

$large = caf_get_image_sizes('large');

$large = "Large (" . $large['width'] . "X" . $large['height'] . ")";

?>

    <select class="form-control caf_import" data-import="caf_post_img_size" id="caf-post-image-size" name="caf-post-image-size">

	<option value='thumbnail' <?php if ($caf_image_size == "thumbnail") {echo "selected";}?>> <?php echo esc_attr($thumb); ?> </option>";

	<option value='medium' <?php if ($caf_image_size == "medium") {echo "selected";}?>> <?php echo esc_attr($med); ?> </option>";

	<option value='large' <?php if ($caf_image_size == "large") {echo "selected";}?>> <?php echo esc_attr($large); ?> </option>";

    </select>
    </div>

	</div>



	</div>
	<!---- END IMAGE SIZE GROUP ROW ---->
  <?php do_action("tc_caf_after_caf_post_image_size_row");?>

	<!-- START EMPTY RESULT GROUP ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">
    <label for="caf-empty-result" class='col-sm-12 bold-span-title'><?php echo esc_html__('Empty Results Text', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Enter specific text to show while empty result in selected category from filter.', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12">
	<input type='text' class="form-control caf_import" data-import="caf_empty_result" id="caf-empty-result" name="caf-empty-result" value='<?php echo esc_attr($caf_empty_res); ?>'>

	</div>

	</div>

	</div>
 <!---- END EMPTY RESULT GROUP ---->
 <?php do_action("tc_caf_after_caf_empty_result_row");?>

	</div>
    </div>

	<!---- END POST ELEMENTS TOGGLE ---->
<?php do_action("tc_caf_after_caf_post_elements_tab");?>


	<!---- START POST LINK TOGGLE ---->

 <div class="tab-panel post-link">

	<div class="tab-header" data-content="post-link"><i class="fa fa-anchor left" aria-hidden="true"></i> <?php echo esc_html__('Post Link', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content post-link">

    <div class='app-tab-content' id="miscellaneous">
 <!-- START POST LINK PAGE GROUP ---->
	<div class="col-sm-12 row-bottom">

	<div class="form-group row">

    <label for="caf-link-target" class='col-sm-12 bold-span-title'><?php echo esc_html__('Post Link Target', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select link target when any user click on post.', 'category-ajax-filter'); ?>'</span></label>

    <div class="col-sm-12">

    <select class="form-control caf_import" data-import="caf_link_target" id="caf-link-target" name="caf-link-target">

	<option value="same_window" <?php if ($caf_link_target == 'same_window') {echo "selected";}?>><?php echo esc_html__('Same Tab', 'category-ajax-filter'); ?></option>
	<option value="new_window" <?php if ($caf_link_target == 'new_window') {echo "selected";}?>><?php echo esc_html__('New Tab', 'category-ajax-filter'); ?></option>
     <?php do_action('tc_caf_popup_option', $caf_link_target);?>
    </select>

	</div>

	</div>

	</div>
 <!---- END POST LINK GROUP ---->
<?php do_action("tc_caf_after_caf_post_link_row");?>
    </div>

    </div>

	</div>

    <!---- END POST LINK TOGGLE ---->
<?php do_action("tc_caf_after_caf_post_link_tab");?>

	<!---- START PAGINATION TOGGLE ---->

 <div class="tab-panel post-pagination">

	<div class="tab-header" data-content="post-pagination"><i class="fa fa-sort-numeric-asc left" aria-hidden="true"></i><?php echo esc_html__('Pagination', 'category-ajax-filter'); ?><i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content post-pagination">

	<div class='app-tab-content' id="app-extra">

	<!-- START POSTS PER PAGE GROUP ---->
	<div class="col-sm-12 pad-top-15 row-bottom">

	<div class="form-group row">

    <label for="caf-per-page" class='col-sm-12 bold-span-title'><?php echo esc_html__('Posts Per Page', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select Posts Per Page according your needs.use -1 for all posts.', 'category-ajax-filter'); ?></span></label>

    <div class="col-sm-8">

    <input type='text' class="form-control caf_import" data-import="caf_per_page" id="caf-per-page" name="caf-per-page" value='<?php echo esc_attr($caf_per_page); ?>'>

	</div>

	</div>

	</div>
 <!---- END POSTS PER PAGE GROUP ---->
  <?php do_action("tc_caf_after_caf_per_page_row");?>

  <div class='manage-page-type' id="manage-page-type">
 <!-- START PAGINATION TYPE PAGE GROUP ---->
	<div class="col-sm-12 p-type row-bottom">
	<div class="form-group row">
    <label for="caf-pagination-type" class='col-sm-12 bold-span-title'><?php echo esc_html__('Pagination Type', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select what type of pagination you want on frontend.', 'category-ajax-filter'); ?></span></label>

  <?php
$ptypes = apply_filters('tc_caf_pagi_type', array($caf_admin_fliters, 'tc_caf_pagi_type'));
?>

    <div class="col-sm-12">
    <select class="form-control caf_import" id="caf-pagination-type" name="caf-pagination-type" data-import='caf_pagination_type'>

     <?php
foreach ($ptypes as $key => $ptype) {
    if ($caf_pagi_type == $key) {$selected = 'selected';} else { $selected = '';}
    echo '<option value="' . $key . '" ' . $selected . '>' . esc_html($ptype) . '</option>';
}
?>
    </select>
	</div>
	</div>
	</div>
 <!---- END PAGINATION TYPE GROUP ---->
  <?php do_action("tc_caf_after_caf_pagi_type_row");?>
    </div>
</div>
    </div>
	</div>
    <!---- END PAGINATION TOGGLE ---->
<?php do_action("tc_caf_after_caf_post_pagi_tab");?>
    <!---- START POST ANIMATION TOGGLE ---->

	<div class="tab-panel post-animation">
	<div class="tab-header" data-content="post-animation"><i class="fa fa-life-ring left" aria-hidden="true"></i> <?php echo esc_html__('Post Animation', 'category-ajax-filter'); ?><i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content post-animation">
 <!-- START POST ANIMATION TYPE GROUP ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">
    <label for="caf-post-animation" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Post Animation', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Set Animation for posts.', 'category-ajax-filter'); ?></span></label>

    <div class="col-sm-12">
     <?php
$animations = apply_filters('tc_caf_post_animations', array($caf_admin_fliters, 'tc_caf_post_animations'));
?>
    <select class="form-control caf_import" data-import="caf_post_animation" id="caf-post-animation" name="caf-post-animation">
     <?php
foreach ($animations as $key => $animation) {
    if ($caf_post_animation == $key) {$selected = 'selected';} else { $selected = '';}

    if ($key == $animation) {
        echo "<optgroup label='" . $animation . "'>";
    } else if ($key == "optionend") {
        echo "</optgroup>";
    } else {
        echo '<option value="' . $key . '" ' . $selected . '>' . $animation . '</option>';
    }
}
?>


    </select>
	</div>
	</div>
	</div>
  <!-- END POST ANIMATION TYPE GROUP ---->
  <?php do_action("tc_caf_after_caf_post_animation_row");?>
	</div>
	</div>
	<!---- END POST ANIMATION TOGGLE ---->
  <?php do_action("tc_caf_after_caf_post_animation_tab");?>
</div>
</div>