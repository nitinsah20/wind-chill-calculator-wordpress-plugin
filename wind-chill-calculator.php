<?php
/*
Plugin Name: Wind Chill Calculator
Plugin URI:  https://windchillcalculator.com.co/
Description: A simple responsive Wind Chill Calculator. Use shortcode [wind_chill].
Version:     1.0
Author:      Atal
*/

if (!defined('ABSPATH')) exit;

// Load CSS & JS
function wcc_enqueue_files() {
    wp_enqueue_style('wcc-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('wcc-script', plugin_dir_url(__FILE__) . 'script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'wcc_enqueue_files');

// Shortcode Output
function wcc_shortcode_html() {
    ob_start(); ?>

    <div class="wcc-container">
        <button class="wcc-dark-toggle" onclick="wccToggleDarkMode()">🌙 Dark Mode</button>
        <h2 class="wcc-title">Wind Chill Calculator</h2>

        <div class="wcc-field">
            <label>Temperature (°C)</label>
            <input type="number" id="temp" placeholder="Enter temperature">
        </div>

        <div class="wcc-field">
            <label>Wind Speed (km/h)</label>
            <input type="number" id="speed" placeholder="Enter wind speed">
        </div>

        <button class="wcc-btn" onclick="calculateWindChill()">Calculate</button>

        <div class="wcc-result-box">
            <h3>Wind Chill: <span id="result">--</span> °C</h3>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('wind_chill', 'wcc_shortcode_html');
