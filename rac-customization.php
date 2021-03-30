<?php
/**
 * @package rac-customization
 * @version 1.0.0
 */
/*
Plugin Name: RAC-customization
Description: This is a customization for Rennes Aero Club
Author: Cyrille Meichel
Version: 1.0.0
Author URI: https://www.linkedin.com/in/cmeichel/
*/


if (!function_exists('add_action')) {
    echo 'go out of here';
    die;
}



if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

require_once (ABSPATH . 'wp-settings.php');



class RacPlugin {

    public $plugin;

    function __construct() {
        $this->plugin = plugin_basename(__FILE__);
    }

    function register() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    function activate() {

    }

    function deactivate() {

    }


    function enqueue() {
        wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Raleway:100%7CRaleway:r,i,b,bi&subset=latin,latin-ext,latin,latin-ext');
        wp_enqueue_style('racstyle', plugins_url('/assets/style.css', __FILE__));
    }
}

if ( class_exists('RacPlugin')) {
    $meteoPlugin = new RacPlugin();
    $meteoPlugin->register();
}

// activation
register_activation_hook(__FILE__, array($meteoPlugin, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($meteoPlugin, 'deactivate'));

