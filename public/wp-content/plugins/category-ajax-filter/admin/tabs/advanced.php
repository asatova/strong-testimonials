<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="tab-pane tab-pad" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">

	<div class="manage-top-dash general-tab text"><?php echo esc_html__('Advanced', 'category-ajax-filter'); ?></div>

<div id="tabs-panel">
    <div class="tab-panel ad-post-class">

	<div class="tab-header" data-content="ad-post-class"><i class="fa fa-plus-circle left" aria-hidden="true"></i> <?php echo esc_html__('Add Extra Classes', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content ad-post-class">

	<!---- START FULL ROW SPECIAL CLASS ---->
	<div class='col-sm-12 row-bottom'>

	<!-- FORM GROUP -->

	<div class="form-group row">

    <label for="caf-special-post-class" class="col-sm-4 col-form-label"><?php echo esc_html__('Add Css Class', 'category-ajax-filter'); ?> <span><?php echo esc_html__('This class will add to every post of the results.', 'category-ajax-filter'); ?></span></label>

    <div class="col-sm-8">

    <input type='text' class="form-control" id="caf-special-post-class" name="caf-special-post-class" value='<?php echo esc_html__($caf_special_post_class, 'category-ajax-filter'); ?>'>

	</div>

	</div>

    <!-- FORM GROUP -->

    </div>
	<!---- END FULL ROW SPECIAL CLASS ---->
  <?php do_action("tc_caf_after_caf_post_class_row");?>
</div>

     <div class="tab-header" data-content="ad-security"><i class="fa fa-shield left" aria-hidden="true"></i> <?php echo esc_html__('Security', 'category-ajax-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>

     <div class="tab-content ad-security">

	<!---- START FULL ROW SECURITY ---->
	<div class='col-sm-12 row-bottom'>

	<!-- FORM GROUP -->

	<div class="form-group row">

    <label for="caf-special-security" class="col-sm-12 col-form-label"><?php echo esc_html__('Enable Nonce', 'category-ajax-filter'); ?> <br/><span><?php echo esc_html__('Now you can enable/disable nonce while performing ajax request on frontend.', 'category-ajax-filter'); ?></span></label>
    <div class="col-sm-12">
<select class="form-control caf_import" data-import="caf_special_security" id="caf-special-security" name="caf-special-security">
	<option value="enable" <?php if ($caf_special_security == 'enable') {echo "selected";}?>>Enable</option>
	<option value="disable" <?php if ($caf_special_security == 'disable') {echo "selected";}?>>Disable</option>
</select>
   	</div>
    </div>

    <!-- FORM GROUP -->

    </div>
	<!---- END FULL ROW SPECIAL CLASS ---->
  <?php do_action("tc_caf_after_caf_post_class_row");?>
</div>
</div>
 <?php do_action("tc_caf_after_caf_post_class_tab");?>

</div>

</div>