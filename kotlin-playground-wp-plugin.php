<?php
/**
 * @wordpress-plugin
 *
 * Plugin Name: Kotlin Playground Plugin
 * Description: Allows to embed interactive Kotlin playground to any post via <code>[kotlin]</code> shortcode.
 * Version: 0.0.1
 * License: Apache-2.0
 */

require 'kotlin-shortcode.php';

new Kotlin\KotlinPlaygroundWordpressPlugin\KotlinShortcode();