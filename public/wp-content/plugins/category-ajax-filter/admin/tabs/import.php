<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="tab-pane tab-pad" id="import" role="tabpanel" aria-labelledby="import-tab">
	<div class="manage-top-dash import-tab text"><?php echo esc_html__('Import', 'category-ajax-filter'); ?></div>
	<div id="tabs-panel">
	<!---- START QUERY OPTIONS TOGGLE ---->
	<div class="tab-panel import">
		<div class="tab-header active" data-content="import"><i class="fa fa-check-square-o left" aria-hidden="true"></i> <?php echo esc_html__('Import Layout', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>


		<div class="tab-content import active">
   <?php
if (class_exists('TC_CAF_PRO')) {
    do_action("tc_caf_in_import_tab");
} else {
    ?>
	<!---- START FULL ROW IMPORT ---->
	<div class='col-sm-12'>
	<!-- FORM GROUP -->
	<div class="form-group row">
    <label for="import-layout" class="col-sm-12 col-form-label"><?php echo esc_html__('Import Layout From Demo Site', 'category-ajax-filter'); ?><span class="info"><?php echo esc_html__('Directly paste the exported JSON code from Demo Site', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12">
   <textarea name="import-caf-layout" id="import-caf-layout" class="form-control" style="height:250px"></textarea>
		<input type="button" name="import-layout" id="import-layout-button" value="<?php echo esc_html__('Import', 'category-ajax-filter'); ?>" class="form-control">
	</div>

	</div>
    <!-- FORM GROUP -->
    </div>
	<!---- END FULL ROW IMPORT ---->
   <?php
}
?>
   <?php do_action("tc_caf_after_caf_import_row");?>
	</div>
	</div>
	<!---- END QUERY OPTIONS TOGGLE ---->
<?php do_action("tc_caf_after_caf_import_tab");?>
	</div>

	</div>