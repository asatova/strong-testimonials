<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class CAF_POST_ACTIONS
{ 
    public $template=TC_CAF_PATH.'/templates';
         
    public function __construct()
    {
        add_action("caf_article_container_start", array($this, "caf_article_container_start"));
        add_action('caf_after_article_container_start', array($this, 'caf_after_article_container_start'), 5);
        add_action('caf_after_article_container_start', array($this, 'caf_manage_layout_start'), 6);
        add_action('caf_after_article_container_start', array($this, 'caf_get_post_image'), 10);
        add_action('caf_after_article_container_start', array($this, 'caf_manage_post_area_start'), 15);
        add_action('caf_after_article_container_start', array($this, 'caf_get_post_title'), 20);
        add_action("caf_after_article_container_start", array($this, "caf_meta_content_container_start"), 25);
        add_action("caf_after_article_container_start", array($this, "caf_get_meta_auhtor"), 30);
        add_action("caf_after_article_container_start", array($this, "caf_get_meta_date"), 35);
        add_action("caf_after_article_container_start", array($this, "caf_get_meta_comment_count"), 40);
        add_action("caf_after_article_container_start", array($this, "caf_meta_content_container_end"), 45);
        add_action("caf_after_article_container_start", array($this, "caf_get_linked_terms"), 50);
        add_action('caf_after_article_container_start', array($this, 'caf_get_post_content'), 55);
        add_action('caf_after_article_container_start', array($this, 'caf_get_post_read_more'), 60);
        add_action('caf_after_article_container_start', array($this, 'caf_manage_post_area_end'), 65);
        add_action('caf_after_article_container_start', array($this, 'caf_manage_layout_end'), 70);
        add_action("caf_article_container_end", array($this, "caf_article_container_end"));
        add_action("caf_empty_result_error", array($this, "caf_empty_result_error"));
    }
    public function caf_after_article_container_start($id)
    {
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        switch ($caf_post_layout) {
            case "post-layout1":
                    remove_action("caf_after_article_container_start", array($this, "caf_get_linked_terms"), 50);
                break;
            case "post-layout2":
                    remove_action('caf_after_article_container_start', array($this, 'caf_manage_layout_start'), 6);
                    remove_action("caf_after_article_container_start", array($this, "caf_get_meta_comment_count"), 40);
                    remove_action("caf_after_article_container_start", array($this, "caf_get_linked_terms"), 50);
                    remove_action('caf_after_article_container_start', array($this, 'caf_get_post_content'), 55);
                    remove_action('caf_after_article_container_start', array($this, 'caf_get_post_read_more'), 60);
                    remove_action('caf_after_article_container_start', array($this, 'caf_manage_layout_end'), 70);
                    add_action("caf_after_article_container_start", array($this, "caf_get_linked_terms"), 15);
                break;
            case "post-layout3":
                    remove_action("caf_after_article_container_start", array($this, "caf_get_meta_comment_count"), 40);
                    remove_action('caf_after_article_container_start', array($this, 'caf_get_post_content'), 55);
                    remove_action('caf_after_article_container_start', array($this, 'caf_get_post_read_more'), 60);
                remove_action("caf_after_article_container_start", array($this, "caf_get_linked_terms"), 50);
                add_action("caf_after_article_container_start", array($this, "caf_get_linked_terms"), 15);
                break;
            case "post-layout4":
                    remove_action("caf_after_article_container_start", array($this, "caf_meta_content_container_start"), 25);
                    remove_action("caf_after_article_container_start", array($this, "caf_get_meta_auhtor"), 30);
                    remove_action("caf_after_article_container_start", array($this, "caf_get_meta_date"), 35);
                    remove_action("caf_after_article_container_start", array($this, "caf_get_meta_comment_count"), 40);
                    remove_action("caf_after_article_container_start", array($this, "caf_meta_content_container_end"), 45);
                break;
        }
    }
    public function caf_article_container_start($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        $cats = $this->caf_get_cats($tax);
        $cats_class = $this->caf_get_first_class($cats);
        $caf_mb = 'caf-mb-5';
        if ($caf_post_layout == "post-layout4") {
            $caf_desktop_col = '12';
            $caf_tablet_col = '12';
            $caf_mobile_col = '12';
            $caf_mb = 'caf-mb-10';
        }
        include $this->template."/article-start.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_article_container_end($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/article-end.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_manage_layout_start($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/manage-layout-start.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_manage_layout_end($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/manage-layout-end.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_manage_post_area_start($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/manage-post-area-start.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_manage_post_area_end($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/manage-post-area-end.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_get_post_image($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        $a_class = '';
        $img_box = '';
        if ($caf_post_layout == 'post-layout4') {
            $a_class = 'caf-f-img';
        }
        if ($caf_post_layout == 'post-layout6') {
            $a_class = 'caf-featured-a';
            $img_box = 'avt';
        }
        if ($caf_post_layout == 'post-layout7') {
            $a_class = 'caf-featured-a';
        }
        if ($caf_post_layout == 'post-layout11') {
            $a_class = 'caf-f-link';
        }
        include $this->template."/post-image.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_get_post_image_snippet($image, $link, $caf_link_target, $caf_post_layout, $image_alt, $id)
    {
        if (isset($image[0])) {
            echo "<a href='" . esc_url($link) . "' target='" . esc_attr($caf_link_target) . "' class='caf-f-link'><img src='" . $image[0] . "' alt='" . $image_alt . "'></a>";
        } else {
            $image = TC_CAF_URL . 'assets/img/unnamed.jpg';
            echo "<a href='" . esc_url($link) . "' target='" . esc_attr($caf_link_target) . "'><img src='" . esc_url($image) . "' alt='caf-default-image'></a>";
        }
    }

    public function caf_meta_content_container_start($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/meta-content-start.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_get_meta_auhtor($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/caf-author.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_get_meta_date($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/caf-date.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_get_meta_comment_count($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/comments-count.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_get_post_title($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/title.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    public function caf_meta_content_container_end($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/meta-content-end.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_get_post_content($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/caf-content.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_get_post_read_more($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        include $this->template."/read-more.php";   
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_empty_result_error($caf_empty_res)
    {
        ob_start();
        $post = '';
        include $this->template."/empty-result.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }
    public function caf_get_linked_terms($id)
    {
        ob_start();
        include TC_CAF_PATH . 'includes/query-variables.php';
        include TC_CAF_PATH . 'includes/post-variables.php';
        $cats = $this->caf_get_cats($tax);
        include $this->template."/caf-terms.php";
        $output = ob_get_contents();
        ob_end_clean();
            echo $output;
    }
    public function caf_get_cats($tax) {
    global $post;
    $caf_post_id = get_the_ID();
    if (is_array($tax)) {
        $cats = array();
        foreach ($tax as $tx) {
            $cats[] = get_the_terms($caf_post_id, $tx);
        }
    } else {
        $cats = get_the_terms($caf_post_id, $tax);
    }
    return $cats;
    }
    public function caf_get_first_class($cats)
    {
        $cats_class = '';
        if (is_array($cats)) {
            if (isset($cats)) {
                if (class_exists("TC_CAF_PRO")) {   
                    if (isset($cats[0][0]->name)) {
                        $cats_class = $cats[0][0]->name;
                    }
                } else {
                    if (isset($cats[0]->name)) {
                        $cats_class = $cats[0]->name;
                    }
                }
                $cats_class = str_replace(' ', '_', $cats_class);
                $cats_class = "tp_" . $cats_class;
            } else { $cats_class = '';}}
        return $cats_class;
    }
}
new CAF_POST_ACTIONS();