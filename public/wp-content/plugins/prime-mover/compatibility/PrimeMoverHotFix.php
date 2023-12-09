<?php
namespace Codexonics\PrimeMoverFramework\compatibility;

/*
 * This file is part of the Codexonics.PrimeMoverFramework package.
 *
 * (c) Codexonics Ltd
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Codexonics\PrimeMoverFramework\classes\PrimeMover;
use __PHP_Incomplete_Class;
use SplFixedArray;

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Prime Mover Hot Fix Class
 * Helper class for methods that don't have permanent fixes yet added to core or PHP.
 */
class PrimeMoverHotFix
{     
    private $prime_mover;
    
    /**
     * Construct
     * @param PrimeMover $prime_mover
     * @param array $utilities
     */
    public function __construct(PrimeMover $prime_mover, $utilities = [])
    {
        $this->prime_mover = $prime_mover;
    }
    
    /**
     * Get hooked methods
     * @return \Codexonics\PrimeMoverFramework\classes\PrimeMoverHookedMethods
     */
    public function getHookedMethods()
    {
        return $this->getPrimeMover()->getHookedMethods();
    }
    
    /**
     * Get system functions
     * @return \Codexonics\PrimeMoverFramework\classes\PrimeMoverSystemFunctions
     */
    public function getSystemFunctions()
    {
        return $this->getPrimeMover()->getSystemFunctions();
    }
    
    /**
     * Get system initialization
     * @return \Codexonics\PrimeMoverFramework\classes\PrimeMoverSystemInitialization
     */
    public function getSystemInitialization()
    {
        return $this->getPrimeMover()->getSystemInitialization();
    }
    
    /**
     * Get Prime Mover instance
     * @return \Codexonics\PrimeMoverFramework\classes\PrimeMover
     */
    public function getPrimeMover()
    {
        return $this->prime_mover;
    }
    
    /**
     * Get system authorization
     * @return \Codexonics\PrimeMoverFramework\classes\PrimeMoverSystemAuthorization
     */
    public function getSystemAuthorization()
    {
        return $this->getPrimeMover()->getSystemAuthorization();
    }
        
    /**
     * Initialize hooks
     */
    public function initHooks()
    {
        add_action('prime_mover_update_user_meta', [$this, 'updateUserMeta'], 10, 3); 
        add_filter('prime_mover_ajax_rendered_js_object', [$this, 'bailOutDefaultUpload'], 100, 1 );
        add_action('admin_enqueue_scripts', [$this, 'deQueueIncompatibleAssets'], 99999, 1);
    }
    
    /**
     * Dequeue incompatible assets
     * @param string $hook
     */
    public function deQueueIncompatibleAssets($hook = '')
    {
        if (!$this->getSystemAuthorization()->isUserAuthorized()) {
            return;
        }      
        
        $current_screen = get_current_screen();
        if ($this->getHookedMethods()->maybeWeAreNotOnSitesPage($hook) && !$this->getSystemFunctions()->maybeLoadAssets($current_screen) &&
            !$this->getSystemInitialization()->isBackupsMenuPage($hook)) {
            return;
        }
        
        wp_dequeue_style('jquery-ui-style');
    }
    
    /**
     * Bail out in case a security rule is detected preventing efficient uploads
     * @param array $args
     * @return array
     */
    public function bailOutDefaultUpload(array $args)
    {
        $args['prime_mover_bailout_upload_text'] = sprintf(esc_html__("Upload package restore is not possible due to server security policy . Please %s .", 'prime-mover'), 
            '<a class="prime-mover-external-link" target="_blank" href="' .
            esc_url(CODEXONICS_PACKAGE_MANAGER_RESTORE_GUIDE . "#packagemanager") . '">' . esc_html__('restore using package manager', 'prime-mover') . '</a>');
        
        return $args;
    }
        
    /**
     * Stripslashes from strings only
     * @param mixed $value
     * @return string
     */
    private function stripslashesFromStringsOnly($value) {
        return is_string($value) ? stripslashes($value) : $value;
    }

