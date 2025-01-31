<?php
/*
Plugin Name: Post Edited History
Plugin URI: https://github.com/kamrulhasanj/post-edited-history
Description: This plugin adds a shortcode [post_edit_history] to display edit history for posts, specifically for the 'security-guide' post type.
Version: 1.1
Author: Kamrul Hasan
Author URI: https://facebook.com/uikamrul
License: GPLv2 or later
*/

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

// Register the shortcode [post_edit_history]
add_shortcode('post_edit_history', 'sg_display_edit_history_shortcode');

add_action('wp_enqueue_scripts', 'sg_enqueue_styles');
function sg_enqueue_styles() {
    wp_enqueue_style('post-edited-history-style', plugin_dir_url(__FILE__) . 'assets/css/post-edited-history.css');

    wp_enqueue_script('mainhelper-js', plugin_dir_url(__FILE__) . 'assets/js/mainhelper.js', ['jquery'], '1.0', true);
}

// Shortcode function to display edit history
function sg_display_edit_history_shortcode() {
    // Get the current post object
    global $post;

    // Ensure this is a single post of type 'security-guide'
    if (!is_singular('security-guide') || !$post) {
        return '<p>Edit history is not available for this content.</p>';
    }

    // Retrieve the edit history from post meta
    $edit_history = get_post_meta($post->ID, '_edit_history', true);

    // If no history exists, add a default message
    if (empty($edit_history)) {
        return '<p><strong>Edit History:</strong> No edit history available for this post.</p>';
    }

    $edit_history = array_slice($edit_history, -3);

    // Initialize the output variable
    $output = '<div class="sg-edit-history" id="sg-edit-history">';
    $output .= '<ul>';
    $output .= '<li>Current Version</li>';

    // Loop through each edit history entry
    foreach ($edit_history as $edit) {
        $output .= '<li><span>' . esc_html($edit['time']);
        $output .= '</span> Reviewed and edited by: ' . esc_html($edit['user']) . '</li>';
    }

    $output .= '</ul></div>';

    return $output; // Return the generated HTML
}

// Hook to save edit history when a post is updated
add_action('save_post', 'sg_save_edit_history');

// Function to save edit history
function sg_save_edit_history($post_id) {
    // Ensure this is a 'security-guide' post type
    if (get_post_type($post_id) !== 'security-guide') {
        return;
    }

    // Check if this is an autosave or a revision
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }

    // Retrieve the current user and time
    $current_user = wp_get_current_user();
    $current_time = current_time('Y-m-d H:i:s');

    // Retrieve existing edit history
    $edit_history = get_post_meta($post_id, '_edit_history', true);

    if (empty($edit_history)) {
        $edit_history = [];
    }

    // Add the new edit to the history
    $edit_history[] = [
        'time' => $current_time,
        'user' => $current_user->display_name
    ];

    // Update the post meta with the new edit history
    update_post_meta($post_id, '_edit_history', $edit_history);
}
