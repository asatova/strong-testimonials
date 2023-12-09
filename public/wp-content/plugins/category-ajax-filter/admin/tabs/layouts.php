<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="tab-pane" id="layoutstab" role="tabpanel" aria-labelledby="layouts-tab">
	<div class="manage-top-dash general-tab text"> <?php echo esc_html__('Layouts', 'category-ajax-filter'); ?></div>
	<div id="tabs-panel">

	<div class="tab-panel filter-layout">

	<div class="tab-header" data-content="filter-layout"><i class="fa fa-filter left" aria-hidden="true"></i> <?php echo esc_html__('Filter Layout', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content filter-layout">

    <!---- START LAYOUT TAB DATA ---->

	<div class='app-tab-content active' id="app-layout">

		<!---- START ENABLE/DISABLE FILTER FORM GROUP ROW ---->

	<div class="col-sm-12 row-bottom">

	<div class="form-group row">

    <label for="caf-filter-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Enable/Disable Filter', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Enable/Disable filter according to your needs.', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12 filter-en">

    <input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" id="enable-disable-filter" name="filter_status"  class="checkstate tc_caf_object_field tc_caf_checkbox" data-field-type='checkbox' data-name="caf-filter-status" <?php if ($caf_filter_status == "on") {echo "checked";} else {echo "";}?>>
    <input class="tc_caf_object_field tc_caf_text caf_import" data-import='caf_filter_status' data-field-type='text' type="hidden" name='caf-filter-status' id='caf-filter-status' value='<?php echo esc_attr($caf_filter_status); ?>'>
	</div>
	</div>
	</div>
	<!---- END ENABLE/DISABLE FILTER FORM GROUP ROW ---->
<?php do_action("tc_caf_after_caf_filter_enable_row");?>
	<?php

if ($caf_filter_status == 'on') {$caf_hide = '';} else { $caf_hide = 'caf-hide';}?>

	<div class='manage-filters <?php echo esc_attr($caf_hide); ?>'>


	<!---- START CATEGORY FILTER FORM GROUP ROW ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">
    <label for="caf-filter-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Your Category Filter Design', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select design layout of filter.', 'category-ajax-filter'); ?></span></label>
	<?php
$flayouts = apply_filters('tc_caf_filter_layouts', array($caf_admin_fliters, 'tc_caf_filter_layouts'));
?>

    <div class="col-sm-12">
    <select class="form-control tc_caf_object_field tc_caf_select caf_import" data-import="caf_filter_layout" data-field-type='select' id="caf-filter-layout" name="caf-filter-layout">
		<?php
foreach ($flayouts as $key => $layout) {
    if ($caf_filter_layout == $key) {$selected = 'selected';} else { $selected = '';}
    if ($key == "0") {
        echo '<optgroup label="' . $layout . '">';
    } else if ($key == "1") {
        echo "</optgroup>";
        echo '<optgroup label="' . $layout . '">';
    } else if ($key == "2") {
        echo "</optgroup>";
        echo '<optgroup label="' . $layout . '">';
    } else if ($key == "3") {
        echo "</optgroup>";
    } else {
        echo '<option value="' . $key . '" ' . $selected . '>' . esc_attr($layout) . '</option>';
    }
}
?>


    </select>
	</div>
	</div>
	</div>
	<!---- END CATEGORY FILTER FORM GROUP ROW ---->
 <?php do_action("tc_caf_under_manage_filters_row");?>
	<?php do_action("tc_caf_after_caf_filter_layout_row");?>


	<!---- START FILTER COLOR COMBINATION ---->

	<div class="col-sm-12 row-bottom filter-color-combo">
	<div class="form-group row">
    <label for="caf-filter-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Filter Color Combination', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select Primary/Secondary color for filter layout.', 'category-ajax-filter'); ?>
<!--		<a href='#' class='filter-reset'><?php echo esc_html__('Reset', 'category-ajax-filter'); ?></a>-->
		</span></label>

    <div class="col-sm-4 filter-primary-color">
    <span class='label-title'><?php echo esc_html__('Primary Color', 'category-ajax-filter'); ?></span><br/>
	<input type="text" value="<?php echo esc_attr($caf_filter_primary_color); ?>" class="caf_import my-color-field" name='caf-filter-primary-color' data-default-color="#f79918" data-import='caf_filter_primary_color'/>
	</div>

	<div class="col-sm-4 filter-sec-color">
    <span class='label-title'><?php echo esc_html__('Secondary Color', 'category-ajax-filter'); ?></span><br/>
	<input type="text" value="<?php echo esc_attr($caf_filter_sec_color); ?>" class="caf_import my-color-field" name='caf-filter-sec-color' data-default-color="#ffffff" data-import='caf_filter_sec_color'/>
	</div>

	<div class="col-sm-4 filter-sec-color2">
    <span class='label-title'><?php echo esc_html__('Secondary Color 2', 'category-ajax-filter'); ?></span><br/>
	<input type="text" value="<?php echo esc_attr($caf_filter_sec_color2); ?>" class="caf_import my-color-field" name='caf-filter-sec-color2' data-default-color="#ffffff" data-import='caf_filter_sec_color2'/>
	</div>

	</div>
	</div>
  <!---- END FILTER COLOR COMBINATION ---->
  <?php do_action("tc_caf_after_caf_filter_color_row");?>

  </div>
  <!---- END MANAGE FILTER DIV ---->


		 </div>
	</div>

	</div>
	<!---- END FILTER LAYOUT TOGGLE ---->
<?php do_action("tc_caf_after_caf_filter_layout_tab");?>
	<!---- START POST LAYOUT TOGGLE ---->

	<div class="tab-panel post-layout">

	<div class="tab-header" data-content="post-layout"><i class="fa fa-th-large left" aria-hidden="true"></i> <?php echo esc_html__('Post Layout', 'category-ajax-filter'); ?><i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content post-layout">

	<div class="col-sm-12 row-bottom">

	<div class="form-group row">

    <label for="caf-post-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Your Post Layout Design', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select Design Layout for Post/Blog.', 'category-ajax-filter'); ?></span></label>
    <?php
$playouts = apply_filters('tc_caf_post_layouts', array($caf_admin_fliters, 'tc_caf_post_layouts'));
?>
    <div class="col-sm-12">

    <select class="form-control tc_caf_object_field tc_caf_select caf_import" data-import="caf_post_layout" data-field-type='select' id="caf-post-layout" name="caf-post-layout">

	<?php
foreach ($playouts as $key => $layout) {
    if ($caf_post_layout == $key) {$selected = 'selected';} else { $selected = '';}
    echo '<option value="' . $key . '" ' . $selected . '>' . esc_attr($layout) . '</option>';
}
?>
 </select>
	</div>
	</div>
	</div>
	<!---- END POST LAYOUT FORM GROUP ROW ---->
<?php do_action("tc_caf_after_caf_post_layout_row");?>
 	<!---- START COLUMN LAYOUT GROUP ROW ---->
	<div class="col-sm-12 clm-layout row-bottom">
	<div class="form-group row">
    <label for="caf-post-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Column Layout', 'category-ajax-filter'); ?> <span class='info'><?php echo esc_html__('Select column layout of posts for different screens.', 'category-ajax-filter'); ?></span></label>
    <div class="row without-margin">
		<div class="input-group col-sm">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-desktop"></i></span>
  </div>
  <input type="number" class="form-control tc_caf_object_field tc_caf_text caf_import" data-import="caf_desktop_large_col" data-field-type='text' placeholder="1" aria-label="Username" aria-describedby="basic-addon1" min='1' max="4" name="caf_desktop_large_col" value=<?php echo esc_attr($caf_col_opt['caf_col_desktop_large']); ?>>
</div>



  <div class="input-group col-sm">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-desktop"></i></span>
  </div>
  <input type="number" class="form-control tc_caf_object_field tc_caf_text caf_import" data-import="caf_desktop_col" data-field-type='text' placeholder="1" aria-label="Username" aria-describedby="basic-addon1" min='1' max="4" name="caf_desktop_col" value=<?php echo esc_attr($caf_col_opt['caf_col_desktop']); ?>>

</div>


		<div class="input-group col-sm">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-tablet"></i></span>
  </div>
  <input type="number" class="form-control tc_caf_object_field tc_caf_select caf_import" data-import="caf_tablet_col" data-field-type='text'  placeholder="1" aria-label="Username" aria-describedby="basic-addon1" min='1' max="4" name="caf_tablet_col" value=<?php echo esc_attr($caf_col_opt['caf_col_tablet']); ?>>

</div>


		<div class="input-group col-sm">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile"></i></span>
  </div>
  <input type="number" class="form-control tc_caf_object_field tc_caf_select caf_import" data-import="caf_mobile_col" data-field-type='text'  placeholder="1" aria-label="Username" aria-describedby="basic-addon1" min='1' max="4" name="caf_mobile_col" value=<?php echo esc_attr($caf_col_opt['caf_col_mobile']); ?>>
</div>
	</div>
	</div>
	</div>
	<!---- END COLUMN LAYOUT GROUP ROW ---->
<?php do_action("tc_caf_after_caf_colm_layout_row");?>
	<!---- START POST COLOR COMBINATION ---->
	<div class="col-sm-12 row-bottom post-color-combo">
	<div class="form-group row">
    <label for="caf-post-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Post Color Combination', 'category-ajax-filter'); ?><span class='info'><?php echo esc_html__('Select Primary/Secondary color for Post layout.', 'category-ajax-filter'); ?><?php /*?><a href='#' class='post-reset'><?php echo esc_html__('Reset','category-ajax-filter');?></a><?php */?></span></label>

	<div class="col-sm-4 post-primary-color">
    <span class='label-title'><?php echo esc_html__('Primary Color', 'category-ajax-filter'); ?></span><br/>
	<input type="text" value="<?php echo esc_attr($caf_post_primary_color); ?>" class="my-color-field caf_import" data-import="caf_post_primary_color" name='caf-post-primary-color' data-default-color="#f79918" />
	</div>

	<div class="col-sm-4 post-sec-color">
    <span class='label-title'><?php echo esc_html__('Secondary Color', 'category-ajax-filter'); ?></span><br/>
	<input type="text" value="<?php echo esc_attr($caf_post_sec_color); ?>" class="my-color-field caf_import" data-import="caf_post_sec_color" name='caf-post-sec-color' data-default-color="#ffffff" />
	</div>

	<div class="col-sm-4 post-sec-color2">
    <span class='label-title'><?php echo esc_html__('Secondary Color 2', 'category-ajax-filter'); ?></span><br/>
	<input type="text" value="<?php echo esc_attr($caf_post_sec_color2); ?>" class="my-color-field caf_import" data-import="caf_post_sec_color2" name='caf-post-sec-color2' data-default-color="#ffffff" />
	</div>

	</div>
	</div>
	<!---- END POST COLOR COMBINATION ---->
  <?php do_action("tc_caf_after_caf_post_color_row");?>
	</div>
	</div>

	<!---- END POST LAYOUT TOGGLE ---->
<?php do_action("tc_caf_after_caf_post_layout_tab");?>
	<!---- START POST ELEMENTS TOGGLE ---->

 </div>
</div>