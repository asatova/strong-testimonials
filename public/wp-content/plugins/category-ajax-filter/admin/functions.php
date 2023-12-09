<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class CAF_init
{
    const post_type = 'caf_posts';
    public function __construct()
    {
        add_action('init', array($this, 'register_caf_post_type'), 0);
    }

    public function register_caf_post_type()
    {
        register_post_type(self::post_type, array(
            'labels' => array(
                'name' => __('Category Filter', 'catgeory-filter'),
                'singular_name' => __('Category Filter', 'category-filter'),
            ),
            'public' => false,
            'hierarchical' => false,
            'exclude_from_search' => true,
            'show_ui' => current_user_can('manage_options') ? true : false,
            'show_in_admin_bar' => false,
            'menu_position' => 7,
            //'menu_icon'     => TC_CAF_URL.'admin/images/tp icon CAF.svg',
            'menu_icon' => 'dashicons-layout',
            'rewrite' => false,
            'query_var' => false,
            'supports' => array(
                'title',
            ),
        ));
    }
}

class CAF_Embed_Admin_Css_Js
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'tc_caf_embedCssJs'));
    }
    public function tc_caf_embedCssJs()
    {
        global $post_type;
        //var_dump($post_type);
        wp_enqueue_style('tc_caf-custom-admin-font-style', TC_CAF_URL . 'admin/css/custom-font.css');
        if ($post_type == "caf_posts") {
         wp_enqueue_style('tc_caf-custom-admin-style', TC_CAF_URL . 'admin/css/custom.min.css');
        wp_enqueue_style('tc_caf-font-awesome-style', TC_CAF_URL . 'assets/css/fontawesome/css/font-awesome.min.css');
        wp_enqueue_style('tc_caf-bootstrap-toggle-style', TC_CAF_URL . 'admin/css/bootstrap-toggle.css');
        wp_enqueue_script('tc-caf-bootstrap-toggle-script', TC_CAF_URL . 'admin/js/bootstrap-toggle.js', array('jquery'));
            wp_enqueue_script('tc_caf-script', TC_CAF_URL . 'assets/bootstrap-4.5.3-dist/js/bootstrap.min.js', array('jquery'));
            wp_enqueue_style('tc_caf-bootstrap-admin-style', TC_CAF_URL . 'assets/bootstrap-4.5.3-dist/css/bootstrap.min.css');
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_script('tc-caf-script', TC_CAF_URL . 'admin/js/custom.js', array('jquery'));
            //wp_enqueue_style( 'wp-color-picker' );
            wp_localize_script('tc-caf-script', 'tc_caf_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('tc_caf_ajax_nonce')));
        }
    }
}

