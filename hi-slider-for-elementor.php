<?php

// Requires Elementor
// Requires Plugins: elementor
/**
 * Plugin Name: Hi-Slider for Elementor
 * Description: A custom Elementor widget slider using Bootstrap Carousel.
 * Version: 1.0
 * Author: Pipz
 * Author URI: https://github.com/githubpipz/portfolio
 * Text Domain: hi-slider-for-elementor
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.6
 * Tested up to: 6.0
 * Requires PHP: 7.4
 * Elementor Tested Up to: 3.6.0
 * Plugin URI: https://github.com/githubpipz/hi-slider-for-elementor
 */

if (!defined('ABSPATH')) exit; // Prevent direct access


// Ensure Elementor is installed
function hi_slider_check_elementor() {
    if (!did_action('elementor/loaded')) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('This plugin requires Elementor to be installed and activated.');
    }
}
add_action('plugins_loaded', 'hi_slider_check_elementor');

// Register Widget
function hislid_register_widget($widgets_manager) {
    require_once(plugin_dir_path(__FILE__) . 'hi-slider-widget.php');
    $widgets_manager->register(new \Hi_Slider_Widget());
}
add_action('elementor/widgets/register', 'hislid_register_widget');

// Enqueue Bootstrap if not already loaded
function hislid_enqueue_scripts() {
    global $plugin_version; // Ensure the variable is accessible

    // Enqueue styles and scripts with fallback to $plugin_version
    wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css', array(), $plugin_version);
    wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.bundle.min.js', array('jquery'), $plugin_version, true);
    wp_enqueue_style('hi-slider-css', plugin_dir_url(__FILE__) . 'hi-slider.css', array(), $plugin_version);
}
add_action('wp_enqueue_scripts', 'hislid_enqueue_scripts');
add_action('elementor/frontend/after_enqueue_scripts', 'hislid_enqueue_scripts');
