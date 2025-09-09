<?php
/**
 * Must-Use Plugin: Activate Required Plugins
 * 
 * This ensures critical plugins are always activated in ServerlessWP
 * Must-use plugins are automatically loaded and cannot be deactivated
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Force activate required plugins
 */
function activate_required_plugins() {
    $required_plugins = array(
        'advanced-custom-fields/acf.php',
        'tidb-compatibility/tidb-compatibility.php'
    );
    
    $active_plugins = get_option('active_plugins', array());
    $updated = false;
    
    foreach ($required_plugins as $plugin) {
        if (!in_array($plugin, $active_plugins)) {
            $active_plugins[] = $plugin;
            $updated = true;
        }
    }
    
    if ($updated) {
        update_option('active_plugins', $active_plugins);
    }
}

// Run on every page load to ensure plugins stay active
add_action('init', 'activate_required_plugins', 1);

/**
 * Add admin notice if required plugins are missing
 */
function check_required_plugins_notice() {
    $missing_plugins = array();
    
    // Check if ACF is available
    if (!class_exists('ACF') && !function_exists('get_field')) {
        $missing_plugins[] = 'Advanced Custom Fields';
    }
    
    // Check if TiDB compatibility is loaded
    if (!class_exists('TiDB_Compatibility')) {
        $missing_plugins[] = 'TiDB Compatibility';
    }
    
    if (!empty($missing_plugins)) {
        echo '<div class="notice notice-warning"><p>';
        echo '<strong>ServerlessWP:</strong> Missing required plugins: ' . implode(', ', $missing_plugins);
        echo '</p></div>';
    }
}

// Only show notice in admin
if (is_admin()) {
    add_action('admin_notices', 'check_required_plugins_notice');
}

/**
 * Log plugin activation for debugging
 */
function log_plugin_activation() {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('ServerlessWP: Required plugins activation check completed');
    }
}

add_action('init', 'log_plugin_activation', 99);