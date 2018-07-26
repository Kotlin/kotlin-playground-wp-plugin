<?php
/**
 * @wordpress-plugin
 *
 * Plugin Name: Kotlin Playground Plugin
 * Description: Allows to embed interactive Kotlin playground to any post via <code>[kotlin]</code> shortcode.
 * Version: 0.0.4
 * License: Apache-2.0
 * Plugin URI: https://github.com/Kotlin/kotlin-playground-wp-plugin
 * Author URI: https://github.com/Kotlin
 */

require 'kotlin-shortcode.php';

new Kotlin\KotlinPlaygroundWordpressPlugin\KotlinShortcode();