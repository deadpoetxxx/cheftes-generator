<?php
/**
 * Plugin Name: Cheftes - GPT Recipe Generator
 * Description: Δημιουργεί συνταγές με βάση υλικά που δίνει ο χρήστης, μέσω GPT.
 * Version: 1.0
 * Author: Τάσος
 */

defined('ABSPATH') || exit;

define('CHEFTES_PATH', plugin_dir_path(__FILE__));
define('CHEFTES_URL', plugin_dir_url(__FILE__));

require_once CHEFTES_PATH . 'includes/form-handler.php';
require_once CHEFTES_PATH . 'includes/gpt-api.php';
require_once CHEFTES_PATH . 'includes/settings-page.php';

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('cheftes-style', CHEFTES_URL . 'assets/style.css');
    wp_enqueue_script('cheftes-script', CHEFTES_URL . 'assets/script.js', ['jquery'], null, true);
    wp_localize_script('cheftes-script', 'cheftes_ajax', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
});
