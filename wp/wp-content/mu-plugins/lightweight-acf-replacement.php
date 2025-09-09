<?php
/**
 * Lightweight ACF Replacement for ServerlessWP
 * 
 * This provides basic get_field() functionality without the full ACF plugin
 * to avoid Vercel's 250MB serverless function size limit
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Lightweight replacement for get_field()
 * 
 * @param string $field_name The custom field name
 * @param int|null $post_id The post ID (defaults to current post)
 * @return mixed The field value
 */
function get_field($field_name, $post_id = null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }
    
    return get_post_meta($post_id, $field_name, true);
}

/**
 * Check if get_field function already exists (in case real ACF is loaded)
 */
if (!function_exists('get_field')) {
    // Function is defined above
}

/**
 * Lightweight replacement for update_field()
 * 
 * @param string $field_name The custom field name
 * @param mixed $value The field value
 * @param int|null $post_id The post ID (defaults to current post)
 * @return bool True on success, false on failure
 */
function update_field($field_name, $value, $post_id = null) {
    if ($post_id === null) {
        $post_id = get_the_ID();
    }
    
    return update_post_meta($post_id, $field_name, $value);
}

/**
 * Lightweight replacement for the_field()
 * 
 * @param string $field_name The custom field name  
 * @param int|null $post_id The post ID (defaults to current post)
 */
function the_field($field_name, $post_id = null) {
    echo get_field($field_name, $post_id);
}

/**
 * Add admin notice explaining the lightweight ACF replacement
 */
function acf_replacement_admin_notice() {
    if (current_user_can('manage_options')) {
        echo '<div class="notice notice-info"><p>';
        echo '<strong>ServerlessWP:</strong> Using lightweight ACF replacement. Basic get_field() functionality available.';
        echo '</p></div>';
    }
}

// Only show notice in admin
if (is_admin()) {
    add_action('admin_notices', 'acf_replacement_admin_notice');
}

/**
 * Log that lightweight ACF is loaded
 */
if (defined('WP_DEBUG') && WP_DEBUG) {
    error_log('ServerlessWP: Lightweight ACF replacement loaded');
}