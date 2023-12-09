<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class CAF_admin_ajax
{
    public function __construct()
    {
        add_action('wp_ajax_tc_caf_get_taxonomy', array($this, 'tc_caf_get_taxonomy'));
        add_action("wp_ajax_nopriv_tc_caf_get_taxonomy", array($this, "tc_caf_get_taxonomy"));
        add_action('wp_ajax_tc_caf_get_terms', array($this, 'tc_caf_get_terms'));
        add_action("wp_ajax_nopriv_tc_caf_get_terms", array($this, "tc_caf_get_terms"));
    }

    public function tc_caf_get_taxonomy()
    {
        check_ajax_referer('tc_caf_ajax_nonce', 'nonce_ajax');
        if (isset($_POST["cpt"])) {
            $posttype = sanitize_text_field($_POST["cpt"]);
        }

        $data['tax'] = get_object_taxonomies($posttype);
        $data['tax1'] = $data['tax'][0];
        if ($data['tax1']) {
            $terms = get_terms([
                'taxonomy' => $data['tax1'],
                'hide_empty' => false,
            ]);
            $data['terms'] = $terms;
        } else {
            $data['terms'] = '';
        }
        echo json_encode($data);
        wp_die();
    }

    public function tc_caf_get_terms()
    {
        check_ajax_referer('tc_caf_ajax_nonce', 'nonce_ajax');
        if (isset($_POST["taxonomy"])) {
            $taxonomy = sanitize_text_field($_POST["taxonomy"]);
        }
        if ($taxonomy) {
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ]);
            $data['terms'] = $terms;
        }
        echo json_encode($data);
        wp_die();
    }

}