class CAF_Meta_Boxes
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_post_metabox'));
        add_action('save_post', array($this, 'wpdocs_save_meta_box'), 10, 2);
    }

    public function wpdocs_save_meta_box($post_id, $post)
    {
        /* Verify the nonce before proceeding. */

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!current_user_can('edit_posts', $post_id)) {
            return $post_id;
        }

        if (!isset($_POST['caf_post_meta_option']) || !wp_verify_nonce($_POST['caf_post_meta_option'], basename(__FILE__))) {
            return $post_id;
        }

        /* Get the posted data and sanitize it for use on frontend. */
        if (isset($_POST['custom-post-type-select'])) {
            $cpt_val = sanitize_text_field($_POST['custom-post-type-select']);
            update_post_meta($post_id, 'caf_cpt_value', $cpt_val);
        }

        if (isset($_POST['caf-taxonomy'])) {
            $tax_val = sanitize_text_field($_POST['caf-taxonomy']);
            update_post_meta($post_id, 'caf_taxonomy', $tax_val);
        }
        if (isset($_POST['category-list'])) {
            $terms = sanitize_html_class($_POST['category-list']);

            update_post_meta($post_id, 'caf_terms', $terms);
        }
        if (isset($_POST['caf-sec-bg-color'])) {
            $caf_sec_bg_color = sanitize_text_field($_POST['caf-sec-bg-color']);
            update_post_meta($post_id, 'caf_sec_bg_color', $caf_sec_bg_color);
        }
        if (isset($_POST['caf-filter-status'])) {
            $filter_status = sanitize_text_field($_POST['caf-filter-status']);
            update_post_meta($post_id, 'caf_filter_status', $filter_status);
        }
        if (isset($_POST['caf-filter-layout'])) {
            $filter_layout = sanitize_text_field($_POST['caf-filter-layout']);
            update_post_meta($post_id, 'caf_filter_layout', $filter_layout);
        }
        if (isset($_POST['caf-filter-primary-color'])) {
            $caf_filter_primary_color = sanitize_text_field($_POST['caf-filter-primary-color']);
            update_post_meta($post_id, 'caf_filter_primary_color', $caf_filter_primary_color);
        }
        if (isset($_POST['caf-filter-sec-color'])) {
            $caf_filter_sec_color = sanitize_text_field($_POST['caf-filter-sec-color']);
            update_post_meta($post_id, 'caf_filter_sec_color', $caf_filter_sec_color);
        }
        if (isset($_POST['caf-filter-sec-color2'])) {
            $caf_filter_sec_color2 = sanitize_text_field($_POST['caf-filter-sec-color2']);
            update_post_meta($post_id, 'caf_filter_sec_color2', $caf_filter_sec_color2);
        }
        if (isset($_POST['caf-post-layout'])) {
            $post_layout = sanitize_text_field($_POST['caf-post-layout']);
            update_post_meta($post_id, 'caf_post_layout', $post_layout);
        }
        if (isset($_POST["caf_desktop_col"]) || isset($_POST["caf_tablet_col"]) || isset($_POST["caf_mobile_col"])) {
            $desktop_large = "3";
            $desktop = "3";
            $tablet = "2";
            $mobile = "1";
            $desktop_large = sanitize_text_field($_POST["caf_desktop_large_col"]);
            $desktop = sanitize_text_field($_POST["caf_desktop_col"]);
            $tablet = sanitize_text_field($_POST["caf_tablet_col"]);
            $mobile = sanitize_text_field($_POST["caf_mobile_col"]);
            $caf_col_opt = array("caf_col_desktop_large" => $desktop_large, "caf_col_desktop" => $desktop, "caf_col_tablet" => $tablet, "caf_col_mobile" => $mobile);
            update_post_meta($post_id, 'caf_col_opt', $caf_col_opt);
        }
        if (isset($_POST['caf-post-primary-color'])) {
            $caf_post_primary_color = sanitize_text_field($_POST['caf-post-primary-color']);
            update_post_meta($post_id, 'caf_post_primary_color', $caf_post_primary_color);
        }
        if (isset($_POST['caf-post-sec-color'])) {
            $caf_post_sec_color = sanitize_text_field($_POST['caf-post-sec-color']);
            update_post_meta($post_id, 'caf_post_sec_color', $caf_post_sec_color);
        }
        if (isset($_POST['caf-post-sec-color2'])) {
            $caf_post_sec_color2 = sanitize_text_field($_POST['caf-post-sec-color2']);
            update_post_meta($post_id, 'caf_post_sec_color2', $caf_post_sec_color2);
        }
        if (isset($_POST['caf-post-image-size'])) {
            $caf_image_size = sanitize_text_field($_POST['caf-post-image-size']);
            update_post_meta($post_id, 'caf_image_size', $caf_image_size);
        }
        if (isset($_POST['caf-post-animation'])) {
            $caf_post_animation = sanitize_text_field($_POST['caf-post-animation']);
            update_post_meta($post_id, 'caf_post_animation', $caf_post_animation);
        }
        if (isset($_POST['caf-empty-result'])) {
            $caf_empty_res = sanitize_text_field($_POST['caf-empty-result']);
            update_post_meta($post_id, 'caf_empty_res', $caf_empty_res);
        }
        if (isset($_POST['caf-link-target'])) {
            $caf_link_target = sanitize_text_field($_POST['caf-link-target']);
            update_post_meta($post_id, 'caf_link_target', $caf_link_target);
        }
        if (isset($_POST['caf-per-page'])) {
            $caf_per_page = sanitize_text_field($_POST['caf-per-page']);
            update_post_meta($post_id, 'caf_per_page', $caf_per_page);
        }
        if (isset($_POST['caf-pagination-type'])) {
            $caf_pagi_type = sanitize_text_field($_POST['caf-pagination-type']);
            update_post_meta($post_id, 'caf_pagination_type', $caf_pagi_type);
        }
        if (isset($_POST['caf-filter-font'])) {
            $caf_filter_font = sanitize_text_field($_POST['caf-filter-font']);
            update_post_meta($post_id, 'caf_filter_font', $caf_filter_font);
        }
        if (isset($_POST['caf-filter-transform'])) {
            $caf_filter_transform = sanitize_text_field($_POST['caf-filter-transform']);
            update_post_meta($post_id, 'caf_filter_transform', $caf_filter_transform);
        }
        if (isset($_POST['caf-filter-font-size'])) {
            $caf_filter_font_size = sanitize_text_field($_POST['caf-filter-font-size']);
            update_post_meta($post_id, 'caf_filter_font_size', $caf_filter_font_size);
        }
        if (isset($_POST['caf-post-font'])) {
            $caf_post_font = sanitize_text_field($_POST['caf-post-font']);
            update_post_meta($post_id, 'caf_post_font', $caf_post_font);
        }
        if (isset($_POST['caf-post-title-transform'])) {
            $caf_post_title_transform = sanitize_text_field($_POST['caf-post-title-transform']);
            update_post_meta($post_id, 'caf_post_title_transform', $caf_post_title_transform);
        }
        if (isset($_POST['caf-post-title-font-size'])) {
            $caf_post_title_font_size = sanitize_text_field($_POST['caf-post-title-font-size']);
            update_post_meta($post_id, 'caf_post_title_font_size', $caf_post_title_font_size);
        }
        if (isset($_POST['caf-post-title-font-color'])) {
            $caf_post_title_font_color = sanitize_text_field($_POST['caf-post-title-font-color']);
            update_post_meta($post_id, 'caf_post_title_font_color', $caf_post_title_font_color);
        }
        if (isset($_POST['caf-special-post-class'])) {
            $caf_special_post_class = sanitize_text_field($_POST['caf-special-post-class']);
            update_post_meta($post_id, 'caf_special_post_class', $caf_special_post_class);
        }
        if (isset($_POST['caf-special-security'])) {
            $caf_special_security = sanitize_text_field($_POST['caf-special-security']);
            update_post_meta($post_id, 'caf_special_security', $caf_special_security);
        }
    }

    public function add_post_metabox()
    {
        add_meta_box('caf_top_meta_box', __('Settings', 'category-ajax-filter'), array($this, 'caf_top_meta_box'), 'caf_posts', 'normal', 'core' /*,array()*/);
        if (class_exists('TC_CAF_PRO')) {
            add_meta_box('caf_side_meta_box_pro', __('CAF Announcements', 'category-ajax-filter'), 'caf_side_meta_box_pro', 'caf_posts', 'side', 'core' /*,array()*/);
        } else {
            add_meta_box('caf_side_meta_box', __('CAF Pro Features', 'category-ajax-filter'), array($this, 'caf_side_meta_box'), 'caf_posts', 'side', 'core' /*,array()*/);
        }
    }

    public function caf_top_meta_box()
    {
        global $post;
        $cl='free';
        if (class_exists("TC_CAF_PRO")) {
            if (get_post_meta($post->ID, 'caf_enhance',true)==1) {
            $cl='enhanced';
            }
        }
        ?>
<div class="manage-top-logo-helper">
<div class="logo-helper">
 <?php
if (class_exists("TC_CAF_PRO")) {
            ?>
   <img src="<?php echo TC_CAF_PRO_URL; ?>/admin/images/full-logo.png">
 <?php
} else {
            ?>
 <img src="<?php echo TC_CAF_URL; ?>/admin/images/full-logo.png">
 <?php
}
        ?>
 </div>
	<div class="manage-top-dash general-tab new-tab"><span class="dashicons dashicons-admin-tools"></span><span class='text'>
		<?php echo esc_html__('General Settings', 'category-ajax-filter'); ?></span> <a href='<?php echo esc_url('https://trustyplugins.com', 'category-ajax-filter'); ?>' target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo esc_html__('Documentation', 'category-ajax-filter'); ?> </a></div></div>
	<div id="maintain-sidebar" class="<?php echo $cl;?>">

	  <!-- Nav tabs -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item general-caf-li" role="presentation">
		<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general-tab" aria-selected="true"><?php echo esc_html__('General', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Post Type, Categories', 'category-ajax-filter'); ?> </span><span class="dashicons dashicons-admin-tools"></span></a>
	  </li>
   <li class="nav-item layout-caf-li" role="presentation">
		<a class="nav-link" id="layouts-tab" data-toggle="tab" href="#layoutstab" role="tab" aria-controls="layouts-tab" aria-selected="false"><?php echo esc_html__('Layouts', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Post Layout, Filter Layout', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-grid-view"></span></a>
	  </li>
	  <li class="nav-item app-caf-li" role="presentation">
		<a class="nav-link" id="appearance-tab" data-toggle="tab" href="#appearance" role="tab" aria-controls="appearance-tab" aria-selected="false"><?php echo esc_html__('Appearance', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Post Layout, Filter Layout', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-visibility"></span></a>
	  </li>
	  <li class="nav-item typo-caf-li" role="presentation">
		<a class="nav-link" id="typography-tab" data-toggle="tab" href="#typography" role="tab" aria-controls="typography-tab" aria-selected="false"><?php echo esc_html__('Typography', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Title, Description Fonts', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-editor-spellcheck"></span></a>
	  </li>
	  <li class="nav-item adv-caf-li" role="presentation">
		<a class="nav-link" id="advanced-tab" data-toggle="tab" href="#advanced" role="tab" aria-controls="advanced-tab" aria-selected="false"><?php echo esc_html__('Advanced', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Add Extra Classes to Post', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-tag"></span></a>
	  </li>
		<li class="nav-item short-caf-li" role="presentation">
		<a class="nav-link" id="shortcode-tab" data-toggle="tab" href="#shortcode" role="tab" aria-controls="shortcode-tab" aria-selected="false"><?php echo esc_html__('Shortcode', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Get Your shortcode', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-shortcode"></span></a>
	  </li>
		<li class="nav-item imp-caf-li" role="presentation">
		<a class="nav-link" id="import-tab" data-toggle="tab" href="#import" role="tab" aria-controls="import-tab" aria-selected="false"><?php echo esc_html__('Import Layout', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Import Layout from Demo Site', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-controls-repeat"></span></a>
	  </li>
  <?php
if (class_exists('TC_CAF_PRO')) {
            ?>
  	<li class="nav-item" role="presentation">
		<a class="nav-link" id="perform-tab" data-toggle="tab" href="#perform" role="tab" aria-controls="perform-tab" aria-selected="false"><?php echo esc_html__('Analytics', 'category-ajax-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Check your filter analytics', 'category-ajax-filter'); ?></span><span class="dashicons dashicons-controls-repeat"></span></a>
	  </li>
  <?php
}
        ?>
	</ul>
	</div>
	<!-- Tab panes -->
	<div class="tab-content caf_top_meta_box caf-tab-content <?php echo $cl;?>">
		<?php
$caf_admin_fliters = new CAF_admin_filters();
        wp_nonce_field(basename(__FILE__), 'caf_post_meta_option');
        include_once TC_CAF_PATH . 'admin/tabs/variables.php';
        ?>
		<!-- START GENERAL SETTINGS TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/general.php';
        ?>
		<!-- END GENERAL SETTINGS TAB DATA -->
  <!-- START GENERAL SETTINGS TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/layouts.php';
        ?>
		<!-- END GENERAL SETTINGS TAB DATA -->

		<!-- START APPEARANCE SETTINGS TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/appearance.php';
        ?>
		<!-- END APPEARANCE SETTINGS TAB DATA -->
		<!-- START APPEARANCE SETTINGS TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/typography.php';
        ?>
		<!-- END APPEARANCE SETTINGS TAB DATA -->
		<!-- START ADVANCED SETTINGS TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/advanced.php';
        ?>
		<!-- END ADVANCED SETTINGS TAB DATA -->
		<!-- START SHORTCODE TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/shortcode.php';
        ?>
		<!-- END SHORTCODE TAB DATA -->
		<!-- START SHORTCODE TAB DATA -->
		<?php
include_once TC_CAF_PATH . 'admin/tabs/import.php';
        ?>
  <?php
if (class_exists('TC_CAF_PRO')) {
            include_once TC_CAF_PRO_PATH . 'admin/tabs/analytics.php';
        }
        ?>
		<!-- END SHORTCODE TAB DATA -->
	</div>
		<?php
}

    public function caf_side_meta_box()
    {
        ?>
<ul class='caf-pro-features'>
 <li><?php echo esc_html__('1. Multiple Taxonomy Selection/Filter', 'category-ajax-filter'); ?> <a href='https://caf.trustyplugins.com/multiple-taxonomy-filter/' style='color:#fff;text-decoration:underline;' target='_blank'>Demo</a>.</li>
 <li><?php echo esc_html__('2. Multiple Taxonomy Dropdown/Filter', 'category-ajax-filter') ?> <a href='https://caf.trustyplugins.com/multiple-taxonomy-dropdown-filter/' style='color:#fff;text-decoration:underline;' target='_blank'>Demo</a>.</li>
 <li><?php echo esc_html__('3. Select Default Category on first Page load.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__("4. Overwrite Layout in Your theme's folder.", "category-ajax-filter"); ?></li>
 <li><?php echo esc_html__('5. 10 More Post Layouts.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('6. Multiple Checkbox Filter Layout.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('7. Support Multiple Section on same page.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('8. Sort Posts Settings.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('9. Load More Posts added in Pagination.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('10. Google Fonts List Added.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('11. More Filter/Action Hooks for developers.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('12. 1 On Demand Layout For new user.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('13. Translation Settings for Default Strings.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('14. 50+ Post Animation effects Added.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('15. New Tabs Filter Layout Added.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('16. Scroll to top of filter after pagination click.', 'category-ajax-filter'); ?></li>
 <li><?php echo esc_html__('17. Search Field added to search through posts.', 'category-ajax-filter'); ?></li>
 <li class="button"><a href="https://trustyplugins.com" target="_blank"><span class="dashicons dashicons-visibility"></span><?php echo esc_html__('View Demo', 'category-ajax-filter'); ?></a><a href="https://trustyplugins.com" target="_blank"><span class="dashicons dashicons-download"></span><?php echo esc_html__('Buy Now', 'category-ajax-filter'); ?></a></li>
</ul>
<?php
}

}

class CAF_load_scripts
{
    public function __construct()
    {
        // the_posts gets triggered before wp_head
        // Enqueue Scripts before load
        add_filter('the_posts', array($this, 'conditionally_add_scripts_and_styles'));
        add_action('wp_enqueue_scripts', array($this, 'tc_caf_enqueue_scripts'));
    }
    public function conditionally_add_scripts_and_styles($posts)
    {
        //var_dump($posts);
        if (empty($posts)) {
            return $posts;
        }

        $shortcode_found = false; // use this flag to see if styles and scripts need to be enqueued
        $short_id = array();
        foreach ($posts as $post) {
            //var_dump($post->post_content);
            //echo stripos($post->post_content,'[caf_filter');
            //$html = str_get_html($post->post_content);
            if (stripos($post->post_content, '[caf_filter') !== false) {
                //echo "yes";
                $str = get_string_between($post->post_content, "[caf_filter id=", "]");
                if ($str) {
                    if (strpos($str, "'") !== false) {

                        $short_ids = trim(str_replace("'", '', $str));
                    }
                }
                if ($str) {
                    if (strpos($str, '"') !== false) {
                        $short_ids = trim(str_replace('"', '', $str));
                    }
                }
                $short_id[] = $short_ids;
                $shortcode_found = true; // bingo!
                break;
            }
        }

        if ($shortcode_found) {
            $caf_post_layout = 'post-layout1';
            $caf_filter_layout = 'filter-layout1';
            foreach ($short_id as $id) {
                if (get_post_meta($id, 'caf_post_layout')) {
                    $caf_post_layout = get_post_meta($id, 'caf_post_layout', true);
                }
                if (get_post_meta($id, 'caf_filter_layout')) {
                    $caf_filter_layout = get_post_meta($id, 'caf_filter_layout', true);
                }
                wp_enqueue_style('tc-caf-common-style', TC_CAF_URL . 'assets/css/common/common.min.css', '', TC_CAF_PLUGIN_VERSION);
                wp_enqueue_style('tc-caf-' . $caf_post_layout, TC_CAF_URL . 'assets/css/post/"' . $caf_post_layout . '".min.css', '', TC_CAF_PLUGIN_VERSION);
                wp_enqueue_style('tc-caf-' . $caf_filter_layout, TC_CAF_URL . 'assets/css/filter/"' . $caf_filter_layout . '".min.css', '', TC_CAF_PLUGIN_VERSION);
            }
            $b = 1;
            $handle = "tc-caf-dynamic-style-" . $caf_filter_layout;
            wp_enqueue_style($handle, TC_CAF_URL . 'assets/css/dynamic-styles.css', '', TC_CAF_PLUGIN_VERSION);
            setDynamicFilterCssFree($id, $handle, $caf_filter_layout, $b, 'conditional');
            setDynamicFilterCssFree($id, $handle, $caf_post_layout, $b, 'conditional');
            wp_enqueue_style('tc-caf-font-awesome-style', TC_CAF_URL . 'assets/css/fontawesome/css/font-awesome.min.css', '', TC_CAF_PLUGIN_VERSION, 'all');
            wp_enqueue_script('jquery');
            wp_enqueue_script('tc-caf-frontend-scripts', TC_CAF_URL . 'assets/js/script.min.js', array('jquery'), TC_CAF_PLUGIN_VERSION);
        }
        return $posts;
    }
    public function tc_caf_enqueue_scripts()
    {
        wp_register_script('tc-caf-frontend-scripts', TC_CAF_URL . 'assets/js/script.min.js', array('jquery'), TC_CAF_PLUGIN_VERSION);
        wp_localize_script('tc-caf-frontend-scripts', 'tc_caf_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('tc_caf_ajax_nonce'), 'plugin_path' => TC_CAF_URL));
        wp_register_style('tc-caf-filter-layout1', TC_CAF_URL . 'assets/css/filter/filter-layout1.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-filter-layout2', TC_CAF_URL . 'assets/css/filter/filter-layout2.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-filter-layout3', TC_CAF_URL . 'assets/css/filter/filter-layout3.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-post-layout1', TC_CAF_URL . 'assets/css/post/post-layout1.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-post-layout2', TC_CAF_URL . 'assets/css/post/post-layout2.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-post-layout3', TC_CAF_URL . 'assets/css/post/post-layout3.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-post-layout4', TC_CAF_URL . 'assets/css/post/post-layout4.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-common-style', TC_CAF_URL . 'assets/css/common/common.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
        wp_register_style('tc-caf-font-awesome-style', TC_CAF_URL . 'assets/css/fontawesome/css/font-awesome.min.css', array(), TC_CAF_PLUGIN_VERSION, 'all');
    }
}

class CAF_shortcode
{
    public function __construct()
    {
        $this->shortcodes_init();
    }
    public function shortcodes_init()
    {
        include TC_CAF_PATH . 'includes/functions.php';
        new CAF_shortcode_render();
    }
}

class CAF_admin_filters
{
    public function __construct()
    {
        add_filter('tc_caf_font_family', array($this, 'tc_caf_font_family'), 5, 1);
        add_filter('tc_caf_filter_layouts', array($this, 'tc_caf_filter_layouts'), 5, 1);
        add_filter('tc_caf_post_layouts', array($this, 'tc_caf_post_layouts'), 5, 1);
        add_filter('tc_caf_pagi_type', array($this, 'tc_caf_pagi_type'), 5, 1);
        add_filter('tc_caf_post_animations', array($this, 'tc_caf_post_animations'), 5, 1);
    }
    public function tc_caf_font_family($fonts)
    {
        $fonts = array('OpenSans', 'Roboto Condensed', 'Playfair Display', 'Patua One', 'Jolly Lodger', 'Raleway');
        return $fonts;
    }
    public function tc_caf_filter_layouts($layouts)
    {
        $layouts = array("filter-layout1" => 'Default Filter', "filter-layout2" => 'Dropdown Filter', "filter-layout3" => 'Sidebar Filter');
        return $layouts;
    }
    public function tc_caf_post_layouts($layouts)
    {
        $layouts = array("post-layout1" => 'Simple Blogs', "post-layout2" => 'Boxed Title', "post-layout3" => 'Glossy look', "post-layout4" => 'Simple Full Width');
        return $layouts;
    }
    public function tc_caf_post_animations($animations)
    {
        $animations = array("animate-off" => 'off', "caf-animate-skew1" => "Skew Right");
        return $animations;
    }
    public function tc_caf_pagi_type($ptype)
    {
        $ptype = array("number" => 'number');
        return $ptype;
    }
}

function caf_get_image_sizes($size = '')
{
    $wp_additional_image_sizes = wp_get_additional_image_sizes();
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
    // Create the full array with sizes and crop info
    foreach ($get_intermediate_image_sizes as $_size) {
        if (in_array($_size, array('thumbnail', 'medium', 'large'))) {
            $sizes[$_size]['width'] = get_option($_size . '_size_w');
            $sizes[$_size]['height'] = get_option($_size . '_size_h');
            $sizes[$_size]['crop'] = (bool) get_option($_size . '_crop');
        } elseif (isset($wp_additional_image_sizes[$_size])) {
            $sizes[$_size] = array(
                'width' => $wp_additional_image_sizes[$_size]['width'],
                'height' => $wp_additional_image_sizes[$_size]['height'],
                'crop' => $wp_additional_image_sizes[$_size]['crop'],
            );
        }
    }
    // Get only 1 size if found
    if ($size) {
        if (isset($sizes[$size])) {
            return $sizes[$size];
        } else {
            return false;
        }
    }
    return $sizes;
}

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) {
        return '';
    }

    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function setDynamicFilterCssFree($id, $handle, $caf_layout, $b, $type)
{
    include TC_CAF_PATH . 'includes/front-variables.php';
    switch ($caf_layout) {
        case "filter-layout1":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/filter-layout1-css.php";
            break;
        case "filter-layout2":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/filter-layout2-css.php";
            break;
        case "filter-layout3":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/filter-layout3-css.php";
            break;
        case "post-layout1":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/post-layout1-css.php";
            break;
        case "post-layout2":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/post-layout2-css.php";
            break;
        case "post-layout3":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/post-layout3-css.php";
            break;
        case "post-layout4":
            include TC_CAF_PATH . "/includes/layouts/dynamic-css/post-layout4-css.php";
            break;
    }
}