    /**
     * Map deep
     * @param mixed $value
     * @return \__PHP_Incomplete_Class|\__PHP_Incomplete_Class|mixed
     */
    private function mapDeep($value) {
        $callback = [$this, 'stripslashesFromStringsOnly'];
        if (is_object($value) && $value instanceof __PHP_Incomplete_Class) {
            return $value;
        }
        if (is_array($value)) {
            foreach ($value as $index => $item) {
                $value[$index] = $this->mapDeep($item);
            }
        } elseif (is_object($value)) {
            $object_vars = get_object_vars($value);
            foreach ($object_vars as $property_name => $property_value) {
                if ($value instanceof SplFixedArray) {
                    $value[$property_name] = $this->mapDeep($property_value);
                } else {
                    $value->$property_name = $this->mapDeep($property_value);
                }                
            }
        } else {
            $value = call_user_func($callback, $value);
        }
        
        return $value;
    }
    
    /**
     * Simplified API version of update_user_meta
     * Included hotfix of this limitation:
     * https://core.trac.wordpress.org/ticket/55257
     * @param int    $user_id    User ID.
     * @param string $meta_key   Metadata key.
     * @param mixed  $meta_value Metadata value. Must be serializable if non-scalar.
     */
    public function updateUserMeta($user_id, $meta_key, $meta_value) 
    {
        if (!function_exists('get_metadata_raw')) {
            return update_user_meta($user_id, $meta_key, $meta_value);
        }
        global $wpdb;
        $meta_type = 'user';
        $prev_value = '';        
        if (!$meta_key || !is_numeric($user_id)) {
            return false;
        }        
        $user_id = absint($user_id);
        if (!$user_id) {
            return false;
        }        
        $table = _get_meta_table($meta_type);
        if (!$table) {
            return false;
        }
        
        $meta_subtype = get_object_subtype($meta_type, $user_id);        
        $column = sanitize_key($meta_type . '_id');
        $id_column = ('user' === $meta_type) ? 'umeta_id' : 'meta_id';        
       
        $meta_key = $this->mapDeep($meta_key);        
        $meta_value = sanitize_meta($meta_key, $this->mapDeep($meta_value), $meta_type, $meta_subtype);        
        if (empty($prev_value)) {
            $old_value = get_metadata_raw($meta_type, $user_id, $meta_key);
            if (is_countable( $old_value) && count($old_value ) === 1) {
                if ($old_value[0] === $meta_value) {
                    return false;
                }
            }
        }        
        $meta_ids = $wpdb->get_col($wpdb->prepare("SELECT $id_column FROM $table WHERE meta_key = %s AND $column = %d", $meta_key, $user_id));
        if (empty($meta_ids)) {
            return $this->insertData($user_id, $meta_key, $meta_value, $table, $column);
        }
     
        $meta_value = maybe_serialize($meta_value);        
        $data  = compact('meta_value');
        $where = [$column => $user_id, 'meta_key'=> $meta_key,];
        
        if (!empty($prev_value)) {
            $prev_value = maybe_serialize($prev_value);
            $where['meta_value'] = $prev_value;
        }        
        $result = $wpdb->update($table, $data, $where);
        if (!$result) {
            return false;
        }        
        wp_cache_delete($user_id, $meta_type . '_meta');        
        return true;
    }

    /**
     * Insert data
     * @param int $user_id
     * @param string $meta_key
     * @param mixed $meta_value
     * @param string $table
     * @param string $column
     * @return boolean|number
     */
    private function insertData($user_id, $meta_key, $meta_value, $table, $column) 
    {
        global $wpdb;               
        $result = $wpdb->insert($table, [$column => $user_id, 'meta_key' => $meta_key, 'meta_value' => maybe_serialize($meta_value)]);            
        if (!$result) {
            return false;
        }        
        $mid = (int) $wpdb->insert_id;            
        wp_cache_delete($user_id, 'user_meta');            
        return $mid;
    }
}